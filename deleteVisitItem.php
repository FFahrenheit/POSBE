<?php 
    $pk = $_GET['id'];
    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "DELETE FROM visita_articulos WHERE clave = $pk";

    mysqli_query($conn,$query) or die ('{"status":101}');

    echo json_encode(array("status"=>200));
    mysqli_close($conn);
?>