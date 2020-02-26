<?php 
require('../dbuser/functiondb.php');
session_start();

$id = $_SESSION['id'];

if(isset($_POST['update'])) {
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contactno = $_POST['contactno'];

    $output = updateUserInfo($gender, $address, $contactno, $id);

    if($output === "UPDATED") {
        header("location: userprofile.php");
    } else {
        $message = "Failed to Update";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
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
        <a class="nav-link" href="userdashboard.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="transaction.php">Transaction</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userprofile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../signout.php">Signout</a>
      </li>
    </ul>
  </div>
</div>
</nav>

<main>
    <div class="container bg-white py-5">
    <h4>Transaction List</h4>
    <table class="table table-hover">
        <thead class="bg-dark text-light text-center">
            <tr>
                <th>#</th>
                <th>Owner</th>
                <th>Device</th>
                <th>Rental Price</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody class="text-center">
        <?php foreach(getTransaction() as $g) { ?>
            <tr>
                <td><?php echo $g['tran_id'] ?></td>
                <td><?php echo $g['fname'] ?><?php echo $g['lname'] ?></td>
                <td><?php echo $g['g_model'] ?><?php echo $g['g_brand'] ?></td>
                <td><?php echo $g['g_price'] ?>.00</td>
                <td><?php echo $g['tran_date'] ?></td>
                <td class="text-warning"><?php echo $g['tran_status'] ?></td>
                <td></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
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