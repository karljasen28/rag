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
        $sql = "SELECT * FROM booking JOIN users ON booking.user_id = users.id join gadgets ON booking.gad_id = gadgets.g_id
                WHERE booking.tran_status = 'pending'";
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
            echo "<td>".$data['tran_status']."</td>";
            if ($data['tran_status'] == 'approved') {
                echo "<td><button class='btn btn-danger' disabled> Approve </button></td>";
            }
            else{
                echo "<td><a href='process.php?tran_id=".$data['tran_id']."' class='btn btn-primary'>Approve</a></td>";
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