<?php
require 'backendcon.php';

header("Access-Control-Allow-Origin:*");
header("Access-COntrol-Allow-Headers: Content-Type");
header("Content-Type: application/json");

$query="SELECT * FROM notea_table";
$dncon=$connectt->query($query);

if($dncon){
    $result=$dncon->fetch_all(MYSQLI_ASSOC);

    echo json_encode([
        'status' => true,
        'message' => 'Data retrieved successfully',
        'data' => $result
    ]);
}
else{
    echo json_encode([
        'status' => false,
        'message' => 'Failed to retrieve data'
    ]);
}
?>