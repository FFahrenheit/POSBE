<?php 
    $cashier = $_GET['cashier'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "SELECT visita.clave as ky, proveedor.nombre as name, proveedor.clave as pk 
    FROM proveedor, visita WHERE proveedor.clave = visita.proveedor AND
    visita.estado = 'abierta' AND visita.cajero = '$cashier'";

    $result = mysqli_query($conn,$query) 
    or die ('{"status":101}');

    if($result->num_rows>0)
    {
        $status = array();
        $status['status'] = 200;
        $values = mysqli_fetch_array($result);
        $status['pk'] = $values['pk'];
        $status['key'] = $values['ky'];
        $status['name'] = $values['name'];
        echo json_encode($status);
    }
    else 
    {
        echo '{"status":201}';
    }

    mysqli_close($conn);
?>