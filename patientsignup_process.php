<?php
 require 'patientconnect.php';

if (isset($_POST['submit'])){
    // echo 'proccessing';
    // print_r($_POST);
    
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];

$hashedpass=password_hash($password,PASSWORD_DEFAULT);
// echo $hashedpass;

    $query="INSERT INTO `appointment_table`(`firstName`,`lastName`,`email`,`address`,`password`,`gender`) VALUES ('$fname','$lname','$email','$address','$hashedpass','$gender')";

 

//    print_r($query);

    // $dbconnection=$connect->query($query);
    $dbcon=$connect->query($query);

 if($dbcon){
    echo $dbcon.'successfully inserted;';
 }
 else{
    echo 'query not ran';
 }
    

}
else{
    header('location:patientsignup.php');
}



?>