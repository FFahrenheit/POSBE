<?php 
    $cashier = $_GET['cashier'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "DELETE FROM visita WHERE cajero = '$cashier' AND estado = 'abierta'";

    mysqli_query($conn,$query) or die ('{"status":101}');

    echo json_encode(array("status"=>200));

    mysqli_close($conn);
?>