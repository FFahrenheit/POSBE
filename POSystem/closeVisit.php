<?php
    $pk = $_GET['pk'];
    $subtotal = $_GET['subtotal'];
    $total = $_GET['total'];
    $iva = $_GET['iva'];
    $ieps = $_GET['ieps'];


    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $conn2 = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "UPDATE visita SET 
    total = $total, 
    subtotal = $subtotal,
    estado = 'cerrada',
    iva = $iva,
    ieps = $ieps 
    WHERE clave = $pk";

    mysqli_query($conn,$query) or die ('{"status":101}');

    $query = "SELECT * FROM visita_articulos WHERE visita = $pk";

    $result = mysqli_query($conn,$query) or die ('{"status":101}');

    while($row = mysqli_fetch_array($result))
    {
        $qty = $row['cantidad'];
        $prod = $row['producto'];
        $query2 = "UPDATE producto SET stock = stock + $qty WHERE codigo = $prod";

        mysqli_query($conn2,$query2) or die ('{"status":101}');
    }
    
    echo json_encode(array("status"=>200));
    mysqli_close($conn);
?>