<?php
  if (isset($_GET['val_id']) && isset($_GET['id'])) {
    $val_id = $_GET['val_id'];
    $id = $_GET['id'];
    require '../dbowner/db.php';
    $sql = "SELECT * FROM validation JOIN users on validation.user_id = users.id WHERE validation.val_id=".$val_id;
    $res = mysqli_query($con, $sql);
    while ($data = mysqli_fetch_assoc($res)) {
      $fname = $data['fname'];
      $lname = $data['lname'];
      $gender = $data['gender'];
      $bdate = $data['bdate'];
      $pro_pic = $data['pro_pic'];
      $val_pic = $data['val_pic'];
    }
    if (isset($_POST['btnValidate'])) {
      $sql2 = "UPDATE validation SET val_status = 'approved' WHERE val_id=".$val_id;
      $res2 = mysqli_query($con, $sql2);

      if ($res2) {
        $sql3 = "UPDATE users SET account = 'verified' WHERE id=".$id;
        $res3 = mysqli_query($con, $sql3);

        if ($res3) {
          echo "<script>alert('You verified this user');window.location='validationlist.php'</script>";
        }
        else{
          mysqli_error($con);
        }
        
      }
      else {
        mysqli_error($con);
      }
    }
  }
?>
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
    <div class="container bg-white py-5">
        <div class="row">
            <div class="col text-center">
                <img class="rounded rounded-circle" src="../assets/images/<?php echo $pro_pic?>" width="200">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <form method="POST" action="" class="form-horizontal">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="<?php echo $fname;?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="<?php echo $lname;?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <input type="text" class="form-control" placeholder="<?php echo $gender;?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Birth Date</label>
                        <input type="text" class="form-control" placeholder="<?php echo $bdate;?>" disabled>
                    </div>
                    <div class="form-group py-5 text-center">
                        <img src="../assets/images/<?php echo $val_pic?>" alt="Validation Image" width="300">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success col-lg-5" name="btnValidate" value="Validate">
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