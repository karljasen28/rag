<?php 
require('../dbuser/functiondb.php');
session_start();

$id = $_SESSION['id'];

if(isset($_POST['cancel'])) {
  $id = $_POST['id'];
  $output = cancelTransaction($id);
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
    <?php
      if(!empty($output)) {
        echo '<p class="alert alert-warning col-lg-6">';
        echo $output;
        echo '</p>';
    }
    ?>
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
        <?php foreach(getTransaction($_SESSION['id']) as $g) { ?>
            <tr>
                <td><?php echo $g['tran_id'] ?></td>
                <td><?php echo $g['fname'] ?><?php echo " " ?><?php echo $g['lname'] ?></td>
                <td><?php echo $g['g_model'] ?><?php echo " " ?><?php echo $g['g_brand'] ?></td>
                <td><?php echo $g['g_price'] ?>.00</td>
                <td><?php echo $g['tran_date'] ?></td>
                <td><?php echo $g['tran_status'] ?></td>
                <td>
                  <form method="POST">
                    <input type="text" name="id" value="<?php echo $g['tran_id']; ?>" hidden>
                    <button type="submit" name="cancel" class="btn btn-danger">Cancel</button>
                  </form>
                </td>
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