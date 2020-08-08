<?php 
$servername = "localhost";
$username ="root";
$password = "";
$database = "magicnotes";
$insert = false;

$conn = mysqli_connect($servername, $username ,$password ,$database);
 if(!$conn){
     die("Unable to process your request at the moment. Try again Later");
 }

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $title = $_POST['note'];
     $details =  $_POST['description'];
     $sql1 = "INSERT INTO `posts` (`sno`, `note`, `description`) VALUES (NUll, '$title', '$details')";
     $result = mysqli_query($conn, $sql1);
     if($result){
         $insert = true;
         
     }
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

    <!-- Datatables.net CSS to add pagination -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">


    <title>Magic Notes</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Magic Notes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Me</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/PHPPROJECT/index.php">Login</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
 <!-- Alert to show that your note has been saved in the database -->
<div class="container mt-3">
    <?php 
    if($insert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Success!</strong> Your Note has been saved.
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div> ';
    }   
    ?>
</div>
<div class="container mt-3">
<form action = /PHPPROJECT/firstpage.php method="POST">
  <div class="form-group">
    <label for="note">Note</label>
    <input type="text" class="form-control" name="note" id="note">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control"  name= "description" id="description" rows="4"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Add Note</button>
</form>
</div>
<div class="container my-5">



<table class="table" id = "myTable">  <!---id=mytable is provided to add pagination facility-->
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Note</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

<!-- Fetching the notes from the database -->
  <?php  
$sql = "SELECT * FROM `posts`";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    echo '<tr>
    <th scope="row">' .$row['sno'].'</th>
    <td>'.$row['note']. '</td>
    <td> ' .$row['description'].'</td>
    <td>Actions</td>
  </tr>';
}
?>
  </tbody>
</table>
</div>


    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>


    <!-- These scripts are added afterward to provide pagination facility -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <!-- this script is provided by datatables.net to add pagination -->
    <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );</script>
  </body>
</html>