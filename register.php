<?php 
    require("dbuser/functiondb.php");

    if(isset($_POST['register'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $bdate = $_POST['bdate'];
        $address = $_POST['address'];
        $contactno = $_POST['contactno'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $type = $_POST['type'];
        $status = "active";
        $account = "unverified";

        $message = registerUser($fname, $lname, $gender, $bdate, $address, $contactno, $email, $password, $type, $status, $account);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAG</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="#">RAG</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
    </ul>
  </div>
</div>
</nav>

    <main>
        <div class="container reg py-5">
            <h3>Registration Form</h3>
            <?php
                if(!empty($message)) {
                    echo '<h3 class="alert alert-success">';
                    echo $message;
                    echo '</h3>';
                }
            ?>
            <form method="POST" action="">
                <div class="row">
                    <div class="col">
                        <label>First name</label>
                        <input class="form-control" type="text" name="fname" placeholder="First name" required="">
                    </div>
                    <div class="col">
                        <label>Last name</label>
                        <input class="form-control" type="text" name="lname" placeholder="First name" required="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label>Sex</label>
                        <select class="form-control" name="gender" required="">
                            <option hidden>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col">
                        <label>Birth Date</label>
                        <input class="form-control" type="date" name="bdate" required="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label>Address</label>
                        <input class="form-control" type="text" name="address" placeholder="Address" required="">
                    </div>
                    <div class="col">
                        <label>Contact No.</label>
                        <input class="form-control" type="tel" pattern="[0-9]{4}[0-9]{3}[0-9]{4}" name="contactno" id="contactno" placeholder="Phone Number" maxlength="11" size="11" required="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Email" required="">
                    </div>
                    <div class="col">
                        <label>Client Type</label>
                        <select class="form-control" name="type">
                            <option hidden>Select Type</option>
                            <option value="user">User</option>
                            <option value="owner">Owner</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password" required="">
                    </div>
                </div>
                <div class="form-group mt-4">
                    <input class="btn btn-success col" type="submit" name="register" value="Register">
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