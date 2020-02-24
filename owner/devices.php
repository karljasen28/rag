<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devices</title>
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
            <a class="nav-link" href="ownerdashboard.php">Transactions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="devices.php">My Devices</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="userprofile.php">Profile</a>
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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add a device
    </button><br>

    <table class="table mt-4">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Brand</th>
        <th scope="col">Model</th>
        <th scope="col">Serial</th>
        <th scope="col">Renting Fee</th>
        <th scope="col">Description</th>
        <th scope="col" colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>

    <?php
        session_start();
        $id = $_SESSION['id'];

        require '../dbowner/db.php';
        $sql = "SELECT * FROM gadgets WHERE owner_id =".$id;
        $result = mysqli_query($con,$sql);

        while ($data = mysqli_fetch_assoc($result)) {
           echo"<tr>";
                echo"<td>".$data['g_id']."</td>";
                echo"<td>".$data['g_brand']."</td>";
                echo"<td>".$data['g_model']."</td>";
                echo"<td>".$data['g_serial']."</td>";
                echo"<td>".$data['g_price']."</td>";
                echo"<td>".$data['g_desc']."</td>";
                echo"<td><a href='' class='btn btn-success'>Edit</a></td>";
                echo"<td><a href='process.php?g_id=".$data['g_id']."' class='btn btn-danger'>Delete</a></td>";
           echo"</tr>";
        }
    ?>
    </tbody>
    </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add a gadget</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="">
            <div class="custom-file mb-5">
                <label for="staticEmail" class="col-sm-2 col-form-label">Choose File</label>
                <input type="file" name="pic">
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Model</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="model">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Brand</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="brand">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Serial #</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="serial">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Renting Fee</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="fee">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                <textarea type="text" class="form-control" name="description"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                <select class="form-control" name="category">
                    <option hidden>Select Type</option>
                    <option value="smartphone">Smart Phone</option>
                    <option value="camera">Camera</option>
                    <option value="speaker">Speakers</option>
                    <option value="laptop">Laptops</option>
                </select>
                </div>
            </div>
                        
            <button class="btn btn-primary" name="btnAddDevice">Add</button>
        </form>
        </div>
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

<?php
    if (isset($_POST['btnAddDevice'])) {
        $g_pic = $_POST['pic'];
        $g_model = $_POST['model'];
        $g_brand = $_POST['brand'];
        $g_serial = $_POST['serial'];
        $g_fee = $_POST['fee'];
        $g_desc = $_POST['description'];
        $g_category = $_POST['category'];
        $id = $_SESSION['id'];

        require '../dbowner/db.php';
        $sql = "INSERT INTO gadgets(g_pic,g_model,g_brand,g_serial,g_price,g_desc,g_category,owner_id) VALUES('$g_pic','$g_model','$g_brand','$g_serial','$g_fee','$g_desc','$g_category',$id)";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<script>alert('Device added!');window.location='devices.php'</script>";
        }
        else {
            echo "<script>alert('Failed');window.location='devices.php'</script>";
        }
    }
?>