<?php 
require('../dbuser/functiondb.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
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
        <a class="nav-link" href="transaction.php">Transaction</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="userprofile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../signout.php">Signout</a>
      </li>
    </ul>
  </div>
</div>
</nav>

<main>
    <div class="container bg-white mb-5 py-3 px-5">
        <h3>User Profile</h3>
        <hr>
        <?php 
          foreach(getUserProfile($_SESSION['id']) as $data ){
        ?> 
        <div class="row">
            <div class="col">
                <img class="rounded rounded-circle" src="../assets/images/<?php echo $data['pro_pic']?>" alt="profile" width="150" height="150">
                <h5 class="mt-3"><?php echo $data['fname']; echo " "; echo $data['lname'] ?></h5>
                <a class="text-primary" href="editprofilepic.php?id=<?php echo $data['id']?>">Change Photo</a>
            </div>
        </div>
        <div class="form-inline pt-5">
            <div class="form-group">
              <label>Gender </label>
              <input class="form-control mx-3" type="email" value="<?php echo $data['gender']?>" disabled>
            </div>
            <div class="form-group">
                <label>Birthdate </label>
                <input class="form-control mx-3" type="email" value="<?php echo $data['bdate']?>" disabled>
            </div>
        </div>
        <div class="form-inline pt-5">
            <div class="form-group">
              <label>Address </label>
              <input class="form-control mx-3" type="email" value="<?php echo $data['address']?>" disabled>
            </div>
            <div class="form-group">
                <label>Contact No. </label>
                <input class="form-control mx-3" type="email" value="<?php echo $data['contactno']?>" disabled>
            </div>
        </div>
        <br>
        <a class="text-primary" href="updateinfo.php?id=<?php echo $data['id']?>">Edit Info</a>
        <hr>
        <h3>Account Information</h3>
        <div class="form-horizontal">
            <div class="form-group">
                <label for="">Email</label>
                <input class="form-control" type="email" value="<?php echo $data['email']?>" disabled>
                <a class="text-primary" href="updateuseremail.php?id=<?php echo $data['id']?>">Update Email</a>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input class="form-control" type="password" value="<?php echo $data['password']?>" disabled>
                <a class="text-primary" href="userchangepassword.php?id=<?php echo $data['id']?>">Change Password</a>
            </div>
        </div>
    </div>
          <?php } ?>
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