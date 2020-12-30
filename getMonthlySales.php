<?php 
    $month = $_GET['month'];
    $year = $_GET['year'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "SELECT SUM(total) as total, COUNT(clave) as count, DATE(fecha) as fecha
     FROM cuenta WHERE estado = 'cerrada' AND MONTH(fecha) = '$month' AND YEAR(fecha)='$year'
      GROUP BY DATE(fecha) ORDER BY fecha";

    $results = mysqli_query($conn,$query) or die  ('{"status":101}');
    $data = array();

    while($row = mysqli_fetch_assoc($results))
    {
        $data[] = $row;
    }

    echo json_encode($data);
    mysqli_close($conn);
?>