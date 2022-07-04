<?php
require 'template/header.php';
if (!isset($_SESSION['email'])) {
    redirect('login.php');
}
?>
<main id="CoursesPage">
<nav class="main-nav" id="navbar">
                    <?php
                    if (isset($_SESSION['email'])) {
                                    ?><a href="profile.php" class="nav">Profile</a><?php
                                } 
                    ?>
                    <a href="courses.php?Category=backend" class="nav">Back-End Course</a>
                    <a href="courses.php?Category=frontend" class="nav">Front-End Course</a>
                    <a href="" class="nav">About us</a>
                    <?php
                    if (isset($_SESSION['email'])) {
                                    ?><a href="logout.php" class="nav">Logout</a><?php
                                } else {?>
                                    <a href="login.php" class="nav">Login</a><?php
                                }
                    ?>
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
                    <h3 class="CourseName"><a href="course.php?id=<?=$row['id']?>"><?=$row['CourseName']?></a></h3>
                    <p class="CourseDescription"><?= substr($row['Description'],0,50)?></p>
                </section>
            <?php }
            }else{
                echo "0 results";
            }?>
    </section>
    
</main>
<?php require 'template/footer.php' ?>