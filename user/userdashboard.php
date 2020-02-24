<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        <a class="nav-link active" href="userdashboard.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="userprofile.php">Profile</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="#signout">Signout</a>
      </li>
    </ul>
  </div>
</div>
</nav>

<main>
  <div class="container-fluid ml-auto">
    <div class="row" style="padding-left: 150px;">
      <div class="col-lg-2 bg-white py-3 mt-4 mr-3">
          <div class="text-center pb-3">
            <img class="img-fluid text-center" src="../assets/images/oppo.jpg" alt="oppo" width="150">
          </div>
          <p>OPPO A5 2020</p>
          <p>Dazzling White, 4GB RAM, 64GB Storage</p>
          <h6 class="text-success">₱12,690.00</h6>
            <a class="btn btn-primary col mt-3" href="view.php">View</a>
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