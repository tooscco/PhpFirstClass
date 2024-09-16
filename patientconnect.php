<?php
$host='localhost';
$username='root';
$password='';
$db='patients_db';

$connect= new mysqli($host,$username,$password,$db);
if(!$connect){
echo 'Connection failed'.$connect->connect_error;
}
else{

}

?>