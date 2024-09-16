<?php
$host='localhost';
$username='root';
$password='';
$db='note_db';

$connectt= new mysqli($host,$username,$password,$db);
if(!$connectt){
echo 'Connection failed'.$connectt->connect_error;
}
else{

}

?>