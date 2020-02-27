<?php
require('../dbuser/functiondb.php');
session_start();

  $output = checkVerified($_SESSION['id']);
  $id = $_SESSION['id'];

  foreach($output as $data) {
    $check_status = $data['account'];
    $check_profile = $data['pro_pic'];
  }

  if($check_profile === null || empty($check_profile)) {
    $mes = "Choose your profile image";
  }

  if(isset($_POST['addtocart'])) {
      $gad_id = $_POST['gad_id'];
      $owner_id = $_POST['owner_id'];
      $user_id = $_POST['user_id'];
      $tran_status = "pending";

      $action = addToCart($gad_id, $owner_id, $user_id, $tran_status);
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
    <link rel="stylesheet" href="../assets/fontawesome/css/all.css">
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

<?php
  if(!empty($mes)) {
    echo '<div style="margin-left: auto; margin-right:auto;margin-top: 20px;"';
    echo '<p class="alert alert-warning col-lg-6">';
    echo $mes;
    echo '<a class="text-primary ml-3" href="userprofile.php">Click here.</a>';
    echo '</p>';
    echo '</div>';
}
?>

  <div class="container bg-white mt-5 py-5">
  <?php
    if(!empty($action)) {
        echo '<p class="alert alert-success col-lg-6">';
        echo $action;
        echo '</p>';
    }
  ?>
    <div class="row">
        <?php foreach(getGadgetId($_GET['id']) as $g) { ?>
            <div class="col">
                <form method="POST" action="" class="form-horizontal">
                    <div class="form-inline">
                        <h4>Gadget Information</h4>
                        <input type="text" name="gad_id" value="<?php echo $g['g_id']?>" hidden>
                        <input type="text" name="owner_id" value="<?php echo $g['owner_id']?>" hidden>
                        <input type="text" name="user_id" value="<?php echo $_SESSION['id']?>" hidden>
                        <button type="submit" name="addtocart" class="btn btn-success ml-auto mr-5"><i class="fas fa-cart-plus mr-2"></i> Add to cart</button>
                    </div>
                    <hr>
                    <div class="form-inline pl-5">
                        <img src="../assets/images/<?php echo $g['g_pic'] ?>" alt="gadget image" width="150">
                        <p class="ml-5">
                            Model: <b> <?php echo $g['g_model'] ?> </b> <br>
                            Brand: <b> <?php echo $g['g_brand'] ?> </b> <Br>
                            Description: <b> <?php echo $g['g_desc'] ?> </b> <br>
                            Rental: <b> <?php echo $g['g_price'] ?>.00 </b>
                        </p>
                    </div>
                    <div class="form-group mt-5">
                        <h4>More info</h4>
                        <hr>
                        <p class="pl-5">
                            Owner name: <b> <?php echo $g['fname'] ?> <?php echo $g['lname'] ?> </b> <br>
                            Contact No: <b> <?php echo $g['contactno'] ?> </b> <br>
                            Address: <b> <?php echo $g['address'] ?> </b>
                        </p>
                    </div>
                </form>
            </div>
        <?php } ?>
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
</body>
</html>