<?php
include 'connection.php';
session_start();
if(isset($_SESSION['userId'])){
    session_destroy();
    header('location:home.php');
}
?>