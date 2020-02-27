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
<?php
    session_start();

    $id = $_SESSION['id'];
    require '../dbowner/db.php';
    $sql = "SELECT * FROM users WHERE id=".$id;
    $res = mysqli_query($con,$sql);
    while ($data = mysqli_fetch_assoc($res)) {
        $email = $data['email'];
    }

    if (isset($_POST['updateemail'])) {
        $email = $_POST['email'];
        require '../dbowner/db.php';
        $sql = "UPDATE users SET email = '$email' WHERE id=".$id;
        $res = mysqli_query($con,$sql);

        if ($res) {
            echo "<script>alert('Email updated successfully!');window.location='owner_profile.php'</script>";
        }
        else{
            echo "<script>alert('Error!');window.location='owner_profile.php'</script>";
        }
    }
?>
    <div class="container bg-light py-5">
        <h3>Update Email</h3>
        <hr>
    <form class="form-horizontal" method="POST" action="">
        <div class="form-group">
            <label for="">Email</label>
            <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="updateemail" value="UPDATE">
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
</body>
</html>