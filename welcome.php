<?php
include 'connection.php';
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $sql = "SELECT * FROM `users` WHERE  `email` = '$email'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    $name = $row['name'];
    $house = $row['house'];
}
else{
    header('location:signup.php');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="welcome.css">
    <title>Document</title>
</head>
<body>
    <div class="logo">
        <img src="resources/hod-logo-01.svg">
    </div>
    <div class='main_body'> <!-- Check for whitespaces here -->
        <p class='name'>Dear <?php echo $name; ?></p>
        <p>We are pleased to inform you that you have been accepted at Hogwarts School of Witchcraft and Wizardry</p>
        <p>You have been sorted to a house <?php echo $house; ?>. Please find enclosed list of all necessary books and equipment. Term begins on September 1. We await your owl by no late than July 31.</p>
        <p>Yours Sincerely,</p>
        <img src='resources/signature-01.svg'>
        <p>Deputy Headmistress</p>
    </div> <!-- Check for whitespaces here -->
    <footer>
        <h3>Hogwarts School of Witchcraft & Wizardry</h3>
        <p>Headmaster: Albus Dumbledore</p>
        <p>(Order of Merlin, First Class, Grand Sorc., Chf. Warlock,</p>
        <p>Supreme Mugwump, International Confed. of Wizards)</p>
        <div class="btn-containers">
            <button class="download"><a href="generate.php?email=<?php echo $row['email']; ?>">DOWNLOAD PDF</a></button>
            <button class="signin"><a href="signin.php">SIGN IN</a></button>
        </div>
    </footer>
</body>
</html>
