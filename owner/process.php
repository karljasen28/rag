<?php
    session_start();

    if (isset($_GET['g_id'])) {
        $g_id = $_GET['g_id'];

        require '../dbowner/db.php';
        $sql = "DELETE FROM gadgets WHERE g_id=".$g_id;
        $res = mysqli_query($con, $sql);

        if ($res) {
            echo "<script>alert('Device deleted!');window.location='devices.php'</script>";
        }
        else{
            echo "<script>alert('Deletion unsuccessful!');window.location='devices.php'</script>";
        }
    }

    if (isset($_GET['tran_id'])) {
        # code...
    }
?>