<?php 
    $item = $_GET['item'];
    $qty = $_GET['qty'];
    $price = $_GET['price'];
    $visit = $_GET['visit'];
    $total = floatval($qty) * floatval($price);

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "INSERT INTO visita_articulos
    (producto, visita, precio, cantidad, total) VALUES 
    ('$item', $visit, $price, $qty, $total)";

    mysqli_query($conn,$query) or die ('{"status":101}');

    echo json_encode(array("status"=>200));
    mysqli_close($conn);
?>