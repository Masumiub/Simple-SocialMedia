
<?php
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Akshar&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, Social Media!</title>
  </head>
  <body>

    <?php require 'partials/_navHome.php'?>
 <?php
/*
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "users";
 
 //Create a connection
 $conn = mysqli_connect($servername, $username, $password, $database);
 
 if(!$conn){
   die("Sorry we failed to connect: ". mysqli_connect_error());
 }
 
 
 //create a table in thr database
 $sql = "CREATE TABLE `status` (`sno` INT(6) NOT NULL AUTO_INCREMENT, `username` VARCHAR(12) NOT NULL, `status` VARCHAR(250) NOT NULL, PRIMARY KEY(`sno`))";
 
 $result = mysqli_query($conn, $sql);
 
 if($result){
   echo "The dbTable was created successfully!<br>";
 }
 else{
   echo "The dbTable was not created successfully because of this error";
 }
 */

 
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $usernameAC = $_POST['username'];
            $statusText = $_POST['statusText'];
            //echo "Your post was successful.<br>";


            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "users";


            $conn = mysqli_connect($servername, $username, $password, $database);

            if(!$conn){
              die("Sorry we failed to connect: ". mysqli_connect_error());
            }	



            $sql = "INSERT INTO `status` (`username`, `status`) VALUES ('$usernameAC', '$statusText')";

            $result = mysqli_query($conn, $sql);

            if(!$result){
              /*echo "The data was inserted successfully!<br>";
            }
            else{*/
              echo "The data wasn't inserted successfully because of this error";
            }
        }  
?> 
    <div class="container my-4">

    <div class="row" style="font-family: 'Akshar';">
        <div class="col-md-2 col-lg-2">
            <!-- <img src="/SocialMedia/avatar.jpg" alt="avatar.jpg" style="width: 50%;"> -->
            <h3>Welcome, <?php echo $_SESSION['username']?></h3>
            <button type="button" class="btn btn-primary btn-sm" style="border-radius: 30px;">Active</button>
        </div>

        <div class="col-md-7 col-lg-7">
            <h5>Whats on your mind?</h5>
            <div class="mb-3">
            <form action="/SocialMedia/welcome.php" method="post">
              <div class="form-group">
                  <input type="text" name="username" class="form-control" id="username">
              </div>
              
              <div class="form-group">
                  <textarea class="form-control" id="statusText" name="statusText" rows="3"></textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Post</button>
        </form>
        </div>

        <div class="col-md-3 col-lg-3">
            <h5>Settings</h5>
            <h5>Information System</h5>
            <h5>Find friends</h5>
        </div>
    </div>
    </div>

    <div class="row">
      <div class="col-md-2 col-lg-2">

      </div>
      <div class="col-md-7 col-lg-7" style="margin-left: 70px; font-family: 'Akshar'; font-size: 19px;">
      <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "users";

            //Create a connection
            $conn = mysqli_connect($servername, $username, $password, $database);

            if(!$conn){
              die("Sorry we failed to connect: ". mysqli_connect_error());
            }

            $sql = "SELECT * FROM `status`";
            $result= mysqli_query($conn, $sql);

            $num = mysqli_num_rows($result);
            //echo $num; echo "<br>";

            //display the rows returned by the sql query
            if($num>0){
              //$row = mysqli_fetch_assoc($result);
              //echo var_dump($row);
              //echo "<br>";
              while($row = mysqli_fetch_assoc($result)){
                echo $row['username'] . " has posted a post." ;
                echo "<br>";
                echo "--" . $row['status'];
                echo "<br>";
                echo "<br>";
              }
            }

      ?>
      </div>
      <div class="col-md-2 col-lg-2">

      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>