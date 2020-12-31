<?php 
    $key = $_GET['key'];

    $conexion = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');
    $sql = "SELECT visita_articulos.*, producto.descripcion as name FROM 
    visita_articulos, producto WHERE producto.codigo = visita_articulos.producto 
    AND visita_articulos.visita = $key";

    $results = mysqli_query($conexion,$sql);
    $data = array();

    while($row = mysqli_fetch_assoc($results))
    {
        $data[] = $row;
    }

    echo json_encode($data);
?>