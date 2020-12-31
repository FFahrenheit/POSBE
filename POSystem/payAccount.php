<?php
    $user = $_GET['user'];
    $cash = $_GET['cash'];
    $total = $_GET['total'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "SELECT clave FROM cuenta WHERE caja = '$user' AND estado = 'abierta'";
    $result = mysqli_query($conn,$query) or die ('{"status":101}');

    $row = mysqli_fetch_array($result);
    $pk = $row['clave']; 

    $query = "UPDATE cuenta SET 
    total = $total, 
    pagado = $cash,
    estado = 'cerrada' 
    WHERE caja = '$user' AND estado = 'abierta'";

    mysqli_query($conn,$query) or die ('{"status":101}');
    
    echo json_encode(array("status"=>200,"pk"=>$pk));
    mysqli_close($conn);
?>