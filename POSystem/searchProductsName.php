<?php
    $provider = $_GET['provider'];
    $name = $_GET['name'];
    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');
    $query = "SELECT *, 
    (SELECT COUNT(*) FROM provision WHERE provision.producto = producto.codigo AND provision.proveedor = $provider) 
    as bool FROM producto WHERE descripcion LIKE '%$name%' LIMIT 30";

    $results = mysqli_query($conn,$query) or die ('{"status":101}');
    $data = array();

    while($row = mysqli_fetch_assoc($results))
    {
        $data[] = $row;
    }

    echo json_encode($data);
	mysqli_close($conexion);

?>