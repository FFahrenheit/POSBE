<?php 
    $pk = $_GET['key'];
    $qty = $_GET['qty'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "UPDATE visita_articulos SET cantidad = $qty,
    total = $qty * precio WHERE clave = $pk";

    mysqli_query($conn,$query) or die ('{"status":101}');

    echo json_encode(array("status"=>200));
    mysqli_close($conn);
?>