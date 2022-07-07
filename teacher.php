<?php
require 'template/header.php';
if (!isset($_SESSION['email'])) {
    redirect('login.php');
}

?>
<main id="TeacherPage">
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
    <a href="editprofile.php"><img class="cover" src="cover.png" alt="Profile cover" width="100%" height="120px"/></a>
    <a href="editprofile.php"><img class="profile" src="profile.jpg" alt="Profile Image" width="40%" height="120px"/></a>
    <a href="editprofile.php"><img class="edit" src="edit.png" alt="edit Image" width="5%" height="20px"/></a>
    
    <?php
        $sql = "SELECT * FROM user WHERE Email = '$_SESSION[email]'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0 ){
            while($row = mysqli_fetch_assoc($result)){?>
        <h3 ><a class="UserName" href="editprofile.php?ID=<?=$row['ID']?>"> <?=$row['FirstName']?> <?=$row['LastName']?></a> </h3>
    <?php }} ?>

    <ul class="CoursesLectures">
        <li class="CoursesPage"> <a href="addcourse.php">Courses and Lectures Update</a> </li>
    </ul>
</main>
<?php require 'template/footer.php' ?>