<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Sign Up Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class='col-6 mx-auto'>
            <h1 class='text-primary text-center'> Sign Up Page</h1>
            <form action="patientresignup.php" method="post">
            <input type="text" name="firstname" class="form-control shadow-none" placeholder="First Name">

            <input type="text" name="lastname" class="form-control shadow-none" placeholder="Last Name">

            <input type="email" name="email" class="form-control shadow-none" placeholder="Email">

            <input type="password" name="password" class="form-control shadow-none" placeholder="Password">

            <input type="text" name="gender" class="form-control shadow-none" placeholder="Gender">

            <input type="text" name="address" class="form-control shadow-none" placeholder="Address">

            <input type="submit" name="submit" class="btn btn-primary w-100" value='Sing up here!'>
            </form>
        </div>
    </div>

    <div>
        <?php
        session_start();
        if(isset($_SESSION['msg']))
        echo "<div class='textdanger text-center'>".$_SESSION['msg']."</div>"
        ?>
    </div>
</body>
</html>