<?php
include 'connection.php';
session_start();
function isUserLoggedIn(){
    return isset($_SESSION['userId']);
}

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
    <link rel="stylesheet" href="houses.css">
</head>
<body>
    <div class="container">
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
            <?php if(isUserLoggedIn()){
                    $id = $_SESSION['userId'];
                    $sql = "SELECT * FROM users WHERE `id` = '$id'";
                    $res = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($res);
                    echo "
                    <div class='profile' onclick='profileRedirect()' style='background:url(upload_img/".$row['image'].");background-size: cover;
                    width: 30px;
                    cursor:pointer;
                    height: 30px;
                    border-radius: 25px;'></div>";}
                    else{
                        echo"
                    <button><a href='signin.php'>LOGIN</a></button>";
                    }
                    ?>
            </div>
        </nav>
    </header>
    <div class="house-container">
        <div class="gryffindor">
            <div class="gryf-img">
                <div class="gryf-color"></div>
                <img src="resources/lion.png" width="700px">
            </div>
        </div>
        <div class="slytherin">
            <div class="slyth-img">
                <div class="slyth-color"></div>
                <img src="resources/snake-01.png" style="width:800px">
            </div>
        </div>
        <div class="ravenclaw">
            <div class="raven-img">
            <div class="raven-color"></div>
            <img src="resources/eagle-01.png" style="width:800px">
            </div>
            
        </div>
        <div class="hupplepuff">
            <div class="hupple-img">
                <div class="hupple-color"></div>
                <img src="resources/badger1-01.png" style="width:700px">
                </div>
        </div>
    </div>
    <div class="house-info">
        <div class="one">
            <img src="resources/godric-01.png" style="width:300px">
            <div class="gryff-info">
                <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio id voluptatum velit commodi, nulla quae facilis odit eligendi vero quo!"</p>
                <button><a href="gryffindor.html">Click here</a></button>
            </div>
        </div>
        <div class="two">
            <div class="slyth-info">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti a inventore ut amet odio ipsum molestiae labore dolore nihil sint.</p>
                <button><a href="#">Click here</a></button>
            </div>
            <img src="resources/salazar-01.png" style="width:300px">
        </div>
        <div class="one">
            <img src="resources/Ravena-01.png" style="width:300px">
            <div class="gryff-info">
                <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio id voluptatum velit commodi, nulla quae facilis odit eligendi vero quo!"</p>
                <button><a href="#">Click here</a></button>
            </div>
        </div>
        <div class="two">
            <div class="slyth-info">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti a inventore ut amet odio ipsum molestiae labore dolore nihil sint.</p>
                <button><a href="#">Click here</a></button>
            </div>
            <img src="resources/halena-01.png" style="width:300px">
        </div>
    </div>
    <div class="houses-logo">
        <img src="resources/houses-01-01.png" style="width:450px">
    </div>
    </div>
        <script src="index.js"></script>
        <script>
        function profileRedirect(){
            window.location.href="profile.php";
        }
    </script>
</body>
</html>