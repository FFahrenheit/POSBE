<?php 
    $name = $_GET['name'];
    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "SELECT *, (SELECT COUNT(*) FROM provision WHERE proveedor = clave) as total 
    FROM proveedor WHERE nombre LIKE '%$name%'";

    $results = mysqli_query($conn,$query)
    or die ('{"status":101}');
    $data = array();

    while($row = mysqli_fetch_assoc($results))
    {
        $data[] = $row;
    }

    echo json_encode($data);
	mysqli_close($conexion);

?>