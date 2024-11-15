<?php
include "connection.php";
session_start();
if(!isset($_SESSION['userId'])){
    header('location:signin.php');
}
else{
$id = $_SESSION['userId'];
$select = "SELECT * from users WHERE id = $id";
$res = mysqli_query($conn,$select);
$row = mysqli_fetch_assoc($res);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$house = $row['house'];
$image = $row['image'];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/profile.css">
    <title>Document</title>
</head>
<body style="background:url(upload_img/<?php echo $image ?>); background-size:cover; backdrop-filter:blur(10px)">
    <h1>My Profile</h1>
    <div class="container">
        <div class="image" style="background:url(upload_img/<?php echo $image ?>)">
        <form action="" method="post">
        <p class="id">
                <?php
                    echo "$id";
                ?>
            </p>
            <p class="name">
                <?php
                    echo "$name";
                ?>
            </p>
            <p class="email">
            <?php
                    echo "$email";
                ?>
            </p>
            <p class="email">
            <?php
                    echo "$mobile";
                ?>
            </p>
            <p class="house">
            <?php
                    echo "$house";
                ?>
            </p>
            <a href="home.php" class="submit">Go back to Home</a>
            <a href="update.php" class="submit">Update Me</a><br>
            <a href="generate.php?email=<?php echo $email ?>" class="logout">Acceptance Letter</a> 
            <a href="logout.php" class="logout">Logout</a>
            </form>
        </div>
    </div>
</body>
</html>