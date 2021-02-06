<?php 
    $code = $_GET['code'];
    $name = $_GET['name'];
    $esp = $_GET['esp'];
    $stock = $_GET['stock'];
    $price = $_GET['price'];

    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    if($code=="")
    {
        $query = "SELECT (SELECT CAST(codigo AS UNSIGNED) as code FROM 
        producto WHERE CHAR_LENGTH(producto.codigo)<8 ORDER BY code DESC LIMIT 1) + 1 as NewCode";    
        $result = mysqli_query($conn,$query) or die ('{"status":101}');
        $row = mysqli_fetch_array($result);
        $code = $row['NewCode'];
    }
    else
    {
        $code = "'".$code."'";
    }

    $query = "INSERT INTO producto(codigo,descripcion,stock,especificacion,precio) VALUES 
    ($code,'$name',$stock,'$esp',$price)";

    mysqli_query($conn,$query) or die ('{"status":101}');

    echo json_encode(array("status"=>200, "code" => $code ));
    
    mysqli_close($conn);
?>