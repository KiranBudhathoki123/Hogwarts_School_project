<?php
include'adminConfig.php';
include 'connection.php';
$sql = "SELECT * FROM notifications ORDER BY timestrap DESC";
$res = mysqli_query($conn,$sql);
$notificationCount = mysqli_num_rows($res);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/notification.css">
    <link rel="stylesheet" href="public/usermgmt.css">
    <link rel="stylesheet" href="public/admin.css">
    <link rel="stylesheet" href="public/cms.css">
    <title>Document</title>     
</head>
<body>
    <div class="header">
        <div class="title">
            <a href = "admin.php"><h1><span>A</span>dmin <span>D</span>ashboard</h1></a>
        </div>
        <div class="bars">
            <div class="user" onclick="userRedirect()">
                <img src="resources/user.png" alt="user-mgmt" width="50px">
            </div>
            <div class="cms">
                <img src="resources/cms-01.png" alt="cms" height="40px" onclick = "contentRedirect()">
            </div>
            <div class="notif">
                <img id="image" src="resources/notif.png" alt="notif" width="50px">
                <span class="notif-count"><?php 
                    echo "<p>".$notificationCount."</p>";
                ?></span>
                <div id="notifications">
                    <?php
                        while($row = mysqli_fetch_assoc($res)){
                            echo("
                            <div class='notif-items'>
                        <p>".$row['content']."</p>
                        <span class='time'>".$row['timestrap']."<button><a href='deleteNotif.php?notification_id=".$row['notification_id']."' class='delete_btn'>Delete</a></button>
                        </span>
                        
                    </div>
                            ");
                        }
                        ?>
                    
                </div>
            </div>
            <div class="profile">
                <img src="resources/siriusblack-01.png" alt="profile" height="50px">
            </div>
        </div>
    </div>
    <script src="notif.js"></script>
