<?php
require('../dbuser/functiondb.php');
session_start();

  $output = checkVerified($_SESSION['id']);
  $id = $_SESSION['id'];

  foreach($output as $data) {
    $check_status = $data['account'];
    $check_profile = $data['pro_pic'];
  }

  if($check_status === "unverified") {
    $warning  = "Please verify your account";
  }

  if($check_profile === null || empty($check_profile)) {
    $mes = "Complete your profile";
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        <a class="nav-link active" href="userdashboard.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="transaction.php">Transaction</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="userprofile.php">Profile</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="../signout.php">Signout</a>
      </li>
    </ul>
  </div>
</div>
</nav>

<main>
  <div class="container-fluid ml-auto">
    <div class="row">
      <div class="col">
      <?php
        if(!empty($warning)) {
            echo '<p class="alert alert-warning">';
            echo $warning;
            echo '<a class="text-primary ml-3" href="verification.php?id='.$id.'">Click here to verify.</a>';
            echo '</p>';
        }
        if(!empty($mes)) {
          echo '<p class="alert alert-warning">';
          echo $mes;
          echo '<a class="text-primary ml-3" href="userprofile.php">Click here.</a>';
          echo '</p>';
      }
      ?>
      </div>
    </div>
    <div class="row" style="padding-left: 150px;">
    <?php foreach(getAllGadget() as $data) { ?>
      <div class="col-lg-2 bg-white py-3 mt-4 mr-3">
          <input type="text" id="valid" value="<?php echo $check_status ?>" hidden>
          <div class="text-center pb-3">
            <img class="img-fluid text-center" src="../assets/images/<?php echo $data['g_pic']?>" alt="oppo" width="150">
          </div>
          <p><?php echo $data['g_brand'] ?> <?php echo $data['g_model'] ?></p>
          <p><?php echo $data['g_desc'] ?></p>
          <h6 class="text-success">₱<?php echo $data['g_price'] ?>.00 / Per Day</h6>
            <a class="btn btn-primary col mt-3" href="view.php" id="checkvalid">View</a>
      </div>
    <?php } ?>
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
  var valid = document.getElementById("valid").value;
  document.getElementById("checkvalid");

  if(valid === "unverified") {
    document.getElementById("checkvalid").hidden = true;
  } else {
    document.getElementById("checkvalid").hidden = false;
  }

</script>
</body>
</html>