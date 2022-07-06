<?php
require 'template/header.php';
if (!isset($_SESSION['email'])) {
    redirect('login.php');
}
if(isset($_POST['AddButton'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql="INSERT INTO lecture  (LectureName, URL, courseID) VALUES ('$_POST[LectureName]','$_POST[URL]','$_GET[ID]')";
        
        if(mysqli_query($conn,$sql)){
            $message=" $_POST[LectureName] lecture has been added successfully";
        }
        else{
            print ($sql);
            $message="$_POST[LectureName] lecture has not been added successfully";
        }
        
    }
}
if(isset($_POST['UpdateButton'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql="UPDATE lecture SET LectureName = '$_POST[LectureName]' , URL='$_POST[URL]' , courseID='$_GET[ID]' WHERE ID ='$_POST[ID]' ";
        if(mysqli_query($conn,$sql)){
            $message=" $_POST[LectureName] lecture has been updated successfully";
        }
        else{
            print ($sql);
            $message="$_POST[LectureName] lecture has not been updated successfully";
        }
        
    }  
}
if(isset($_POST['RemoveButton'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql="DELETE FROM lecture WHERE ID = '$_POST[ID]'";
        if(mysqli_query($conn,$sql)){
            $message=" $_POST[LectureName] lecture has been removed successfully";
        }
        else{
            print ($sql);
            $message="$_POST[LectureName] lecture has not been removed successfully";
        }
        
    }  
}
?>
<main id="CoursePage">
    <article>
        <nav class="main-nav" id="navbar">
            <?php
            if (isset($_SESSION['email'])) {
            ?><a href="profile.php" class="nav">Profile</a><?php
                                                                                }
                                                                                    ?>
             <?php
            if (isset($_SESSION['email'])) {
            ?><a href="logout.php" class="nav">Logout</a><?php
                                                                                } else { ?>
                <a href="login.php" class="nav">Login</a><?php
                                                                                }
                                                            ?>
            <a href="courses.php?Category=backend" class="nav">Back-End Course</a>
            <a href="courses.php?Category=frontend" class="nav">Front-End Course</a>
            <a href="aboutus.php" class="nav">About us</a>
           
            <a onclick="CloseMenu()" class="nav">Close</a>
        </nav>
        
        <section class="course-container">
            
            <h1><?=$_GET['course']?></h1>
            <?php if(!empty($message)){ ?>
        <h4 class="message"><?=$message?></h4>
    <?php } ?>
    
            <aside class="lectures">
                <nav>

                    <?php
                    $sql = "SELECT * FROM lecture WHERE courseID = '$_GET[ID]'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <a href="course.php?ID=<?=$_GET['ID']?>&url=<?= $row['URL'] ?>&course=<?= $_GET['course'] ?>"><?= $row['LectureName'] ?></a>
                    <?php }
                    } else {
                        echo "There is no lectures available for this course  ";
                    }
                    ?>
                </nav>
            </aside>
            <section class="lecture">
                <?php if (!empty($_GET['desc'])) { ?>
                    <p><?= $_GET['desc'] ?></p>
                <?php } else { ?>
            
                    <iframe src="https://youtube.com/embded/<?= $_GET['url'] ?>" title="<?= $_GET['name'] ?>" width="100%" height="315" frameborder="0" allow="accelercometer; autoplay; clipboard-write; groscope; picture-in-picture encrypted-media" allowfullscreen></iframe>
                    <?php } ?>
            </section>
            <?php if ($_SESSION['role'] == 2) {?>
                <section class="LecturesTableSection">
                
                
                    <?php
        $sql = "SELECT * FROM lecture WHERE courseID = '$_GET[ID]'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0 ){?>
            <h2 class="LecturesTableHeading">Lectures List</h2>
            <table>
                    <tr>
                        <th>ID</th>
                        <th>Lecture Name</th>
                        
                    </tr>
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?=$row['ID']?></td>
                        <td><a href="course.php?ID=<?=$row['ID']?>&desc=<?=$row['Description']?>&course=<?=$row['LectureName']?>"><?=$row['LectureName']?></td>

                    </tr>
           
            <?php } }?>
             </table>
                <section class="AdmissionSection">
                    <h2 class="LecturesTableHeading">Update Section</h2>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="ID">ID</label>
                            <input type="text" name="ID" id="ID" class="form-control" placeholder="Only Require On Update and Remove"  />
                        </div>
                        <div class="form-group">
                            <label for="LectureName">Lecture Name</label>
                            <input type="text" name="LectureName" id="LectureName"  class="form-control" placeholder="Enter Lecture Name" required />
                        </div>
                        <div class="form-group">
                            <label for="URL">URL</label>
                            <input type="text" name="URL" id="URL"   class="form-control" placeholder="URL" required  />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="AddButton" id="send" value="Add" class="send-btn">Add</button>
                            <button type="submit" name="UpdateButton" id="send" value="Update" class="send-btn">Update</button>
                            <button type="submit" name="RemoveButton" id="send" value="Remove" class="send-btn">Remove</button>
                            <button type="reset" name="Cancel" id="Cancel" class="send-btn cancel">Cancel</button>
                        </div>
                    </form>
                </section>
            <?php }?>
        </section>
    </article>
</main>
<?php require 'template/footer.php';
