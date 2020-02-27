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
    $mes = "Choose your profile image";
  }

  foreach(trapValidation($_SESSION['id']) as $data) {
    $pending_status = $data['val_status'];
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
<input type="text" id="stats" value="<?php echo $pending_status ?>" hidden>
<?php
  if(!empty($pending_status) && $pending_status === "pending") {
    echo '<div style="margin-left: auto; margin-right:auto;margin-top: 20px;"
          <p class="alert alert-primary col-lg-6"> 
          <strong>Attention!</strong> Requirements sent! Please wait for admin verification. 
          </p>
          </div>';
  }

  if(!empty($warning)) {
      echo '<div id="alertHide" style="margin-left: auto; margin-right:auto;margin-top: 20px;"';
      echo '<p class="alert alert-warning col-lg-6">';
      echo $warning;
      echo '<a class="text-primary ml-3" href="verification.php?id='.$id.'">Click here to verify.</a>';
      echo '</p>';
      echo '</div>';
  }
  if(!empty($mes)) {
    echo '<div style="margin-left: auto; margin-right:auto;margin-top: 20px;"';
    echo '<p class="alert alert-warning col-lg-6">';
    echo $mes;
    echo '<a class="text-primary ml-3" href="userprofile.php">Click here.</a>';
    echo '</p>';
    echo '</div>';
}

?>
<input type="text" id="valid" value="<?php echo $check_status ?>" hidden>
<div class="container-fluid py-5" id="checkvalid">
  <div class="container">
    <div class="row">
      <?php foreach(getAllGadget() as $g) { ?>
        <div class="col-lg-2 bg-white mr-3 mt-3 py-2">
          <div class="text-center">
            <img src="../assets/images/<?php echo $g['g_pic'] ?>" alt="gadget image" width="120">
          </div>
          <p>
          Model: <?php echo $g['g_model'] ?> <br>
          Brand: <?php echo $g['g_brand'] ?> <br>
          Description: <?php echo $g['g_desc'] ?> <br>
          Price: <strong class="text-success"> <?php echo $g['g_price']; ?>.00 </strong>
          </p>
          <a class="btn btn-info" href="view.php?id=<?php echo $g['g_id'] ?>">View</a>
        </div>
      <?php } ?>
    </div>
  </div>
</div>



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

  var stats = document.getElementById("stats").value;
  if(stats === "pending") {
    document.getElementById("alertHide").hidden = true;
  } else {
    document.getElementById("alertHide").hidden = false;
  }

</script>
</body>
</html>