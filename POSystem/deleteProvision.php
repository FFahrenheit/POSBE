<?php 
    $code = $_GET['code'];
    $provider = $_GET['code'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "DELETE FROM provision WHERE producto = '$code' AND proveedor = $provider";

    mysqli_query($conn,$query) or die ('{"status":101}');

    echo json_encode(array("status"=>200));
    mysqli_close($conn);
?>