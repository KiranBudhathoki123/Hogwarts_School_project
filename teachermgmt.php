<?php
include 'connection.php';
include 'adminConfig.php';
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

                    <button><a href="cms.php">Back</a></button>
    </header>
    <h1 class="heading">Manage Teachers</span></h1>
    <div class="container">
        <?php 
        while($row = mysqli_fetch_assoc($res)){
            echo"
    <div class='box'>
    <div class='opt'>
    <p class='name'>".$row['name']." (".$row['position'].")</p>
    <img class='dotts' src='resources/dotts-01.png'>
    <div class= 'del-btn' onclick = 'deleteTeacher(".$row['teacher_id'].")'>Delete</div>
    </div>
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
<script>
    let dottlist = document.getElementsByClassName('dotts');
    for(let i = 0; i< dottlist.length;i++){
        let dott = dottlist[i];
        let deleteBox = document.getElementsByClassName('del-btn')[i];
        dott.addEventListener("click",function(){
            console.log('clicke');
            if(deleteBox.style.display === 'none'){
                deleteBox.style.display = 'block';
            }
            else{
                deleteBox.style.display = 'none';
            }
        });
    }
    function deleteTeacher(teacherId){
         if(confirm("Are you sure want to delete this teacher")){
            window.location.href = "deleteteacher.php?t_id="+teacherId;
         }
    }
</script>
</body>
</html>