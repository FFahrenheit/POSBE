<?php
    $user = $_GET['user'];
    $code = $_GET['code'];
    $qty = $_GET['qty'];
    $conexion = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "SELECT clave FROM cuenta WHERE caja = '$user' AND estado = 'abierta'";

    $consulta = mysqli_query($conexion,$query)
	or die ('{"status":300}');
	$nfilas = mysqli_num_rows($consulta);
	if($nfilas>0)
	{
	    $fila = mysqli_fetch_array($consulta);
	    $key = $fila['clave'];
	}
	else
	{
        $query = "INSERT INTO cuenta (caja) VALUES('$user')";
        $consulta = mysqli_query($conexion,$query)
	    or die ('{"status":300}');
        $key = $conexion->insert_id;
    }
    
    $query = "INSERT INTO venta (producto,cuenta,cantidad) VALUES ('$code',$key,$qty)";

    $consulta = mysqli_query($conexion,$query)
    or die ('{"status":300}');

    echo '{"status":200}';

	mysqli_close($conexion);
?>