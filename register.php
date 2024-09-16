<?php
session_start();
if(isset($_POST['submit'])){
    if(empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || empty($_POST['password'])){
        // echo'Please fill all fields';
        $message = 'Please fill all fields'; //local variable
        $_SESSION['error'] = $message; //global variable
        header('Location: signup.php');
        exit(); // This Ensure script stops executing after redirection
    }else{
        $firstName = $_POST['firstName'];
        $lastName = $_POST['laastName'];
        $email= $_POST['email'];
        $password = $_POST['password'];

        header('Location: register.php')
        exit(); // This Ensure script stops executing after redirection
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <form action="" method='POST'>
    <div class='mt-5' >
            <h4>Registration Form</h4>
            <?php 
              if(isset($_SESSION['error'])){
                //   echo $_SESSION['error'];
                echo "<div class='text-red-200'>".$_SESSION['error']."</div>"; // .is = concatenate
               };
            //    session_unset();
            unset($_SESSION['error']);
            ?>
            <div>
                <label for="">First Name</label>
                <input type="text" placeholder="Teeboy" name="firstName" class="form-control">
            </div>
            <div>
                <label for="">Last Name</label>
                <input type="text" placeholder="Samuel" name="lastName" class="form-control">
            </div>
            <div>
                <label for="">Email</label>
                <input type="email" placeholder="email" name="email" class="form-control">
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" placeholder="********" name="password" class="form-control">
            </div>
            <div class='text-center mt-3 rounded'>
                <button type="submit" name="submit" class='rounded'>Submit</button>
            </div>
        </div>
    </form>
</body>
</html>