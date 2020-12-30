<?php 
    $name = $_GET['name'];
    $provider = $_GET['provider'];
    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "SELECT provision.precio as price, provision.proveedor as provider,
    provision.producto as code, producto.descripcion as name, producto.precio as original 
    FROM provision, producto WHERE provision.producto = producto.codigo  AND 
    provision.proveedor = $provider AND producto.descripcion LIKE '%$name%'";

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