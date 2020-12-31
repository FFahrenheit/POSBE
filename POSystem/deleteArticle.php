<?php 
    $pk = $_GET['pk'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "DELETE FROM venta WHERE clave = $pk";

    mysqli_query($conn,$query) or die ('{"status":101}');

    if($conn->affected_rows>0)
    {
        echo json_encode(array("status"=>200));
    }
    mysqli_close($conn);
?>