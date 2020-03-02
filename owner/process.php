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
        $tran_id = $_GET['tran_id'];

        require '../dbowner/db.php';
        $sql = "UPDATE booking SET tran_status='approved' WHERE tran_id=".$tran_id;
        $res = mysqli_query($con, $sql);
        if ($res) {
            echo "<script>alert('You approved this user to rent your gadget!');window.location='owner_transaction.php'</script>";
        }
        else{
            mysqli_error($con);
                }
    }
    if (isset($_GET['discard_id'])) {
        $tran_id = $_GET['discard_id'];

        require '../dbowner/db.php';
        $sql = "UPDATE booking SET tran_status='rejected' WHERE tran_id=".$tran_id;
        $res = mysqli_query($con, $sql);
        if ($res) {
            echo "<script>alert('You rejected this request!');window.location='owner_transaction.php'</script>";
        }
        else{
            mysqli_error($con);
                }
    }
?>