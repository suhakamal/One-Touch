<?php
require 'template/header.php';
if (!isset($_SESSION['email'])) {
    redirect('login.php');
}
if(isset($_POST['AddButton'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql="INSERT INTO lecutre   (LectureName, URL, courseID) VALUES ('$_POST[LectureName]','$_POST[URL]','$_POST[courseID]')";
        
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
        $sql="UPDATE lecture SET LectureName = '$_POST[LectureName]' , URL='$_POST[URL]' , courseID='$_POST[courseID]' WHERE ID ='$_POST[ID]' ";
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
<main id="TeacherPage">
<nav class="main-nav" id="navbar">
                
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

    <section class="CoursesTableSection">
    <h4 class="message"><?=$message?></h4>
    <h2 class="CourseTableHeading">Lectures List</h2>
        <?php
        $sql = "SELECT * FROM lecture";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0 ){?>
            <table>
                    <tr>
                        <th>ID</th>
                        <th>Lecture Name</th>
                        <th>URL</th>
                        <th>Course ID</th>
                    </tr>
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?=$row['ID']?></td>
                        <td><?=$row['LectureName']?></td>
                        <td><?=$row['URL']?></td>
                        <td><?=$row['courseID']?></td>
                    </tr>
           
            <?php }
            }else{
                $message="Please add lectures to view";
            }?>
             </table>
    </section>

    <section class="AdmissionSection">
    <h2 class="CourseTableHeading">Update Section</h2>
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
                            <label for="courseID">Course ID</label>
                            <input type="text" name="courseID" id="courseID"   class="form-control" placeholder="course ID"  required />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="AddButton" id="send" value="Add" class="send-btn">Add</button>
                            <button type="submit" name="UpdateButton" id="send" value="Update" class="send-btn">Update</button>
                            <button type="submit" name="RemoveButton" id="send" value="Remove" class="send-btn">Remove</button>
                            <button type="reset" name="Cancel" id="Cancel" class="send-btn cancel">Cancel</button>
                        </div>
                        
                    </form>
    <section>
</main>
<?php require 'template/footer.php' ?>