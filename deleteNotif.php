<?php
include 'connection.php';
if(isset($_GET['notification_id'])){
    $id = $_GET['notification_id'];
    $sql = "DELETE FROM `notifications` WHERE notification_id = '$id'";
    $res = mysqli_query($conn,$sql);
    if($res){
        header('location:usermgmt.php');
    }
}
?>