
<?php
    $showAlert = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists = false;

    if(($password == $cpassword) && $exists==false){

        $sql ="INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        if($result){
           $showAlert = true;
        }
    }
    else{
        $showError = "Passwords don't match!";
    }

    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, Social Media!</title>
  </head>
  <body>

    <?php require 'partials/_nav.php'?>

    <?php

    if($showAlert){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    Success! Your Account was created.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>' ;
    }

    if($showError){
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Sorry! Please confirm the password again.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>' ;
        }

    ?>

    <div class="container my-4" style="font-family: 'Akshar'; ">

    <div class="row">
        <div class="col-md-8 col-lg-8">
          <img src="/SocialMedia/Login scene.jpg" alt="signup" style="width: 90%;">
        </div>

        <div class="col-md-4 col-lg-4">
        <h1 class="text-center" >Don't have an Account? Signup Today.</h1> 
            <form action="/SocialMedia/signup.php" method = "post">

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Signup</button>
            </div>
            </form>
        </div>
    </div>
         

    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>