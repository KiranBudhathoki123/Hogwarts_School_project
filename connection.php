<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'projects';
$conn = mysqli_connect($hostname,$username,$password,$dbname);
if(!$conn){
     die(mysqli_connect_error($conn));
}
?>   