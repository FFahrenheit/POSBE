<?php 
    $code = $_GET['code'];
    $provider = $_GET['provider'];
    $price = $_GET['price'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "INSERT INTO provision (producto, proveedor, precio) 
    VALUES ('$code',$provider,$price) ON DUPLICATE KEY UPDATE precio = $price";

    mysqli_query($conn,$query) or die ('{"status":101}');

    echo '{"status":200}';

	mysqli_close($conn);
?>