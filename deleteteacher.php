<?php
include 'connection.php';
if(isset($_GET['t_id'])){
    $id = $_GET['t_id'];
    $sql = "DELETE FROM teacher WHERE teacher_id = '$id'";
    $res = mysqli_query($conn,$sql);
    if($res){
        header('location:teachermgmt.php');
    }
}
?>