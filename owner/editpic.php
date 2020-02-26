<?php
    session_start();
    $id = $_SESSION['id'];
    if (isset($_POST['btnsave'])) {
        $pro_pic = $_POST['profile'];

        require '../dbowner/db.php';
        $sql = "UPDATE users SET pro_pic = '$pro_pic' WHERE id=".$id;
        $res = mysqli_query($con, $sql);

        if ($res) {
            echo "<script>alert('Success');window.location='owner_profile.php'</script>";
        }else{
            echo "<script>alert('Profile picture not added');window.location='owner_profile.php'</script>";
        }
    }
?>
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
      <li class="nav-item">
        <a class="nav-link" href="ownerdashboard.php">Transactions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="devices.php">My Devices</a>
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
    <div class="container bg-light py-5">
        <h3>Choose Profile Picture</h3>
        <hr>
    <form class="form-horizontal" method="POST" action="">
        <img class="img-fluid" id="image" src="#" alt="Profile image" width="150">
        <br><br>
        <div class="form-group">
            <label for="">Choose file</label>
            <input class="form-control" type="file" name="profile" id="imgchoosen">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="btnsave" value="Update Profile">
        </div>
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
<script src="../assets/js/sweetalert2.all.min.js"></script>
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgchoosen").change(function(){
    readURL(this);
});

function alertFire(){
  Swal.fire(
    'Good job!',
    'You clicked the button!',
    'success'
  );
}
</script>
</body>
</html>