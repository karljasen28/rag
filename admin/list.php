<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <a class="nav-link" href="validationlist.php">Validation List</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link active" href="list.php">Account List</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="../signout.php">Signout</a>
      </li>
    </ul>
  </div>
</div>
</nav>
<main>
    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Owner</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">User</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <table class="table mt-4">
            <thead>
                <tr>
                <th scope="col">Profile Picture</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Address</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col">Account</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

            <?php
                session_start();
                $id = $_SESSION['id'];

                require '../dbowner/db.php';
                $sql = "CALL `getAllOwner`();";
                $result = mysqli_query($con,$sql);

                while ($data = mysqli_fetch_assoc($result)) {
                echo"<tr>";
                        echo"<td class='text-center'><img class='round rounded-circle' src='../assets/images/".$data['pro_pic']."' width='80'/></td>";
                        echo"<td>".$data['fname']." ".$data['lname']."</td>";
                        echo"<td>".$data['gender']."</td>";
                        echo"<td>".$data['bdate']."</td>";
                        echo"<td>".$data['address']."</td>";
                        echo"<td>".$data['contactno']."</td>";
                        echo"<td>".$data['email']."</td>";
                        echo"<td>".$data['type']."</td>";
                        echo"<td>".$data['status']."</td>";
                        echo"<td>".$data['account']."</td>";
                        if($data['status'] == "inactive"){
                          echo"
                          <td>
                            <form method='POST' action='process.php'>
                            <input type='text' name='user_id' value='".$data['id']."'>
                            <button class='btn btn-primary' name='active'>Activate</button
                            </form>
                          </td>";
                        }
                        else{
                          echo"
                          <td>
                            <form method='POST' action='process.php'>
                            <input type='text' name='user_id' value='".$data['id']."'>
                            <button class='btn btn-danger' name='deactive'>Deactivate</button
                            </form>
                          </td>";
                        }
                        echo"</tr>";
                }
            ?>
            </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <table class="table mt-4">
            <thead>
                <tr>
                <th scope="col">Profile Picture</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Address</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col">Account</th>
                </tr>
            </thead>
            <tbody>

            <?php

                require '../dbowner/db.php';
                $sql = "CALL `getAllUser`();";
                $result = mysqli_query($con,$sql);

                while ($data = mysqli_fetch_assoc($result)) {
                echo"<tr>";
                        echo"<td class='text-center'><img class='round rounded-circle' src='../assets/images/".$data['pro_pic']."' width='80'/></td>";
                        echo"<td>".$data['fname']." ".$data['lname']."</td>";
                        echo"<td>".$data['gender']."</td>";
                        echo"<td>".$data['bdate']."</td>";
                        echo"<td>".$data['address']."</td>";
                        echo"<td>".$data['contactno']."</td>";
                        echo"<td>".$data['email']."</td>";
                        echo"<td>".$data['type']."</td>";
                        echo"<td>".$data['status']."</td>";
                        echo"<td>".$data['account']."</td>";
                        echo"<td><a href='process.php?g_id=".$data['id']."' class='btn btn-danger'>Disable</a></td>";
                echo"</tr>";
                }
            ?>
            </tbody>
            </table>
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
<script>
  var trap = document.getElementById("trap").value;
  
  if(trap === "active") {
    document.getElementById("active").hidden = true;
  }
</script>
</body>
</html>