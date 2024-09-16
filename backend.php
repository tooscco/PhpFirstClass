<?php 
require 'backendcon.php';
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers:Content-Type");
header("Content-Type: application/json");
// header("Access-Control-Allow-Methods:POST, GET, OPTIONS, DELETE, PUT");

// if($_SERVER['REQUEST_METHOD']=='OPTIONS'){
//     exit(0);
// }

$input= json_decode(file_get_contents("php://input"));
$title=$input->title;
$content=$input->content;
// echo json_encode( $content);

$query= "INSERT INTO `notea_table` (`title`, `content`) VALUES (?,?)";
$dbcon=$connectt->prepare($query);
$dbcon->bind_param('ss', $title, $content);
$dbcon->execute();

if($dbcon){
    $results=[
        'message'=>'successfully inserted',
        'status'=>true,
        'user'=>$input
    ];
    echo json_encode($results);
}
else{
    $results=[
        'message'=>'Failed to insert',
        'status'=>false,
    ];
    echo json_encode($results);
}
?>