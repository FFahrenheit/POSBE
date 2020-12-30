<?php 
    $code = $_GET['code'];
    $provider = $_GET['provider'];
    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "SELECT provision.precio as price, provision.proveedor as provider,
    provision.producto as code, producto.descripcion as name, producto.precio as original 
    FROM provision, producto WHERE provision.producto = producto.codigo  AND 
    provision.proveedor = $provider AND provision.producto LIKE '%$code%'";

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