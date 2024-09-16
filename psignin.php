<?php
require 'patientconnect.php';
session_start();

if (isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="SELECT * FROM `appointment_table` WHERE email='$email' ";
    $dbcon=$connect->query($query);
    if ($dbcon){
        if($dbcon->num_rows>0){
            $user=$dbcon->fetch_assoc();
            // print_r($user['password']);
            $hashedpassword= $user['password'];
            $password_verify=password_verify($password,$hashedpassword);

            if($password_verify){
                $_SESSION['appointment_id']=$user['appointment_id'];
                header('location:patientdashboard.php');
                // echo $password_verify;
            }
            else{
                echo 'Incorrect email or password';
            }
        }
        else{
            echo 'Incorrect email or password';
        }
    }
    else{
        echo 'Errors running queries';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class='container'>
        <div class='col-8 shadow mx-auto'>
            <h1 class='text-center text-primary'>Sign In Page</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']  ?> " method="post" class='mx-3'>
                <input type="email" name="email" class='form-control my-2 shadow-none' placeholder='Email'>
                <input type="password" name="password" class='form-control my-2 shadow-none' placeholder='Password'>
                <input type="submit" name="submit" class='btn btn-primary w-100 p-2 mb-3' value='Sign in here!'>
            </form>
        </div>
    </div>
</body>
</html>