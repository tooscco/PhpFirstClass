<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <form  mothed='POST' class='col-6 mx-auto'>
        <div class='mt-5 pt-5'>
            <div>
                <h3 class='text-center'>Login Page</h3>
            </div>
            <?php 
            session_start();
              if(isset($_SESSION['error'])){
                //   echo $_SESSION['error'];
                echo "<div class='text-red-200'>".$_SESSION['error']."</div>"; // .is = concatenate
               };
            //    session_unset();
            unset($_SESSION['error']);
            ?>
            <div>
                <label for="">Email</label>
                <input type="email" placeholder='Enter your email' name='email' class='form-control shadow-none'>
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" placeholder='********' name='password' class='form-control shadow-none'>
            </div>
            <div class='text-center m-3'>
                <button class='px-5 py-1 rounded' type="submit" name="submit">Login</button>
            </div>
        </div>
    </form>
</body>
</html>


