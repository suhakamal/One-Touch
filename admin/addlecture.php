<?php
require 'template/header.php';
/*if (!isset($_SESSION['email'])) {
    redirect('login.php');
}*/

if(isset($_POST['AddButton'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql="INSERT INTO lecture   (Name, URL, courseID) VALUES ('$_POST[LectureName]','$_POST[URL]','$_GET[id]')";
        if(mysqli_query($conn,$sql)){
            $message=" $_POST[LectureName] Lecture Has Been Added Successfully";
        }
        else{
            $message="$_POST[LectureName] Lecture Has not Added Successfully";
        }
        
    }
}
?>
<main>
    <article>
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
                                                        } else { ?>
                <a href="login.php" class="nav">Login</a><?php
                                                        }
                                                            ?>
            <a onclick="CloseMenu()" class="nav">Close</a>
        </nav>
        <section class="course-container">
        <h4 class="message"><?=$message?></h4>
            <img src="html.png" alt="cource image" height="150" class="lec-img">
            <h1><?= $_GET['course'] ?></h1>
            <h2 class="CourseTableHeading">Add Lectures</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="lectureName">Lecture Name</label>
                    <input type="text" name="LectureName" id="LectureName" class="form-control" placeholder="Enter Lecture Name" required />
                </div>
                <div class="form-group">
                    <label for="Url">URL</label>
                    <input type="text" name="URL" id="URL" class="form-control" placeholder="URL" required />
                </div>
                <div class="form-group">
                    <button type="submit" name="AddButton" id="send" value="Add" class="send-btn">Add</button>
                    <button type="reset" name="Cancel" id="Cancel" class="send-btn cancel">Cancel</button>
                </div>

            </form>
        </section>
        </section>
    </article>
</main>
<?php require 'footer.php';
