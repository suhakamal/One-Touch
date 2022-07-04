<?php
require 'template/header.php';
if (!isset($_SESSION['email'])) {
    redirect('login.php');
}
?><?php
if ($_SESSION['role'] == 1) {?>
    <main class="inroll-courses">
    <nav class="main-nav" id="navbar">
                    <?php
                    if (isset($_SESSION['email'])) {
                                    ?><a href="profile.php" class="nav">Profile</a><?php
                                } 
                    ?>
                     <?php
                    if (isset($_SESSION['email'])) {
                                    ?><a href="logout.php" class="nav">Logout</a><?php
                                } else {?>
                                    <a href="login.php" class="nav">Login</a><?php
                                }
                    ?>
                    <a href="courses.php?Category=backend" class="nav">Back-End Course</a>
                    <a href="courses.php?Category=frontend" class="nav">Front-End Course</a>
                    <a href="" class="nav">About us</a>
                   
                    <a onclick="CloseMenu()" class="nav">Close</a>
                </nav>
    
    <a href="editprofile.php"><img class="cover" src="html.png" alt="Profile cover" width="100%" height="120px"/></a>
    <a href="editprofile.php"><img class="profile" src="47.jpg" alt="Profile Image" width="40%" height="120px"/></a>
    <a href="editprofile.php" class="UserName"><h2 class="UserName">Suha Kamal</h2></a>
    
<!--  <?php 
        $sql = "SELECT * FROM user ";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0 ){

            while($row = mysqli_fetch_assoc($result)){ ?> 
                <section class="PersonalDetails">
                    <img class="UserImage" alt="<?=$row['cover']?>" width="100%" height="150px"/>
                    <img class="UserImage" alt="<?=$row['profile']?>" width="50%" height="150px"/>
                    <h3 class="UserName"><a><?=$row['FirstName']?><?=$row['LastName']?></a> </h3>
                </section>
    <?php }
    }?>
        -->
    <h1>Inroll Courses</h1>
    
    <section class="row">
        
        <?php
        $sql = "SELECT * FROM course WHERE Category = 'frontend'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0 ){

            while($row = mysqli_fetch_assoc($result)){ ?>
                <section class="course">
                    <img class="CourseImage" src="html.png" alt="<?=$row['CourseName']?>" width="" height="150px"/>
                    <h3 class="CourseName"><a href="course.php?id=<?=$row['id']?>"><?=$row['CourseName']?></a></h3>
                    <p class="CourseDescription"><?= substr($row['Description'],0,50)?></p>
                    <button  class="Buttons">Enroll Course</button>
                    <a href="comments.php"><button  class="Buttons" class="Commentbtn">Leave a comment</button></a>
                </section>
            <?php }
            }else{
                echo "0 results";
            }?>
    </section>
</main>
        <?php } elseif ($_SESSION['role'] == 2) {
            header("Location: teacher.php");
            exit;
        }else {
            header("Location: admin/admin.php");
            exit;
        }   

require 'template/footer.php';
?>