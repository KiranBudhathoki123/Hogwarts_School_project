<?php
include 'notification.php';
?>
<?php
include 'connection.php';
if(isset($_POST['teacher-submit'])){
    $name = $_POST['name'];
    $position = $_POST['position'];
    $subject = $_POST['subject'];
    $content_1 = $_POST['content1'];
    $content_2 = $_POST['content2'];
    $content_3 = $_POST['content3'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'upload_img/'.$image;
    $errors = array();
    if(empty($name)){
        $errors['name'] = "Name is required.";
    }
    if(empty($subject)){
        $errors['subject'] = "Subject is required.";
    }
    if(empty($position)){
        $errors['position'] = "Position is required.";
    }
    if(empty($content_1)){
        $errors['content1'] = "Content 1 is required.";
    }
    if(empty($content_2)){
        $errors['content2'] = "Content 2 is required.";
    }
    if(empty($content_3)){
        $errors['content3'] = "Content 3 is required.";
    }
    if(empty($image)){
        $errors['image'] = "Image is required.";
    }
    if(empty($errors)){
        $sql = "INSERT INTO `teacher` (`name`,`position`,`course`,`content_1`,`content_2`,`content_3`,`image`) VALUES('$name','$position','$subject','$content_1','$content_2','$content_3','$image')";
        $res = mysqli_query($conn,$sql);
        if(!$res){
            echo mysqli_error($conn);
        }
    }
}
?>
<h1 class="content-heading">Content Management System</h1>
<div class="container">
    <div class="form">
        <h1>Add new teacher here</h1>
        <form action="" method="post" enctype = "multipart/form-data">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter name" >
        <?php if(isset($errors['name'])): ?>
                    <span class="error"><?php echo $errors['name']; ?></span>
                <?php endif; ?>

        <label for="position">Position</label>
        <input type="text" id="position" name="position" placeholder="Enter position">
        <?php if(isset($errors['position'])): ?>
                    <span class="error"><?php echo $errors['position']; ?></span>
                <?php endif; ?>
        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" placeholder="Enter the subject">
        <?php if(isset($errors['subject'])): ?>
                    <span class="error"><?php echo $errors['subject']; ?></span>
                <?php endif; ?>
        <label for="content1">Content 1</label>
        <input type="text" id="content1" name="content1" placeholder="Enter content 1">
        <?php if(isset($errors['content1'])): ?>
                    <span class="error"><?php echo $errors['content1']; ?></span>
                <?php endif; ?>
        <label for="content2">Content 2</label>
        <input type="text" id="content2" name="content2" placeholder="Enter content 2">
        <?php if(isset($errors['content2'])): ?>
                    <span class="error"><?php echo $errors['content2']; ?></span>
                <?php endif; ?>
        <label for="content3">Content 3</label>
        <input type="text" id="content3" name="content3" placeholder="Enter content 3">
        <input class="file" type = "file" name="image">
        <?php if(isset($errors['image'])): ?>
                    <span class="error"><?php echo $errors['image']; ?></span>
                <?php endif; ?>
                <div class="button-contain">
                    <button name="teacher-submit" type="submit">Submit</button>
                    <button class="teachers"><a href = 'teachermgmt.php'>View All</a></button>
                </div>
        
        </form>
    </div>
    <div class="form">
    <h1>Add new student here</h1>
        <form action="" method="post" enctype = "multipart/form-data">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter name" >
        <?php if(isset($errors['name'])): ?>
                    <span class="error"><?php echo $errors['name']; ?></span>
                <?php endif; ?>

        <label for="position">Position</label>
        <input type="text" id="position" name="position" placeholder="Enter position">
        <?php if(isset($errors['position'])): ?>
                    <span class="error"><?php echo $errors['position']; ?></span>
                <?php endif; ?>
        <label for="subject">Subject</label>
        <input type="text" id="subject" name="subject" placeholder="Enter the subject">
        <?php if(isset($errors['subject'])): ?>
                    <span class="error"><?php echo $errors['subject']; ?></span>
                <?php endif; ?>
        <label for="content1">Content 1</label>
        <input type="text" id="content1" name="content1" placeholder="Enter content 1">
        <?php if(isset($errors['content1'])): ?>
                    <span class="error"><?php echo $errors['content1']; ?></span>
                <?php endif; ?>
        <label for="content2">Content 2</label>
        <input type="text" id="content2" name="content2" placeholder="Enter content 2">
        <?php if(isset($errors['content2'])): ?>
                    <span class="error"><?php echo $errors['content2']; ?></span>
                <?php endif; ?>
        <label for="content3">Content 3</label>
        <input type="text" id="content3" name="content3" placeholder="Enter content 3">
        <input class="file" type = "file" name="image">
        <?php if(isset($errors['image'])): ?>
                    <span class="error"><?php echo $errors['image']; ?></span>
                <?php endif; ?>
                <div class="button-contain">
                    <button name="teacher-submit" type="submit">Submit</button>
                    <button class="teachers"><a href = 'teachermgmt.php'>View All</a></button>
                </div>
        
        </form>
    </div>
</div>
</body>
</html>
