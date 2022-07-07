<?php
require 'template/header.php';
if (!isset($_SESSION['email'])) {
    redirect('login.php');
}

if(isset($_POST['AddButton'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql="INSERT INTO course   (CourseName, Description, Category) VALUES ('$_POST[CourseName]','$_POST[Description]','$_POST[Category]')";
        if(mysqli_query($conn,$sql)){
            $message=" $_POST[CourseName] Course Has Been Added Successfully";
        }
        else{
            $message="$_POST[CourseName] Course Has not Added Successfully";
        }
        
    }
}
if(isset($_POST['UpdateButton'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql="UPDATE course SET CourseName = '$_POST[CourseName]' , Description='$_POST[Description]' , Category='$_POST[Category]' WHERE ID ='$_POST[ID]' ";
        if(mysqli_query($conn,$sql)){
            $message=" $_POST[CourseName] Course has been updated successfully";
        }
        else{
            print ($sql);
            $message="$_POST[CourseName] Course has not updated successfully";
        }
        
    }  
}
if(isset($_POST['RemoveButton'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $sql="DELETE FROM course WHERE ID = '$_POST[ID]'";
        if(mysqli_query($conn,$sql)){
            $message=" $_POST[CourseName] Course Has Been Removed Successfully";
        }
        else{
            
            $message="$_POST[CourseName] Course Has not Removed Successfully";
        }
        
    }  
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
    <section class="candl">       
            
    
    <section class="CoursesTableSection">
    <?php if(!empty($message)){ ?>
        <h4 class="message"><?=$message?></h4>
    <?php } ?>
    
        <?php
        $sql = "SELECT * FROM course";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0 ){?>
            <h2 class="CourseTableHeading">Courses List</h2>
            <table>
                    <tr>
                        <th>ID</th>
                        <th>Course Name</th>
                        <th>Category</th>
                    </tr>
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?=$row['ID']?></td>
                        <td><a href="course.php?ID=<?=$row['ID']?>&desc=<?=$row['Description']?>&course=<?=$row['CourseName']?>"><?=$row['CourseName']?></td>
                        <td><?=$row['Category']?></td>
                    </tr>
           
            <?php }
            }else{
                echo "Please Add Courses to view";
            }?>
             </table>
    </section>

    <section class="UpdateSection">
    <h2 class="CourseTableHeading">Update Section</h2>
    <form action="" method="POST">
                        <div class="form-group">
                            <label for="ID" class="first_name">ID</label>
                            <input type="text" name="ID" id="ID" class="form-control" placeholder="Only Require On Update and Remove"  />
                        </div>
                        <div class="form-group">
                            <label for="CourseName" class="first_name">Course Name</label>
                            <input type="text" name="CourseName" id="CourseName"  class="form-control" placeholder="Enter Course Name" required />
                        </div>
                        <div class="form-group">
                            <label for="Description" class="first_name">Description</label>
                            <input type="text" name="Description" id="Description"   class="form-control" placeholder="Description" required  />
                        </div>
                        <div class="form-group">
                            <label for="Category" class="first_name">Category</label>
                            <input type="text" name="Category" id="Category"   class="form-control" placeholder="Category"  required />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="AddButton" id="send" value="Add" class="send-btn">Add</button>
                            <button type="submit" name="UpdateButton" id="send" value="Update" class="send-btn">Update</button>
                            <button type="submit" name="RemoveButton" id="send" value="Remove" class="send-btn">Remove</button>
                            <button type="reset" name="Cancel" id="Cancel" class="send-btn cancel">Cancel</button>
                        </div>
                        
                    </form>
        </section>
        </section>
    </main>
    <?php require 'template/footer.php' ?>