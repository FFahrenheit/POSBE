<?php
    $user = $_GET['user'];
    $scann = $_GET['codeBar'];
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
    

    $query = "SELECT descripcion, precio FROM producto WHERE codigo = '$scann'";
    $result = mysqli_query($conexion,$query)
    or die ('{"status":300}');
    
    if(mysqli_num_rows($result)>0)
    {
        $array['status'] = 200;
        $rows = mysqli_fetch_array($result);
        $array['name'] = $rows['descripcion'];
        $array['price'] = $rows['precio']; 
    }
    else 
    {
        echo '{"status":102}';
    }

    $query = "INSERT INTO venta (producto,cuenta) VALUES ('$scann',$key)";

    $consulta = mysqli_query($conexion,$query)
    or die ('{"status":300}');
    $key = $conexion->insert_id;
    $array['pk'] = $key;

    echo json_encode($array);

	mysqli_close($conexion);
?>