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
    <link rel="stylesheet" href="about.css">
    <title>Document</title>
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
    <div class="container">
            <div class="two-sides">
                <div class="title">
                    <div class="heading">
                        <h1>HOGWARTS SCHOOLS OF WITCH AND WIZARDRY</h1>
                    </div>
                    <div class="para">
                        <p>Hogwart's is  a fictional boarding school of magic for students aged eleven to eighteen, founded by Godric Gryffindor, Rowena Ravenclaw, Helga Hufflepuff and Salazar Slytherin.Hogwarts was established to educate young wizards and witches as well as to keep students safe from muggle persecution.</p>
                    </div>
                </div>
                <div class="image">
                        <div class="bubbles">
                            <span style="--i:11"></span>
                            <span style="--i:15"></span>
                            <span style="--i:36"></span>
                            <span style="--i:12"></span>
                            <span style="--i:37"></span>
                            <span style="--i:14"></span>
                            <span style="--i:24"></span>
                            <span style="--i:29"></span>
                            <span style="--i:34"></span>
                            <span style="--i:17"></span> 
                            <span style="--i:38"></span>
                            <span style="--i:20"></span>
                            <span style="--i:35"></span>
                            <span style="--i:32"></span>
                            <span style="--i:27"></span>
                            <span style="--i:21"></span>
                            <span style="--i:19"></span>
                            <span style="--i:16"></span>
                            <span style="--i:39"></span>
                            <span style="--i:33"></span>
                            <span style="--i:25"></span>
                            <span style="--i:31"></span>
                            <span style="--i:22"></span> 
                            <span style="--i:40"></span>
                            <span style="--i:18"></span>
                            <span style="--i:0"></span>
                            <span style="--i:13"></span>
                            <span style="--i:23"></span>
                            <span style="--i:28"></span>
                            <span style="--i:26"></span>
                        </div>
                        <img src="resources/higwarts-01.png" width="600px">
                </div>
            </div>
        </div>
    </div>
    <script>
        function profileRedirect(){
            window.location.href="profile.php";
        }
    </script>
    </body>
    </html>