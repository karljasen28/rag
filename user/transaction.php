

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
<div class="container">
<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">On Cart</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pending Transaction</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="container bg-white py-5">
    <h4>Cart List</h4>
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
        <?php 

        session_start();
        require '../dbowner/db.php';
        $sql = "SELECT * FROM booking JOIN users ON booking.owner_id = users.id join gadgets ON booking.gad_id = gadgets.g_id
                WHERE booking.tran_status = 'in cart'";
        $res = mysqli_query($con, $sql);

        while ($data = mysqli_fetch_assoc($res)) {
          echo "<tr>";
            echo "<td>".$data['tran_id']."</td>";
            echo "<td>".$data['fname']."".$data['lname']."</td>";
            echo "<td>".$data['g_brand']." ".$data['g_model']."</td>";
            echo "<td>".$data['g_price']."</td>";
            echo "<td>".$data['tran_date']."</td>";
            echo "<td>".$data['tran_status']."</td>";
            echo "<td><a href='cart.php?tran_id=".$data['tran_id']."' class='btn btn-primary'>View</a> <a href='' class='btn btn-danger'>Cancel</a></td>";
          echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
  
        <div class="container bg-white py-5">
    <h4>Cart List</h4>
    <table class="table table-hover">
        <thead class="bg-dark text-light text-center">
            <tr>
                <th>#</th>
                <th>Owner</th>
                <th>Device</th>
                <th>Rental Price</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody class="text-center">
        <?php 
        require '../dbowner/db.php';
        $sql = "SELECT * FROM booking JOIN users ON booking.owner_id = users.id join gadgets ON booking.gad_id = gadgets.g_id
                WHERE booking.tran_status = 'pending'";
        $res = mysqli_query($con, $sql);

        while ($data = mysqli_fetch_assoc($res)) {
          $total = $data['g_price'] * $data['no_days'];
          echo "<tr>";
            echo "<td>".$data['tran_id']."</td>";
            echo "<td>".$data['fname']."".$data['lname']."</td>";
            echo "<td>".$data['g_brand']." ".$data['g_model']."</td>";
            echo "<td>".$total."</td>";
            echo "<td>".$data['tran_date']."</td>";
            echo "<td>".$data['tran_status']."</td>";
          echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    </div>
  </div>
</div>
</div>

<!-- table -->

<!-- end of table  -->
    
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