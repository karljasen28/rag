<?php 
require('../dbuser/functiondb.php');
session_start();
if(isset($_POST['update'])) {
  $password = $_POST['password'];
  $confirm_pass = $_POST['confirmpassword'];

  $output = updateUserPassword(md5($password), $_GET['id']);

  if($confirm_pass !== $password) {
      $error = "Password does not match";
  } else if($output === "UPDATED"){
    header("location: userprofile.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="userdashboard.php"><img src="../assets/images/logo.png" alt="" width="100"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="userdashboard.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="transaction.php">Tranasction</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link active" href="userprofile.php">Profile</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="../signout.php">Signout</a>
      </li>
    </ul>
  </div>
</div>
</nav>
<main>
    <div class="container bg-light py-5">
        <h3>Change Password</h3>
        <hr>
        <?php
                if(!empty($error)) {
                    echo '<h5 class="alert alert-danger">';
                    echo $error;
                    echo '</h5>';
                }
            ?>
    <form class="form-horizontal" method="POST">
      <?php foreach(getUserEmail($_GET['id']) as $data) { ?>
        <div class="form-group">
            <label for="">New Password</label>
            <input class="form-control" type="password" name="password" placeholder="Enter Password">
        </div>
        <div class="form-group">
            <label for="">Confirm Password</label>
            <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update" value="UPDATE">
        </div>
      <?php  } ?>
    </form>
    </div>
</main>
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.bundle.js.map"></script>
<script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js.map"></script>
<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.js.map"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.min.js.map"></script>
</body>
</html>