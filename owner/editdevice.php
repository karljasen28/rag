<?php

function db() {
    return new PDO("mysql:host=localhost;dbname=rag","root","");
}

function getEditDevice($g_id) {
    $db = db();
    $sql = "SELECT * FROM gadgets WHERE g_id = ?";
    $cmd = $db->prepare($sql);
    $cmd->execute(array($g_id));
    $row = $cmd->fetchAll();
    $db = null;

    return $row;
}

function updateGadget($file, $model, $brand, $serial, $price, $desc, $cat, $g_id) {
    $db = db();
    $sql = "UPDATE gadgets SET g_pic = ?, g_model = ?, g_brand = ?, g_Serial = ?, g_price = ?, g_desc = ?, g_category = ? WHERE g_id = ?";
    $cmd = $db->prepare($sql);
    $cmd->execute(array($file, $model, $brand, $serial, $price, $desc, $cat, $g_id));
    $db = null;

    return "Updated";
}

if(isset($_POST['update'])) {
    $file = $_POST['file'];
    $model = $_POST['model'];
    $brand = $_POST['brand'];
    $serial = $_POST['serial'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $cat = $_POST['cat'];

    $message = updateGadget($file, $model, $brand, $serial, $price, $desc, $cat, $_GET['id']);

    if($message == "Updated") {
        echo "Update Successful";
    } else {

    }
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
            <a class="nav-link" href="owner_profile.php">Profile</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" href="../signout.php">Signout</a>
        </li>
        </ul>
    </div>
    </div>
    </nav>

    <div class="container-fluid py-5">
        <?php
            if(!empty($message)) {
                echo '<h3 class="alert alert-success">';
                echo $message;
                echo '</h3>';
            }
        ?>
        <div class="container py-5">
            <div class="row">
                <div class="col">
                <?php foreach(getEditDevice($_GET['id']) as $data) { ?>
                    <form method="POST" class="form-horizontal">
                        <div class="form-group">
                            <img src="../assets/images/<?php echo $data['g_pic'] ?>" id="image" alt="gadgets" width="150">
                            <input class="form-control col-lg-3" type="file" name="file" id="file">
                        </div>
                        <div class="form-group">
                            <label for="">Model</label>
                            <input class="form-control" type="text" name="model" placeholder="Gadget Model" value="<?php echo $data['g_model'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Brand</label>
                            <input class="form-control" type="text" name="brand" placeholder="Gadget Brand" value="<?php echo $data['g_brand'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Serial Code</label>
                            <input class="form-control" type="text" name="serial" placeholder="Gadget Serial Code" value="<?php echo $data['g_serial'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Rent Price</label>
                            <input class="form-control" type="number" name="price" placeholder="Price" value="<?php echo $data['g_price'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="desc" placeholder="Gadget Description..."><?php echo $data['g_desc'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="form-control" name="cat">
                                <option hidden><?php echo $data['g_category'] ?></option>
                                <option>Smartphone</option>
                                <option>Camera</option>
                                <option>Speaker</option>
                                <option>Laptop</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success col-lg-3" name="update">Update</button>
                        </div>
                    </form>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
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
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#file").change(function(){
    readURL(this);
});

function alertFire(){
  Swal.fire(
    'Good job!',
    'You clicked the button!',
    'success'
  );
}
</script>
</body>
</html>