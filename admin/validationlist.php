<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation List</title>
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
        <a class="nav-link" href="admindashboard.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link active" href="validationlist.php">Validation List</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link " href="list.php">Account List</a>
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
    <table class="table table-hover table-striped text-center">
        <thead class="bg-dark text-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Account</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
              require '../dbowner/db.php';
              $sql = "SELECT * FROM validation JOIN users on validation.user_id = users.id";
              $res = mysqli_query($con, $sql);
              while ($data = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                  echo "<td>".$data['val_id']."</td>";
                  echo "<td>".$data['fname']." ".$data['lname']."</td>";
                  echo "<td>".$data['account']."</td>";
                  echo "<td>".$data['val_status']."</td>";
                  echo "<td><a class='btn btn-primary' href='viewvalidation.php?val_id=".$data['val_id']."&id=".$data['id']."'>View</a></td>";
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