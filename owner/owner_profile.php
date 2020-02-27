<?php
  session_start();

  require '../dbowner/db.php';

  $id = $_SESSION['id'];
  $sql = "SELECT * FROM users WHERE id=".$id;
  $res = mysqli_query($con, $sql);
  while ($data = mysqli_fetch_assoc($res)){
    $pro_pic = $data['pro_pic'];
    $fname = $data['fname'];
    $lname = $data['lname'];
    $gender = $data['gender'];
    $bdate = $data['bdate'];
    $address = $data['address'];
    $contactno = $data['contactno'];
    $email = $data['email'];
    $password = $data['password'];
    $account = $data['account'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAG</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png">
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
      <input type="text" id="hidden" value="<?php echo $account ?>" hidden>
      <li class="nav-item">
        <a class="nav-link" href="ownerdashboard.php" id="view2">Transactions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="devices.php" id="view1">My Devices</a>
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

    <div class="container bg-white mb-5 py-3 px-5">
        <h3>Owner Profile</h3>
        <hr>
        
        <div class="row">
            <div class="col">
                <img class="rounded rounded-circle" src="../assets/images/<?php echo $pro_pic;?>" alt="profile" width="150" height="150">
                <br>
                <a class="text-primary" href="editpic.php">Change Photo</a>
            </div>
        </div>  
        <div class="form-inline pt-5">
            <div class="form-group">
              <label>Gender </label>
              <input class="form-control mx-3" type="email" value="<?php echo $gender;?>" disabled>
            </div>
            <div class="form-group">
                <label>Birthdate </label>
                <input class="form-control mx-3" type="email" value="<?php echo $bdate;?>" disabled>
            </div>
        </div>
        <div class="form-inline pt-5">
            <div class="form-group">
              <label>Address </label>
              <input class="form-control mx-3" type="email" value="<?php echo $address;?>" disabled>
            </div>
            <div class="form-group">
                <label>Contact No. </label>
                <input class="form-control mx-3" type="email" value="<?php echo $contactno;?>" disabled>
            </div>
        </div>
        <br>
        <a class="text-primary" href="editinfo.php">Edit Info</a>
        <hr>
        <h3>Account Information</h3>
        <div class="form-horizontal">
            <div class="form-group">
                <label for="">Email</label>
                <input class="form-control" type="email" value="<?php echo $email;?>" disabled>
                <a class="text-primary" href="editemail.php">Update Email</a>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input class="form-control" type="password" value="<?php echo $password;?>" disabled>
                <a class="text-primary" href="ownerchangepass.php">Change Password</a>
            </div>
        </div>
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
<script>
var hidden = document.getElementById("hidden").value;
if(hidden === "unverified") {
    document.getElementById("view1").hidden = true;
    document.getElementById("view2").hidden = true;
} else {
    document.getElementById("view1").hidden = false;
    document.getElementById("view2").hidden = false;
}
</script>
</body>
</html>