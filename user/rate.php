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

<?php
    session_start();
    $id = $_SESSION['id'];
    require '../dbowner/db.php';
    $tran_id = $_GET['tran_id'];
    $sql = "SELECT * FROM booking join users on booking.owner_id = users.id WHERE booking.tran_id=".$tran_id;
    $res = mysqli_query($con, $sql);
    while ($data = mysqli_fetch_assoc($res)) {
        $pro_pic = $data['pro_pic'];
        $fname = $data['fname'].''.$data['lname'];
    }
?>
<main>
    <div class="container bg-light">
        <div>
            <h2 class="p-4">RATE</h2>
            <hr>
        </div>
        <div class="row p-2">
            <div class="col-2 text-center">
                <img src="../assets/images/<?php echo $pro_pic?>" alt="" width="150">
            </div>
            <div class="col">
                <h5><?php echo $fname;?></h5><br>
                <form action="">
                <div class="form-group">
                    <label for="">Stars:</label>
                    <select class="form-control" name="gender" required="">
                        <option hidden>Select Rating</option>
                        <option value="1">⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="5">⭐⭐⭐⭐⭐</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Comments</label>
                    <textarea class="form-control" name="comment" rows="3"></textarea>
                </div>
                <div>
                    <button class="btn btn-primary btn-block btn-lg mb-4">Rate now!</button>
                </div>
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