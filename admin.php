<?php
include 'connection.php';
include 'notification.php';
?>
<div id="dashboard-body">
    <div class="flex">
        <div id="greet-container">
        <h2 id="wish"> 
        </h2 id="namezz">
        <?php
            $sqlAdmin = "SELECT * from admin";
            $resAdmin = mysqli_query($conn,$sqlAdmin);
            while($row = mysqli_fetch_assoc($resAdmin)){
                $fullname = $row['name'];
                $firstname = explode(' ',$fullname)[0];
                echo "<h2>".$firstname."</h2>";
            }
            ?>
        <p id="message">Have a nice Day</p>
        <div class="imgs"></div>
    </div>
    <div class="infos">
        <h1>Welcome to the admin dashboard page</h1>
        <h3>You can Add or delete user accounts</h3>
        <h3>You can manage notifications</h3>
        <h3>You can add or update teachers and manage houses</h3>
        
    </div>
    </div>
    <div class="contents">
        <div class="userss">
            <h1 class="heads">User</h1>
            <?php
                    $sqlUsers = "select COUNT(*) AS count from users";
                    $resUsers = mysqli_query($conn,$sqlUsers);
                    $rowUsers = mysqli_fetch_assoc($resUsers);
                    echo "<h2>".$rowUsers['count']."</h2>";
                ?>
                <button class="view-btn"><a href="usermgmt.php">View all</a></button>
        </div>
        <div class="teacherss">
            <h1 class="heads">Teacher</h1>
            <?php
                    $sqlTeachers = "select COUNT(*) AS count from teacher";
                    $resTeachers = mysqli_query($conn,$sqlTeachers);
                    $rowTeachers = mysqli_fetch_assoc($resTeachers);
                    echo "<h2>".$rowTeachers['count']."</h2>";
                ?>
                <button class="view-btn"><a href="teachermgmt.php">View all</a></button>
        </div>
        <div class="housess">
            <h1 class="heads">Houses</h1>
            <?php
                    $sqlHouses = "select COUNT(*) AS count from house";
                    $resHouses = mysqli_query($conn,$sqlHouses);
                    $rowHouses = mysqli_fetch_assoc($resHouses);
                    echo "<h2>".$rowHouses['count']."</h2>";
                ?>
                <button class="view-btn"><a href="houses.jpg">View all</a></button>
        </div>
    </div>
</div>
</body>
<script>
    let wish = document.getElementById('wish');
    let message = document.getElementById('message');
    console.log(wish);
    var date = new Date();
    var hours = date.getHours();
    console.log(hours);
    document.addEventListener("DOMContentLoaded",function(){
        if(hours >= 12 || hours < 18){
            wish.innerText = "Good Afternoon,";
            message.innerText = "Hope your day is going well";
        }
        else if(hour >=18 || hours <00){
            wish.innerText = "Good Night";
            message.innerText = "Have a nice sleep";
        }
        else{
            wish.innerText = "Good Morning";
            message.innerText = "Have a nice day";
        }
    })
</script>

</html>