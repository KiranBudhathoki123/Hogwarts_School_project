<?php
include 'notification.php';
$userSql = "SELECT * FROM `users`";
$userRes = mysqli_query($conn,$userSql);
?>
    <div class="body">
        <?php 
        if(mysqli_num_rows($userRes)>0){
        ?>
        <table>
            <thead>
                <tr>
                <th></th>
                <th>Basic Info</th>
                <th>Student_Id</th>
                <th>Mobile</th>
                <th>House</th>
                <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $serialNumber = 1;
                while($row = mysqli_fetch_assoc($userRes)){
                    echo(
                        "<tr>
                        <td>".$serialNumber."</td>
                        <td>
                                <div class='basic-info'>
                                    <div class ='info-img' style='background:url(upload_img/".$row['image'].");background-size:cover;'>
                                    </div>
                                    <div class='info-detail'>
                                        <p>".$row['name']."</p>
                                        <p>".$row['email']."</p>
                                    </div>
                                </div>
                            </td>

                        <td>".$row['id']."</td>
                        <td>".$row['mobile']."</td>
                        <td>".$row['house']."</td>
                        <td>".$row['role']."</td>
                        <td id='show'><div class='dotts'><img src='resources/dotts-01.png' width=3px>
                            <div class='delete-box'><a href='#' onclick='confirmDelete(".$row['id'].");return false;' >Delete</a></div>
                        </div></td>
                        </tr>"
                    );
                    $serialNumber++;
                }
                ?>
            </tbody>
        </table>
        <?php 
        }
        else {
            echo "<h1 class='NoUser'>No User Found!!</h1>";
        }
        ?>
    </div>
    <script>
        function confirmDelete(userId){
            if(confirm("Are you sure want to delete this user??")){
                window.location.href = "delete.php?userId="+userId;
            }
        }
        let dottlists =document.getElementsByClassName('dotts');
        for(let i = 0; i< dottlists.length; i++){
        let dotts = dottlists[i];
        let deleteBox = dotts.getElementsByClassName('delete-box')[0];
        dotts.addEventListener("click",function(){
            console.log(dottlists);
            if(deleteBox.style.display === 'none'){
                deleteBox.style.display = 'block';
            }
            else{
                deleteBox.style.display = 'none';
            }
});
        }
    </script>
</body>
</html>