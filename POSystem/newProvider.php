<?php 
    $name = $_GET['name'];
    $number = $_GET['number'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "INSERT INTO proveedor(nombre,contacto) VALUES ('$name','$number')";

    mysqli_query($conn,$query) or die ('{"status":101}');

    echo json_encode(array("status"=>200));
    mysqli_close($conn);
?>