<?php
include 'connection.php';
if(isset($_GET['userId'])){
    $id = $_GET['userId'];
    $sql = "DELETE FROM `users` WHERE id = '$id'";
    $res = mysqli_query($conn,$sql);
    if($res){
        header('location:userMgmt.php');
    }
    else{
        echo "cannot deleted";
    }
}
?>