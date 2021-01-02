<?php
    /* Call this file 'hello- world.php' */
    if(isset($_GET['pk']))
    {
        $pk = $_GET['pk'];
    }
    require __DIR__ . '/ticket/autoload.php';
    use Mike42\Escpos\Printer;
    use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
    /*Inicialización de la impresora*/
    try
    {
        $nombre_impresora = "POSPrinter";
        $connector = new WindowsPrintConnector($nombre_impresora);
        $printer = new Printer($connector);
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        
        //32 lineas de largo.
    }
    catch (Throwable $e) 
    {
        ob_clean();
        echo('{"status":100}');
        die();
    }

    $printer->text("\nAbarrotes Silvia \n");
    $printer->text("Direccion: Rio Blanco 1657, C.P. 45200\n");
    $printer->text("Telefono: 33 3834 8590\n");
    
    date_default_timezone_set("America/Mexico_City");
    //$printer->text(date("Y-m-d H:i:s") . "\n");

    if(isset($_GET['pk']))
    {
        $conexion = mysqli_connect("localhost","root","","posystem")
        or die ('{"status":100}');

        $sql = "SELECT * FROM cuenta WHERE clave = $pk";

        $results = mysqli_query($conexion,$sql)
        or die ('{"status":101}');

        $row = mysqli_fetch_array($results);
        $printer->text($row['fecha']."\n");

        $printer->text("Cuenta: ".$row['clave']."\n");
        $printer->text("Atendido por: ".$row['caja']."\n\n");
        $total = $row['total'];
        $pagado = $row['pagado'];

        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text("--------------------------------");
        $printer->text("CANT.       P.U.      IMP.      \n");
        $printer->text("--------------------------------");

        $sql = "SELECT producto.especificacion as esp, producto.descripcion as name, producto.codigo as code, producto.precio as price, 
        venta.cantidad as qty, venta.clave as pk FROM producto, venta, cuenta 
        WHERE producto.codigo = venta.producto AND venta.cuenta = cuenta.clave AND
        cuenta.clave = $pk ORDER BY producto.descripcion ASC";
    
        $results = mysqli_query($conexion,$sql)
        or die ('{"status":101}');

        //$total = 0.0;

        while($row = mysqli_fetch_array($results))
        {
            $printer->text($row['name']."\n");
            
            $esp = ($row['esp']) == "pieza" ? "pz" : $row['esp'];
            $text = cut($row['qty']." ".$esp,11);

            $printer->text($text);
            for($i = 0; $i < 11 - strlen($text); $i = $i+1)
            {
                $printer->text(" ");
            }

            $pu = $row['price'];
            $text = cut("$".$pu,10);

            $printer->text($text);
            for($i = 0; $i < 10 - strlen($text); $i = $i+1)
            {
                $printer->text(" ");
            }

            $imp = floatval($row['price']) * floatval($row['qty']);
            $text = cut("$".bcdiv($imp, 1, 2),11);

            $printer->text($text);

            for($i = 0; $i < 11 - strlen($text); $i = $i+1)
            {
                $printer->text(" ");
            }

            //$total += $imp;
        }

        $printer->text("--------------------------------");
        $printer->setJustification(Printer::JUSTIFY_RIGHT);

        $cambio = floatval($pagado) - floatval($total);

        $printer->text("Total: $".$total."\n");
        $printer->text("Pagado: $".$pagado."\n");
        $printer->text("Cambio: $".bcdiv($cambio, 1, 2)."\n\n");

        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("Gracias por su preferencia");
    }
    
    $printer->feed(4);
    $printer -> cut();
    $printer -> close();

    echo('{"status":200}');

    function cut($str, $size)
    {
        if(strlen($str) <= $size)
        {
            return $str;
        }
        else 
        {
            return substr($str,0,$size-1);
        }
    }
?>