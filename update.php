<?php
include "connection.php";
session_start();
$id = $_SESSION['userId'];
$select = "SELECT * from users WHERE id = $id";
$res = mysqli_query($conn,$select);
$row = mysqli_fetch_assoc($res);
$prev_name = $row['name'];
$prev_email = $row['email'];
$prev_mobile = $row['mobile'];
$prev_pass = $row['password'];
$house = $row['house'];
$prev_image = $row['image'];
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $mobile  = $_POST['mobile'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'upload_img/'.$image;
    $error = array();
    if ($email == '') {
        $error['email'] = "Email required";
    }
    if ($name == '') {
        $error['name'] = "Name required";
    }
    if ($password == '') {
        $error['password'] = "Password required";
    }
    if ($mobile == '') {
        $error['mobile'] = "Mobile required";
    }
    if ($image == '') {
        $error['image'] = "Image required";
    }
    if(empty($error)){
        $update = "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$hash_password',`mobile`='$mobile',`image`='$image' where id = $id";
    $res = mysqli_query($conn,$update);
    if($res){
        move_uploaded_file($image_tmp_name,$image_folder);
        header('location:profile.php');
    }
    else{
        die(mysqli_error());
    }
    }
    
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/updates.css">
    <title>Document</title>

</head>
<body style="background:url(upload_img/<?php echo $prev_image ?>); background-size:cover; backdrop-filter:blur(10px)">
    <h1>Update Here</h1>
    <div class="container">
        <div class="image" style="background:url(upload_img/<?php echo $prev_image ?>)">
        <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="name" class="name" value="<?php echo $prev_name ?>">
                <input type="text" name="email" class="email" value="<?php echo $prev_email?>">
                <input type="text" name="mobile" class="mobile" value="<?php echo $prev_mobile?>">
                <input type="password" name="password" class="password" placeholder="Enter New Password">
                <input type="file" name="image" accept="image/jpeg,image/png,image/jpg" id="file" >
                <input type="submit" name="submit" class="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>