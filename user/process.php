<?php
    if (isset($_GET['tran_del'])) {
    $tran_id = $_GET['tran_del'];
    require '../dbowner/db.php';
    $sql2 = "DELETE FROM booking WHERE tran_id=".$tran_id;
    $res2 = mysqli_query($con,$sql2);
    if ($res2) {
        echo "<script>alert('Removed from cart!');window.location='transaction.php'</script>";
    }
    else{
        mysqli_error($con);
    }
}
?>