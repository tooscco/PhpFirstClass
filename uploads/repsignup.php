<?php
 require 'patientconnect.php';
 session_start();

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

    $query="INSERT INTO ` appointment_table` (`firstName`,`lastName`,`email`,`address`,`password`,`gender`) VALUES (?,?,?,?,?,?)";
    $prepare=$connect->prepare($query);
    $prepare->bind_param('ssssss',$fname,$lname,$email,$address,$hashedpass,$gender);
    $execute=$prepare->execute();
    if($execute){
        echo 'inserted';
    }
    else{
        echo 'not inserted';
    }

}

    //  print_r($_POST);
//     $query ="SELECT * FROM `appointment_table` WHERE email='$email' ";
//     $dbcon=$connect->query($query);
//     if($dbcon){
//         // print_r($dbcon);
//         if($dbcon->num_rows>0){
//             $_SESSION['msg']='Email exists';
//             header('location:patientsignup.php');
//         }
//         else{
//             $hashedpass=password_hash($password,PASSWORD_DEFAULT);
//     // echo $hashedpass;
    
//         $query="INSERT INTO `appointment_table`(`firstName`,`lastName`,`email`,`address`,`password`,`gender`) VALUES ('$fname','$lname','$email','$address','$hashedpass','$gender')";
    
     
    
//     //    print_r($query);
    
//         // $dbconnection=$connect->query($query);
//         $dncon=$connect->query($query);
    
//      if($dncon){
//         header('location:psignin.php');
//         // echo $dbcon.'successfully inserted;';
//      }
//      else{
//         echo 'query not ran';
//      }
//         }
//     }
//     else{
//         echo 'query not ran';
//     }
    

    

// }
// else{
//     header('location:patientsignup.php');




?>