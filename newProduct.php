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
        $code = "(SELECT (SELECT COUNT(*) FROM producto as pr WHERE CHAR_LENGTH(pr.codigo)<8)+1)";    
    }
    else
    {
        $code = "'".$code."'";
    }

    $query = "INSERT INTO producto(codigo,descripcion,stock,especificacion,precio) VALUES 
    ($code,'$name',$stock,'$esp',$price)";


    mysqli_query($conn,$query) or die ('{"status":101}');

    echo json_encode(array("status"=>200));
    mysqli_close($conn);
?>