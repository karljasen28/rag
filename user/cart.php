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
</div>
</nav>
<?php
session_start();
$tran_id = $_GET['tran_id'];

require '../dbowner/db.php';
$sql = "SELECT * FROM booking JOIN gadgets ON booking.gad_id = gadgets.g_id
JOIN users on booking.owner_id = users.id 
WHERE tran_id=".$tran_id;
$res = mysqli_query($con, $sql);
while ($data = mysqli_fetch_assoc($res)) {
    $g_pic = $data['g_pic'];
    $g_model = $data['g_model'];
    $g_brand = $data['g_brand'];
    $g_serial = $data['g_serial'];
    $g_desc = $data['g_desc'];
    $g_price = $data['g_price'];
    $g_category = $data['g_category'];
    $no_days = $data['no_days'];
    $start_date = $data['start_date'];
    $end_date = $data['end_date'];
}

$total = $g_price * $no_days;


?>
<main>
    <div class="container">
    <div>
        <a href="transaction.php" class="btn btn-primary">Back</a>
    </div>
        <div class="row my-2">
            <div class="col">
                <div class="text-center">
                    <img src="../assets/images/<?php echo $g_pic;?>" alt="" width="400">
                </div>
            </div>
            <div class="col-4">
                <span style="font-size: 20px">Model: </span><span class="float-right"><?php echo $g_model;?></span><br>
                <span style="font-size: 20px">Brand: </span><span class="float-right"><?php echo $g_brand;?></span><br>
                <span style="font-size: 20px">Serial: </span><span class="float-right"><?php echo $g_serial;?></span><br>
                <span style="font-size: 20px">Description: </span><span class="float-right"><?php echo $g_desc;?></span><br>
                <span style="font-size: 20px">Price: </span><span class="float-right"><?php echo $g_price;?></span><br>
                <span style="font-size: 20px">Category: </span><span class="float-right"><?php echo $g_category;?></span><br><br>
                <span style="font-size: 20px"># of days: </span><span class="float-right"><?php echo $no_days;?></span><br>
                <span style="font-size: 20px">Start: </span><span class="float-right"><?php echo $start_date;?></span><br>
                <span style="font-size: 20px">End: </span><span class="float-right"><?php echo $end_date;?></span><br><br>
                <span style="font-size: 20px">Rental Price: </span><span class="float-right text-success"><?php echo "Php ".$total.".00"?></span>
                <form action="" method="POST">
                <button class="btn btn-primary btn-block my-2 btn-lg" name="btnPlaceOrder">Place Order</button>
                </form>
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

                
<?php

if (isset($_POST['btnPlaceOrder'])) {
    require '../dbowner/db.php';
    $sql2 = "UPDATE booking SET tran_status = 'pending' WHERE tran_id =".$tran_id;
    $res2 = mysqli_query($con,$sql2);
    if ($res2) {
        echo "<script>alert('Please wait for owner approval!');window.location='userdashboard.php'</script>";
    }
    else{
        mysqli_error($con);
    }
}
?>
                

