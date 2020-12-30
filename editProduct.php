<?php 
    $code = $_GET['code'];
    $name = $_GET['name'];
    $esp = $_GET['esp'];
    $stock = $_GET['stock'];
    $price = $_GET['price'];
    $pk = $_GET['old'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "UPDATE producto SET 
    descripcion = '$name',
    codigo = '$code', 
    especificacion = '$esp',
    stock = $stock,
    precio = $price
    WHERE codigo = '$pk'";

    mysqli_query($conn,$query) or die ('{"status":101}');

    echo json_encode(array("status"=>200));
    mysqli_close($conn);
?>