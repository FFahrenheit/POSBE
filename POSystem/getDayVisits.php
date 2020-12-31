<?php 
    $date = $_GET['date'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "SELECT (SELECT COUNT(*) FROM visita_articulos WHERE visita_articulos.visita = visita.clave) as count, 
    visita.total as total, visita.clave as pk, TIME(visita.fecha) as fecha, 
    proveedor.nombre as provider FROM visita,proveedor WHERE date(fecha) = '$date' 
    AND estado = 'cerrada' AND proveedor.clave = visita.proveedor";

    $results = mysqli_query($conn,$query) or die  ('{"status":101}');
    $data = array();

    while($row = mysqli_fetch_assoc($results))
    {
        $data[] = $row;
    }

    echo json_encode($data);
    mysqli_close($conn);
?>