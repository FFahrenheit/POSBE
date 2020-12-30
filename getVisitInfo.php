<?php 
    $key = $_GET['key'];

    $conexion = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');
    $sql = "SELECT * FROM visita WHERE clave = $key";

    $results = mysqli_query($conexion,$sql);

    $row = mysqli_fetch_assoc($results);

    echo json_encode($row);

    mysqli_close($conexion);
?>