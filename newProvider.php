<?php 
    $provider = $_GET['provider'];
    $cashier = $_GET['cashier'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "INSERT INTO visita(proveedor,cajero) VALUES ($provider,'$cashier')";

    mysqli_query($conn,$query) or die ('{"status":101}');

    echo json_encode(array("status"=>200));
    mysqli_close($conn);
?>