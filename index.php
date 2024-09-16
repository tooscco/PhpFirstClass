<?php

session_start();

// echo json_encode('45')
// print_r('Muizz')


// $name = 'Muizz';
// $num = 4;

// echo json_encode($name .' '. $num);
// echo'<br>';
// print_r($name .' '. $num);
// echo'<br>';
// echo json_encode($name)

// objects
// $students =['Janet', 'Muizz', 'Alok', 'Bibi', 'Teeboy']; 
// $newStudents =[
//     'name' => 'Teeboy',
//     'school' => 'SQI',
//     'paidFees'=> false
// ];
// associating variables

// $isAdmin = false;

// Displaying variables
// echo$name;
// echo $num;
// print_r($newStudents['name']);

if(isset($_POST['submit'])){
    if(empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || empty($_POST['password'])){
        // echo'Please fill all fields';
        $message = 'Please fill all fields'; //local variable
        $_SESSION['error'] = $message; //global variable
        header('Location: signup.php');
    }else{
        $firstName = $_POST['firstName'];
        $email = $_POST['email'];
        echo $firstName, $email;
    }
}