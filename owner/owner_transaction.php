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
        <a class="nav-link" href="owner_transaction.php" id="view2">Transactions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="devices.php" id="view1">My Devices</a>
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
    <div class="container">
        <table class="table table-hover">
        <thead class="bg-dark text-light text-center">
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Device</th>
                <th>Rental Price</th>
                <th># Of Days</th>
                <th>Start</th>
                <th>End</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody class="text-center">
        <?php 

        session_start();
        require '../dbowner/db.php';
        $sql = "SELECT * FROM booking JOIN users ON booking.user_id = users.id 
                join gadgets ON booking.gad_id = gadgets.g_id
                WHERE booking.tran_status = 'approved' OR booking.tran_status = 'rejected' OR booking.tran_status = 'pending' OR booking.tran_status = 'finished'";
        $res = mysqli_query($con, $sql);

        while ($data = mysqli_fetch_assoc($res)) {
          echo "<tr>";
            echo "<td>".$data['tran_id']."</td>";
            echo "<td>".$data['fname']."".$data['lname']."</td>";
            echo "<td>".$data['g_brand']." ".$data['g_model']."</td>";
            echo "<td>".$data['rental_price']."</td>";
            echo "<td>".$data['no_days']."</td>";
            echo "<td>".$data['start_date']."</td>";
            echo "<td>".$data['end_date']."</td>";
            if ($data['tran_status'] == 'approved') {
              echo "<td><span class='text-success'>".$data['tran_status']."</span></td>";
            }
            if ($data['tran_status'] == 'rejected') {
              echo "<td><span class='text-danger'>".$data['tran_status']."</span></td>";
            }
            if ($data['tran_status'] == 'finished') {
              echo "<td><span class='text-dark'>".$data['tran_status']."</span></td>";
            }
            if ($data['tran_status'] == 'pending') {
              echo "<td><span class='text-primary'>".$data['tran_status']."</span></td>";
            }
            if ($data['tran_status'] == 'rejected') {
                echo "<td>---</td>";
            }
            if ($data['tran_status'] == 'approved') {
              echo "<td><a href='process.php?success_id=".$data['tran_id']."' class='btn btn-primary'>Set as Complete</a></td>";
            }
            if ($data['tran_status'] == 'pending') {
               echo "<td><a href='process.php?tran_id=".$data['tran_id']."' class='btn btn-primary'>Approve</a> <a href='process.php?discard_id=".$data['tran_id']."' class='btn btn-danger'>Discard</a></td>";
            }
            
          echo "</tr>";
        }
        ?>
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