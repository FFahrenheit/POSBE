<?php 
    $add = $_GET['add'];
    $pk = $_GET['pk'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "UPDATE producto SET stock = stock + $add WHERE codigo = '$pk'";

    mysqli_query($conn,$query) or die ('{"status":101}');

    $query = "INSERT INTO historial_inventario (codigo,cantidad) VALUES ('$pk',$add)";
    mysqli_query($conn,$query) or die ('{"status":102}');

    echo json_encode(array("status"=>200));
    mysqli_close($conn);
?>