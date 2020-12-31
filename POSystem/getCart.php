<?php 
    $user = $_GET['user'];
    $conexion = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');
    $sql = "SELECT producto.especificacion as esp, producto.descripcion as name, producto.codigo as code, producto.precio as price, 
    venta.cantidad as qty, venta.clave as pk FROM producto, venta, cuenta 
    WHERE producto.codigo = venta.producto AND venta.cuenta = cuenta.clave AND
    cuenta.caja = '$user' AND cuenta.estado = 'abierta' ORDER BY cuenta.fecha ASC";

    $results = mysqli_query($conexion,$sql);
    $data = array();

    while($row = mysqli_fetch_assoc($results))
    {
        $data[] = $row;
    }

    echo json_encode($data);
	mysqli_close($conexion);
?>