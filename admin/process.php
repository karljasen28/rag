<?php
 if (isset($_GET['activate_id'])) {
     $id = $_GET['activate_id'];

     require '../dbowner/db.php';
     $sql = "UPDATE users SET status = 'active' WHERE id=".$id;

     $res = mysqli_query($con, $sql);

     if ($res) {
        echo "<script>alert('User activated!');window.location='list.php'</script>";
     }
     else{
         mysqli_error($con);
     }
 }
 if(isset($_GET['deactivate_id'])){
    $id = $_GET['deactivate_id'];

    require '../dbowner/db.php';
     $sql = "UPDATE users SET status = 'inactive' WHERE id=".$id;

     $res = mysqli_query($con, $sql);

     if ($res) {
        echo "<script>alert('User deactivated!');window.location='list.php'</script>";
     }
     else{
         mysqli_error($con);
     }
 }
?>