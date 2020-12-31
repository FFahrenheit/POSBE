<?php 
    $code = $_GET['code'];
    $conn = mysqli_connect("localhost","root","","posystem")
    or die ('{"status":100}');

    $query = "SELECT * FROM producto WHERE codigo LIKE '$code%' LIMIT 20";

    $results = mysqli_query($conn,$query)
    or die ('{"status":101}');
    $data = array();

    while($row = mysqli_fetch_assoc($results))
    {
        $data[] = $row;
    }

    echo json_encode($data);
	mysqli_close($conexion);

?>