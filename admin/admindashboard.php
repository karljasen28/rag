<?php
  session_start();

  $id = $_SESSION['id'];

  require '../dbowner/db.php';
  $sql = "SELECT * FROM users WHERE type = 'owner'";
  $res = mysqli_query($con, $sql);
  $rows = mysqli_num_rows($res);

  $sql2 = "SELECT * FROM users WHERE type = 'user'";
  $res2 = mysqli_query($con, $sql2);
  $rows2 = mysqli_num_rows($res2);

  $sql3 = "SELECT * FROM users WHERE type = 'owner' && account = 'verified'";
  $res3 = mysqli_query($con, $sql3);
  $rows3 = mysqli_num_rows($res3);

  $sql4 = "SELECT * FROM users WHERE type = 'owner' && account = 'unverified'";
  $res4 = mysqli_query($con, $sql4);
  $rows4 = mysqli_num_rows($res4);

  $sql5 = "SELECT * FROM users WHERE type = 'user' && account = 'verified'";
  $res5 = mysqli_query($con, $sql5);
  $rows5 = mysqli_num_rows($res5);

  $sql6 = "SELECT * FROM users WHERE type = 'user' && account = 'unverified'";
  $res6 = mysqli_query($con, $sql6);
  $rows6 = mysqli_num_rows($res6);

  $sql7 = "SELECT * FROM validation";
  $res7 = mysqli_query($con, $sql7);
  $rows7 = mysqli_num_rows($res7);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="admindashboard.php"><img src="../assets/images/logo.png" alt="" width="100"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link active" href="admindashboard.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="validationlist.php">Validation List</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="list.php">Account List</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="../signout.php">Signout</a>
      </li>
    </ul>
  </div>
</div>
</nav>

<main>
    <div class="container" id="view">
        <div class="row">
            <div class="col">
                <div class="card m-auto" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">Gadget Owners</h5>
                    <h6 class="card-subtitle mb-2 text-muted"><span class="badge badge-primary"><?php echo $rows;?></span> registered owners</h6>
                    <h6 class="card-subtitle mb-2 text-muted"><span class="badge badge-success"><?php echo $rows3;?></span> verified</h6>
                    <h6 class="card-subtitle mb-2 text-muted"><span class="badge badge-danger"><?php echo $rows4;?></span> unverified</h6>
                    <div class="text-center py-3"><img src="../assets/images/team.svg" alt="" width="150"></div>
                    <a href="list.php" class="btn btn-primary btn-block mt-2">View</a>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card m-auto" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <h6 class="card-subtitle mb-2 text-muted"><span class="badge badge-danger"><?php echo $rows2;?></span> registered users</h6>
                    <h6 class="card-subtitle mb-2 text-muted"><span class="badge badge-success"><?php echo $rows5;?></span> verified</h6>
                    <h6 class="card-subtitle mb-2 text-muted"><span class="badge badge-danger"><?php echo $rows6;?></span> unverified</h6>
                    <div class="text-center py-3"><img src="../assets/images/team2.svg" alt="" width="150"></div>
                    <a href="list.php" class="btn btn-primary btn-block mt-2">View</a>
                </div>
                </div>
            </div>
            <div class="col">
                <div class="card m-auto" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">Verification List</h5>
                    <h6 class="card-subtitle mb-2 text-muted"><span class="badge badge-danger"><?php echo $rows7;?></span> pending</h6><br><br>
                    <div class="text-center py-3"><img src="../assets/images/tick.svg" alt="" width="150"></div>
                    <a href="list.php" class="btn btn-primary btn-block mt-2">View</a>
                </div>
                </div>
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
</body>
</html>