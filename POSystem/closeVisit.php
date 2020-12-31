<?php
    $pk = $_GET['pk'];
    $subtotal = $_GET['subtotal'];
    $total = $_GET['total'];
    $iva = $_GET['iva'];
    $ieps = $_GET['ieps'];


    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "UPDATE visita SET 
    total = $total, 
    subtotal = $subtotal,
    estado = 'cerrada',
    iva = $iva,
    ieps = $ieps 
    WHERE clave = $pk";

    mysqli_query($conn,$query) or die ('{"status":101}');
    
    echo json_encode(array("status"=>200));
    mysqli_close($conn);
?>