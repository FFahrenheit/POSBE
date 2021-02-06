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
        
        //32 lineas de largo.
    }
    catch (Throwable $e) 
    {
        ob_clean();
        echo('{"status":100}');
        die();
    }

    //All the magic is right here
    $printer->barcode($pk);
    //That's it

    $printer->feed(4);
    $printer -> cut();
    $printer -> close();

    echo('{"status":200}');
?>