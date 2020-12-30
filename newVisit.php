<?php 
    $provider = $_GET['provider'];
    $cashier = $_GET['cashier'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "INSERT INTO visita (proveedor, cajero) 
    VALUES ($provider,'$cashier')";

    mysqli_query($conn,$query) or die ('{"status":101}');

    $out = array();
    $out['status'] = 200;
    $out['key'] = $conn->insert_id;
    echo json_encode($out);
    
	mysqli_close($conexion);
?>