<?php 

 require 'patientconnect.php';
 session_start();
 echo $_SESSION['appointment_id'];
 $id= $_SESSION['appointment_id'];

 if(isset($_POST['submit'])){

    //print_r($_FILES);

    $name=$_FILES['picture']['name'];
    $temp=$_FILES['picture']['tmp_name'];
    //print_r($temp);
    $newname=time().$name;
    // print_r($newname);
    $move=move_uploaded_file($temp, 'uploads/'.$newname);

    
    if($move){
        echo 'moved';
        $query= "UPDATE `appointment_table` SET `picture`= '$newname' WHERE `appointment_id`=$id ";
        $dbconnect=$connect->query($query);
        if($dbconnect){
            header('location:patientdashboard.php');
            echo'successfully inserted';
        }else{
            echo 'query not executed';
        }
    }
    else{
        echo 'didnt move';
    }
 }
?>