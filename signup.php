<?php
include "connection.php";
if (isset($_POST['submit'])) {
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $cpassword = $_POST['cpassword'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'upload_img/'.$image;
    $mobile = $_POST['mobile'];
    $houses = ["Gryffindor","Slytherin","Hufflepuff","Ravenclaw"];
    $sort_house = $houses[rand(0, 3)];
    $error = array();
    $select = "SELECT * FROM `users` WHERE email = '$email'";
    $res1 = mysqli_query($conn, $select);
    if (mysqli_num_rows($res1) > 0) {
        $error['email'] = "Email already taken";
    }
    if ($email == '') {
        $error['email'] = "Email required";
    }
    if ($name == '') {
        $error['name'] = "Name required";
    }
    if ($password == '') {
        $error['password'] = "Password required";
    } else if ($password != $cpassword) {
        $error['password'] = "Passwords do not match";
    }
    if ($mobile == '') {
        $error['mobile'] = "Mobile required";
    }
    if ($cpassword == '') {
        $error['cpassword'] = "Password required";
    }
    if ($image == '') {
        $error['image'] = "Image required";
    }

    if (empty($error)) {
        if($email == "budhathokikiran105@gmail.com" && $name == "Kiran Budhathoki" && $password =="kiran_flute" ){
            $insertAdmin = "INSERT INTO `admin`(`name`,`email`,`password`,`mobile`,`image`,`role`) VALUES('$name','$email','$hash_password','$mobile','$image','admin')";
            $resultAdmin = mysqli_query($conn,$insertAdmin);
            if($resultAdmin){
                move_uploaded_file($image_tmp_name, $image_folder);
                header('location:signin.php');
            }
            else{
                echo mysqli_error($conn);
            }
        }
        else{
        move_uploaded_file($image_tmp_name, $image_folder);
        $insertUser = "INSERT INTO `users` (`name`, `email`, `password`, `image`, `mobile`, `house`,`role`) VALUES ('$name', '$email', '$hash_password', '$image', '$mobile', '$sort_house','user')";
        $resultUser = mysqli_query($conn, $insertUser);
         if ($resultUser) {
                $currentDay = date('l');
                $currentTime = date('H:i:s');
                $time = $currentDay . " " . $currentTime;
                $message = "New user just signed up. Email: " . $email;
                $insertNotif = "INSERT INTO `notifications` (`content`, `timestrap`) VALUES ('$message', '$time')";
                $resultNotif = mysqli_query($conn, $insertNotif);
                
                if ($resultNotif) {
                    $url = "welcome.php?email=$email";
                    header("location:$url");
                } else {
                    echo "Error inserting notification: " . mysqli_error($conn);
                }
            }
        if (!$resultUser) {
            echo "Error: " . mysqli_error($conn);
        }
    }
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/signup.css">
    <style>
        .error-fieldset {
            border: 2px solid red;
        }
    </style>
</head>
<body style="background:url(resources/background-01.png);background-size:cover">
    <div class="container">
        <div class="signup">
            <p>Have an account? <a href="signin.php">Sign In</a></p>
            <h2>Welcome To Hogwarts</h2>
            <form action="" method="post" enctype="multipart/form-data" autocomplete = "off">
                <fieldset class="<?php echo isset($error['email']) ? 'error-fieldset' : ''; ?>">
                    <legend>Email</legend>
                    <input type="text" name="email" id="email" value = "<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                </fieldset>
                <span class="error Email">
                    <?php
                    if (isset($error['email'])) {
                        echo "<p>" . $error['email'] . "</p>";
                    }
                    ?>
                </span>
                <fieldset class="<?php echo isset($error['name']) ? 'error-fieldset' : ''; ?>">
                    <legend>Full Name</legend>
                    <input type="text" name="fname" id="fname" value = "<?php echo isset($_POST['fname'])? $_POST['fname'] : ''; ?>">
                </fieldset>
                <span class="error Name">
                    <?php
                    if (isset($error['name'])) {
                        echo "<p>" . $error['name'] . "</p>";
                    }
                    ?>
                </span>
                <div class="inputs">
                    <fieldset class="<?php echo isset($error['password']) ? 'error-fieldset' : ''; ?>">
                        <legend>Password</legend>
                        <input type="password" name="password" id="password" value = "<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
                    </fieldset>
                    <fieldset class="<?php echo isset($error['cpassword']) ? 'error-fieldset' : ''; ?>">
                        <legend>Confirm Password</legend>
                        <input type="password" name="cpassword" id="cpassword" value = "<?php echo isset($_POST['cpassword']) ? $_POST['cpassword'] : ''; ?>">
                    </fieldset>
                    <span class="error Password">
                        <?php
                        if (isset($error['password'])) {
                            echo "<p>" . $error['password'] . "</p>";
                        }
                        ?>
                    </span>
                    <span class="error Cpassword">
                        <?php
                        if (isset($error['cpassword'])) {
                            echo "<p>" . $error['cpassword'] . "</p>";
                        }
                        ?>
                    </span>
                </div>
                <div class="inputs">
                    <div class="file-input-wrapper">
                        <input name="image" type="file" accept="image/jpeg,image/png,image/jpg" id="fileInput" class="file-input">
                        <label for="fileInput" class="custom-file-input" value = >Choose File</label>
                    </div>
                    <fieldset class="<?php echo isset($error['mobile']) ? 'error-fieldset' : ''; ?>">
                        <legend>Mobile</legend>
                        <input type="text" name="mobile" id="mobile" value = "<?php echo isset($_POST['mobile'])? $_POST['mobile'] : '' ;?>">
                    </fieldset>
                    <span class="error Image">
                        <?php
                        if (isset($error['image'])) {
                            echo "<p>" . $error['image'] . "</p>";
                        }
                        ?>
                    </span>
                    <span class="error Mobile">
                        <?php
                        if (isset($error['mobile'])) {
                            echo "<p>" . $error['mobile'] . "</p>";
                        }
                        ?>
                    </span>
                </div>
                <div class="checkbox">
                    <input type="checkbox" id="agree">
                    <label for="agree">I agree to all terms and conditions</label>
                </div>
                <div class="buttons">
                    <button class="cancel"><a href="index.html">Go back</a></button>
                    <button type="submit" name="submit" class="submit">Create my account</button>
                </div>
            </form>
        </div>
        <div class="feature">
            <div class="character">
                <img src="resources/harry 3d-01.png" width="200px" alt="harry">
            </div>
        </div>
    </div>
    <script src="signup.js"></script>
</body>
</html>
