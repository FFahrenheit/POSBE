<?php
    $user = $_GET['user'];
    $cash = $_GET['cash'];
    $total = $_GET['total'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "UPDATE cuenta SET 
    total = $total, 
    pagado = $cash,
    estado = 'cerrada' 
    WHERE caja = '$user' AND estado = 'abierta'";

    mysqli_query($conn,$query) or die ('{"status":101}');
    
    echo json_encode(array("status"=>200));
    mysqli_close($conn);
?>