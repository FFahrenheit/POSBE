<?php 
    $name = $_GET['name'];
    $number = $_GET['number'];
    $pk = $_GET['pk'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "UPDATE proveedor SET 
    nombre = '$name', 
    contacto = '$number' 
    WHERE clave = $pk";

    mysqli_query($conn,$query) or die ('{"status":101}');

    echo json_encode(array("status"=>200));
    mysqli_close($conn);
?>