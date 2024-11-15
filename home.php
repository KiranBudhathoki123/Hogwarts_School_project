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
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="upbtn">
        <button style="background-color: transparent;border-color: transparent;" class="up">
        <img src="resources/kunai-01.png" height="40px" alt="kunai">
        </button>
    </div>
    <div class="downbtn">
        <button style="background-color: transparent;border-color: transparent;" class="down">
            <img src="resources/kunai-01.png" height="40px" alt="kunai">
            </button>
    </div>
    <div class="container">
            <div class="vertislides">
        <img class="bubble" src="resources/bubble-01-01.png" class="bubble">
    <header>
        <nav class="navs" style="justify-contents:center">
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
    <div class="center">
        <div class="previous">
            <button style="background-color: transparent;border-color: transparent;" class="prev-btn">
                <img src="resources/kunai-01.png" height="30px" alt="kunai">
                </button>
        </div>
         <div class="image-container">
        <div class="slide">
            <img style="width: 500px;" src="resources/harrynew-01.png" class="slide-img" alt="">
        </div>
        <div class="slide">
            <img style="width: 500px;" src="resources/voldemortnew-01.png" class="slide-img" alt="">
        </div>
        <div class="slide">
            <img style="width: 500px;" src="resources/dobby-01.png" class="slide-img" alt="">
        </div>
        <div class="slide">
            <img style="width: 500px;" src="resources/Untitled-2-01.png" class="slide-img" alt="">
        </div>
        <div class="slide">
            <img style="width: 500px;" style="width:300px" src="resources/harry 2-01.png" class="slide-img" alt="">
        </div>
    </div>
    <div class="next">
        <button style="background-color: transparent;border-color: transparent;" class="next-btn">
            <img src="resources/kunai-01.png" height="30px" alt="kunai">
            </button>
    </div>
    <div class="wizard-world">
        <img class="wizard-img" src="resources/wizarding-01.png" alt="wizarding">
    </div>
    </div>
    </div>
    <div class="vertislides">
        <div class="title">
            <img alt="live" src="resources/live-01.png">
        </div>
        <div class="course-container">
            <div class="courses">
                <img src="resources/content1-01.png" alt="">
                <h2>Explore an Open World</h2>
                <p>The wizarding world awaits you. Freely roam Hogwarts, Hogsmeade, the Forbidden Forest, and the surrounding Overland area.</p>
            </div>
            <div class="courses">
                <img src="resources/content2-01-01.png" alt="">
                <h2>Be the Witch or Wizard You Want to be</h2>
                <p>Learn spells, brew potions, grow plants, and tend to magical beasts along your journey. Get sorted into your house, forge relationships, and master skills to become the witch or wizard you want to be.
                </p>
            </div>
            <div class="courses">
                <img src="resources/content3-01-01.png" alt="">
                <h2>Experience a New Wizarding World Adventure</h2>
                <p>Experience the wizarding world in an unexplored era to uncover a hidden truth from its past. Battle against trolls, Dark Wizards, goblins, and more as you face a dangerous villain threatening the fate of the wizarding world.</p>
            </div>
        </div>
    </div>
    <div class="vertislides">
        <div class="media-container">
            <div class="hats">
                <h1>BE THE <br/>WITCH OR WIZARD <br/>YOU WANT TO BE</h1>
                <img class="hat" src="./resources/sorting hat-01.png" alt="sorting-hat">
            </div>
            <div class="line-first">
                <img class="line" alt="line" src="./resources/lines.png">
            </div>
            <div class="medias">
                <a href ="" ><img src="./resources/discord-01.png" alt="discord" class="media"></a>
                <a href ="" ><img src="./resources/youtube.png" alt="youtube" class="media"></a>
                <a href ="" ><img src="./resources/facebook-01.png" alt="facebook" class="media"></a>
                <a href ="" ><img src="./resources/twitter-01.png" alt="twitter" class="media"></a>
                <a href ="" ><img src="./resources/insta-01.png" alt="insta" class="media"></a>
                <a href ="#" ><img src="./resources/tiktpk.png" alt="tiktok" class="media"></a>
            </div>
            <div class="line-second">
                <img class="line" alt="line" src="./resources/lines.png">
            </div>
            <div class="magic">
                <h2>GET CLOSER TO THE MAGIC</h2>
                <p>JOIN THE HARRY POTTER FAN CLUB</p>
            </div>
        </div>
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