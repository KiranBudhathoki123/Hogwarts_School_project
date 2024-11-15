        <?php
        include "connection.php";
        
        if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $error = array();
            if(empty($email)){
                $error['email'] = "Email Required";
            }
            if(empty($password)){
                $error['password'] = "Password Required";
            }
            if(empty($error)){
                //if user tries to log in
            $selectUser = "SELECT * FROM `users` WHERE email = '$email'";
            $resUser = mysqli_query($conn,$selectUser);
            $rowUser= mysqli_fetch_assoc($resUser);
            $userId = $rowUser['id'];
            $userRole = $rowUser['role'];
            
            //if admin tries to log in
            $selectAdmin = "SELECT * FROM `admin` WHERE email = '$email'";
            $resAdmin = mysqli_query($conn,$selectAdmin);
            $rowAdmin = mysqli_fetch_assoc($resAdmin);
            $adminId =  $rowAdmin['id'];
            $adminRole = $rowAdmin['role'];

            if($resUser && mysqli_num_rows($resUser)>0 && password_verify($password,$rowUser['password'])){
                session_set_cookie_params(30 * 24 *60 *60);
                $currentDay = date('l');
                $currentTime = date('H:i:s');
                $time = $currentDay . " " . $currentTime;
                $message = "New user just loggedIn. Email: " . $email;
                $insertNotif = "INSERT INTO `notifications` (`content`,`timestrap`) VALUES ('$message','$time')";
                $resNotif = mysqli_query($conn,$insertNotif);
                session_start();
                $_SESSION['userId'] = $userId;
                $_SESSION['role'] = $userRole;
                header('location:profile.php');
                exit;
            }
            else if($resAdmin && mysqli_num_rows($resAdmin)>0 && password_verify($password,$rowAdmin['password'])){
                session_set_cookie_params(30 *24 *60 *60);
                session_start();
                $_SESSION['adminId'] = $adminId;
                $_SESSION['role'] = $adminRole;
                $_SESSION['admin'] = true;
                header('location:admin.php');
                exit;
            }
            else{
                echo "Incorrect Username or Password";
            }





            if($prev_email == $email && password_verify($password,$prev_pass)){
                session_set_cookie_params(30 * 24 * 60 * 60);
                session_start();
                $_SESSION['user_id'] = $id;
                echo session_status();
                header('location:profile.php');
            }
            else{
                $error['error'] = "Incorrect username or password";
            }
            }
            
        }
        ?>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="public/signins.css">
        </head>
        <body>
            <h1>Sign In</h1>
            <div class="container">
                <form action="" method="post" >
                    <div class="email">
                        <div class="image-box">
                            <img src="resources/user-01.png" width="30px">
                        </div>
                        <input placeholder="Your Email" type="text" name="email" id="email" value = <?php echo isset($_POST['email'])? $_POST['email']:''; ?>>
                </div>
                <span class="error">
                            <?php
                            if(isset($error['error'])){
                                echo $error['error'];
                            }
                            ?>
                        </span>
                <div class="password">
                    <input placeholder="Your Password" type="text" name="password" id="password" value = <?php echo isset($_POST['password'])? $_POST['password']:'';?>>
                    <div class="image-box">
                        <img src="resources/lock-01.png" width="30px">
                    </div>
            </div>
            <div class="remember">
                <input type="checkbox" id="remember">
                <label for="remember">Remember me for 30 days</label>
            </div>
            <div class="btn-containers">
                <button class="cancel"><a href = "index.html">Go Back</a></button>
                <button id="submit"  name="submit" type="submit">Sign In</button>
            </div>
            <p class="not-sign">Not Registered Yet? <a href="signup.php">Click here</a></p>
                </form>
                
            </div>
        </body>
        </html>