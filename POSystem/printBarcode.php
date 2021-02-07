<?php
    /* Call this file 'hello- world.php' */
    if(isset($_GET['pk']))
    {
        $pk = $_GET['pk'];
    }
    else 
    {
        $pk = "0";
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
    }
    catch (Throwable $e) 
    {
        ob_clean(); 
        echo('{"status":100}'); 
        die(); 
    }
    $conexion = mysqli_connect("localhost","root","","posystem") or die ('{"status":100}'); 
    $sql = "SELECT * FROM producto WHERE codigo = '$pk'"; 
    $results = mysqli_query($conexion,$sql) or die ('{"status":101}'); 
    $row = mysqli_fetch_array($results); 
    //All the magic is right here 
    $printer->text($row['descripcion']."\n"); 
    $printer->barcode($pk,Printer::BARCODE_CODE93); //This is the one that works
                                                    //with variable numeric string
    //That's it 
    $printer->feed(4); 
    $printer -> cut(); 
    $printer -> close(); 
    echo('{"status":200}'); 
?>