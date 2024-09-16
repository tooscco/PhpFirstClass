<?php
 require 'patientconnect.php';
 session_start();

if (isset($_POST['submit'])){
    
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];

    $query="SELECT * FROM `appointment_table` WHERE email=?";
    $prepare=$connect->prepare($query);
    $prepare->bind_param('s', $email);
    $execute=$prepare->execute();
    if($execute){
        // print_r($prepare);
        $user=$prepare->get_result();
        // print_r($user);
        if($user->num_rows>0){
            echo 'email exists';
            // header('location:seller_php');
        }
        else{
            $hashedpass=password_hash($password,PASSWORD_DEFAULT);

    $query= "INSERT INTO `appointment_table` (`firstName`,`lastName`,`email`,`password`,`address`,`gender`) VALUES (?,?,?,?,?,?)";
    $prepare = $connect-> prepare ($query);
    $prepare-> bind_param('ssssss', $fname, $lname, $email, $hashedpass, $address, $gender );
    $execute= $prepare->execute();

    print_r($execute);
    if($execute){
        header('location:patientsignin.php');
        // echo 'inserted';
    }
    else{

        echo 'not inserted';
    }
        }
    }


    

}

?>