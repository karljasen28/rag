<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAG</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="ownerdashboard.php"><img src="../assets/images/logo.png" alt="" width="100"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="ownerdashboard.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="owner_profile.php">Profile</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="../signout.php">Signout</a>
      </li>
    </ul>
  </div>
</div>
</nav>
<main>
<div class="container bg-white py-5">
    <h5>Send a Government documents to validate your account.</h5>
        <form class="form-horizontal mt-5" method="POST">
        <div class="form-group">
            <input class="form-control" type="file" name="file" required>
        </div>
        <div class="form-group mt-3">
            <input class="btn btn-primary col-lg-1" type="submit" name="btnVerify" value="Verify">
        </div>
        </form>
    </div>
</main>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.js.map"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js.map"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js.map"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js.map"></script> 
</body>
</html>

<?php
  session_start();

  $id = $_SESSION['id'];
  if (isset($_POST['btnVerify'])) {
    $file = $_POST['file'];

    require '../dbowner/db.php';
    $sql = "INSERT INTO validation(user_id, val_pic, val_status) VALUES('$id','$file','pending')";
    $res = mysqli_query($con, $sql);

    if ($res) {
      echo "<script>alert('Verification sent!');window.location='ownerdashboard.php'</script>";
    }
    else{
      mysqli_error();
    }
  }
?>