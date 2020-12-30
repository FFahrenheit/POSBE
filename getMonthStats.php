<?php 
    $year = $_GET['year'];
    $month = $_GET['month'];

    $conexion = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "SELECT 
    COALESCE(
        (SELECT SUM(total) FROM cuenta WHERE YEAR(fecha) = '$year' AND MONTH(fecha)='$month')
        ,0) as sold,
    COALESCE(
        (SELECT SUM(total) FROM visita WHERE YEAR(fecha) = '$year' AND MONTH(fecha)='$month')
        ,0) as paid";

    $results = mysqli_query($conexion,$query) or die  ('{"status":101}');

    $row = mysqli_fetch_assoc($results);

    echo json_encode($row);

    mysqli_close($conexion);
?>