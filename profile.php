<?php
require 'template/header.php';
if (!isset($_SESSION['email'])) {
    redirect('login.php');
}
?><?php
if ($_SESSION['role'] == 1) {?>
    <main class="inroll-courses">
    <nav class="main-nav" id="navbar" style="display:none;">
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
                    <a href="aboutus.php" class="nav">About us</a>
                   
                    <a onclick="CloseMenu()" class="nav">Close</a>
                </nav>
              <!--  <?php 
        $sql = "SELECT * FROM user WHERE ID = '$_GET[ID]'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0 ){

            while($row = mysqli_fetch_assoc($result)){ ?> 
                <section class="PersonalDetails">    
    <a href="editprofile.php"><img class="cover" src="cover.png" alt="Profile cover" width="100%" height="120px"/></a>
    <a href="editprofile.php"><img class="profile" src="profile.jpg" alt="Profile Image" width="40%" height="120px"/></a>
    <h3 class="UserName"><a href="editprofile.php?ID=<?=$row['ID']?>"> <?=$row['FirstName']?>  <?=$row['LastName']?></a> </h3>
    
 
               
                </section>
    <?php }
    }?> -->
       <a href="editprofile.php"><img class="cover" src="cover.png" alt="Profile cover" width="100%" height="120px"/></a>
    <a href="editprofile.php"><img class="profile" src="profile.jpg" alt="Profile Image" width="40%" height="120px"/></a>
    <a href="editprofile.php"><img class="edit" src="edit.png" alt="edit Image" width="5%" height="20px"/></a>
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