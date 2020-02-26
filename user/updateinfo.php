<?php 
require('../dbuser/functiondb.php');
session_start();

$id = $_SESSION['id'];

if(isset($_POST['update'])) {
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contactno = $_POST['contactno'];

    $output = updateUserInfo($gender, $address, $contactno, $id);

    if($output === "UPDATED") {
        header("location: userprofile.php");
    } else {
        $message = "Failed to Update";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
        <h3>Update Information</h3>
        <hr>
    <form class="form-horizontal" method="POST">
        <?php foreach(getUserUpdate($_SESSION['id']) as $data) { ?>
        <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender">
                <option hidden>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input class="form-control" type="text" name="address" placeholder="Address" value="<?php echo $data['address']?>">
        </div>
        <div class="form-group">
            <label>Phone No.</label>
            <input class="form-control" type="text" name="contactno" placeholder="Contact Number" value="<?php echo $data['contactno']?>">
        </div>
        <div class="form-group">
            <input class="btn btn-primary col-lg-3" type="submit" name="update" value="SAVE">
        </div>
        <?php } ?>
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