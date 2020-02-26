<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation</title>
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
        <a class="nav-link" href="admindashboard.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link active" href="validationlist.php">Validation List</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="accountlist.php">Account List</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="../signout.php">Signout</a>
      </li>
    </ul>
  </div>
</div>
</nav>

<main>
    <div class="container bg-white py-5">
        <div class="row">
            <div class="col text-center">
                <img src="../assets/images/oppo.jpg" width="200">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <form method="POST" action="" class="form-horizontal">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" disabled>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" disabled>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <input type="text" class="form-control" placeholder="Gender" disabled>
                    </div>
                    <div class="form-group">
                        <label>Birth Date</label>
                        <input type="text" class="form-control" placeholder="Birth Date" disabled>
                    </div>
                    <div class="form-group py-5 text-center">
                        <img src="../assets/images/oppo.jpg" alt="Validation Image" width="300">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success col-lg-5" name="accept" value="Validate">
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