<?php
session_start();
$id = $_SESSION['id'];
$gad_id = $_GET['id'];

require '../dbowner/db.php';
$sql = "SELECT * FROM gadgets join users on gadgets.owner_id = users.id WHERE g_id=".$gad_id;
$res = mysqli_query($con, $sql);
while ($data = mysqli_fetch_assoc($res)) {
  $g_pic = $data['g_pic'];
  $g_model = $data['g_model'];
  $g_brand = $data['g_brand'];
  $g_serial = $data['g_serial'];
  $g_price = $data['g_price'];
  $g_desc = $data['g_desc'];
  $g_category = $data['g_category'];
  $owner_id = $data['id'];
  $fname = $data['fname'];
  $lname = $data['lname'];
  $contactno = $data['contactno'];
  $address = $data['address'];
  $pro_pic = $data['pro_pic'];
  $email = $data['email'];
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


  <div class="container bg-white mt-5 py-5">
    <div class="row">
            <div class="col">
                <form method="POST" action="" class="form-horizontal">
                    <div class="form-inline">
                        <h4>Gadget Information</h4>
                        <!-- <input type="text" name="gad_id" value="" hidden>
                        <input type="text" name="owner_id" value="" hidden>
                        <input type="text" name="user_id" value="" hidden> -->
                        <button class="btn btn-success ml-auto mr-5" name="btnAddToCart"><i class="fas fa-cart-plus mr-2"></i> Add to rentals</button>
                    </div>
                    <hr>
                    <div class="form-inline pl-5">
                        <img src="../assets/images/<?php echo $g_pic;?>" alt="gadget image" width="150">
                        <p class="ml-5">
                            Model: <b> <?php echo $g_model;?> </b> <br>
                            Brand: <b> <?php echo $g_brand;?> </b> <Br>
                            Description: <b> <?php echo $g_desc;?> </b> <br>
                            Rental: <b> <?php echo $g_price;?> </b> <br>
                        </p>
                    </div>
                    <form action="" class="form-horizontal">
                      <div class="form-group col-lg-3" style="margin-left: 21%;">
                        <input type="number" class="form-control my-2" name="no_days" placeholder="# of days">
                        <label for="">Start Date</label>
                        <input type="date" class="form-control mb-2" name="start_date">
                        <label for="">End Date</label>
                        <input type="date" class="form-control" name="end_date" placeholder="end">
                      </div>
                    </form>
                    <div class="form-group mt-5">
                        <h4>More info</h4>
                        <hr>
                        <div class="form-inline">
                        <img class="round rounded-circle ml-3" src="../assets/images/<?php echo $pro_pic;?>" alt="" width="200">
                        <p class="pl-5">
                            Owner name: <b> <?php echo $fname, $lname;?> </b> <br>
                            Contact No: <b> <?php echo $contactno;?> </b> <br>
                            Address: <b> <?php echo $address;?> </b> <br>
                            Email: <b> <?php echo $email;?> </b>
                        </p>
                        </div>
                    </div>
                </form>
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
</body>
</html>

<?php
  
  if (isset($_POST['btnAddToCart'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $start_date = $_POST['start_date'];
    $no_days = $_POST['no_days'];
    $tran_status = 'in cart';
    
    $price = $g_price * $no_days;
//echo $gad_id, $owner_id, $id, $no_days, $start_date, $end_date, $tran_status;
    require '../dbowner/db.php';
    $sql2 = "INSERT INTO booking(gad_id,owner_id,user_id,no_days,start_date,end_date,rental_price,tran_status) VALUES($gad_id, $owner_id, $id, '$no_days', '$start_date', '$end_date','$price','$tran_status')";
    $res2 = mysqli_query($con, $sql2);
    if ($res) {
      echo "<script>alert('Added to cart!');window.location='userdashboard.php'</script>";
    }
    else{
      mysqli_error($con);
    }
  }
?>