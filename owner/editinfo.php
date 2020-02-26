<?php
    session_start();

    $id = $_SESSION['id'];
    require '../dbowner/db.php';
    $sql = "SELECT * FROM users WHERE id=".$id;
    $res = mysqli_query($con, $sql);
    while ($data = mysqli_fetch_assoc($res)) {
        $address = $data['address'];
        $contactno = $data['contactno'];
    }
    if (isset($_POST['btnupdate'])) {
        $address = $_POST['address'];
        $contactno = $_POST['contactno'];

        require '../dbowner/db.php';
        $sql = "UPDATE users SET address = '$address', contactno = '$contactno' WHERE id=".$id;
        $res = mysqli_query($con,$sql);

        if ($res) {
            echo "<script>alert('Information updated successfully!');window.location='owner_profile.php'</script>";
        }else {
            echo "<script>alert('Error!');window.location='owner_profile.php'</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <h3>Update Information</h3>
        <hr>
    <form class="form-horizontal" method="POST">
        <div class="form-group">
            <label>Address</label>
            <input class="form-control" type="text" name="address" placeholder="Address" value="<?php echo $address;?>">
        </div>
        <div class="form-group">
            <label>Phone No.</label>
            <input class="form-control" type="text" name="contactno" placeholder="Contact Number" value="<?php echo $contactno;?>">
        </div>
        <div class="form-group">
            <input class="btn btn-primary col-lg-3" type="submit" name="btnupdate" value="SAVE">
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
</body>
</html>