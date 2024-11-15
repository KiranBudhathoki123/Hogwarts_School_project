<?php
include 'connection.php';
$sql = "SELECT * FROM `teacher`";
$res = mysqli_query($conn,$sql);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="teacher.css">
</head>
<body>
    <header>
        <nav class="navs">
            <div class="logo">
                <h1>LOGO</h1>
            </div>
            <div class="menus">
                <ul class="lists">
                    <li><a class="items" href="home.php">Home</a></li>
                    <li><a class="items" href="about.php">About</a></li>
                    <li><a class="items" href="houses.php">Houses</a></li>
                    <li><a class="items" href="details.php">Details</a></li>
                    <li><a class="items" href="news.php">News</a></li>
                </ul>
            </div>
            <div class="login">
                <form action="/" method="post">
                    <button><a href="signin.php">LOGIN</a></button>
                </form>
            </div>
        </nav>
    </header>
    <h1 class="heading">Meet the Esteemed Professors of Hogwarts:<span>Masters of Magic and Wisdom</span></h1>
    <div class="container">
        <?php 
        while($row = mysqli_fetch_assoc($res)){
            echo"
    <div class='box'>
            <p class='name'>".$row['name']." (".$row['position'].")</p>
            <p class='subject'>".$row['course']."</p>
            <ul class='description'>
                <li>".$row['content_1']."</li>
                <li>".$row['content_2']."</li>
                <li>".$row['content_3']."</li>
            </ul>
            <div class='image' style='background: url(upload_img/".$row['image'].");
            background-size: cover;
            border: 1px solid white;'></div>
        </div>
        ";
        }
        ?>
</div>
</body>
</html>