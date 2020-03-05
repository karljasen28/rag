<?php
    require('../dbowner/db.php');

if(isset($_POST['deactive'])) {
    $user_id = $_POST['user_id'];
    $sqld = "UPDATE users SET status = 'inactive' WHERE id=".$user_id;
    $resultd = mysqli_query($con, $sqld);

    if($resultd) {
        header("location: list.php");
    } else {
        mysqli_error($con);
    }
}

if(isset($_POST['active'])) {
    $user_id = $_POST['user_id'];
    $sqla = "UPDATE users SET status = 'active' WHERE id=".$user_id;
    $resulta = mysqli_query($con, $sqla);

    if($resulta) {
        header("location: list.php");
    } else {
        mysqli_error($con);
    }
}
?>