<?php
    /* Call this file 'hello- world.php' */
    require __DIR__ . '/ticket/autoload.php';
    use Mike42\Escpos\Printer;
    use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
    $nombre_impresora = "POSPrinter";
    $connector = new WindowsPrintConnector($nombre_impresora);
    $printer = new Printer($connector);
    $printer -> text("Hello World!\n");
    $printer -> cut();
    $printer -> close();
?>