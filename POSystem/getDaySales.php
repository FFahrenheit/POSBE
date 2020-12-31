<?php 
    $date = $_GET['date'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "SELECT (SELECT COUNT(*) FROM venta WHERE venta.cuenta = cuenta.clave) as products, 
    cuenta.total as total, cuenta.pagado as paid, cuenta.clave as pk, cuenta.fecha as date, 
    cuenta.caja as cashier FROM cuenta WHERE date(fecha) = '$date' AND estado = 'cerrada'";

    $results = mysqli_query($conn,$query) or die  ('{"status":101}');
    $data = array();

    while($row = mysqli_fetch_assoc($results))
    {
        $data[] = $row;
    }

    echo json_encode($data);
    mysqli_close($conn);
?>