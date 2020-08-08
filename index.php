<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "magicnotes";
$insert = false;

$conn = mysqli_connect($servername, $username , $password, $database);
 if(!$conn){
   die("Failed to Connect");
 }
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>PHP Project</title>
  </head>
  <body>
      <div class="container">
        <h2>Magic Notes Login</h2>
      </div>
      <div class="container">
        <?php

        if($_SERVER['REQUEST_METHOD']=="POST"){
          $email = $_POST['email'];
          $pass = $_POST['pass'];
          $sql = "INSERT INTO `users` (`sno`, `email`, `password`) VALUES (NULL, '$email', '$pass')";
          $result = mysqli_query($conn, $sql);
          if($result){
            $insert = true;
          }
        }

        if($insert){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success</strong>You are ready to go.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
        else{
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Sorry for the inconvenience caused but we are facing some technical issues.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
        ?>
      </div>



    <div class="container my-5">

        <form action = /PHPPROJECT/index.php method = "POST">
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" name ="email" id="email"
              aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name ="pass" id="password">
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="/PHPPROJECT/firstpage.php" role="button">Link</a>
          </form>



    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>