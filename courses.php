<?php
require 'template/header.php';
if (!isset($_SESSION['email'])) {
    redirect('login.php');
}
?>
<main id="CoursesPage">
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
    <section class="row">
        <?php
        $sql = "SELECT * FROM course WHERE Category = '$_GET[Category]'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0 ){

            while($row = mysqli_fetch_assoc($result)){ ?>
                <section class="column">
                    <img class="CourseImage" src="102.jpg" alt="<?=$row['CourseName']?>" width="" height="150px"/>
                    <h3 class="CourseName"><a href="course.php?ID=<?=$row['ID']?>&desc=<?=$row['Description']?>&course=<?=$row['CourseName']?>"><?=$row['CourseName']?></a></h3>
                    <p class="CourseDescription"><?= substr($row['Description'],0,50)?></p>
                    <?php if ($_SESSION['role'] == 1) {?>
                    <button  class="Buttons">Enroll Course</button>
                    <?php } ?>
                </section>
            <?php }
            }else{
                echo "0 results";
            }?>
    </section>
    
</main>
<?php require 'template/footer.php' ?>