<?php
require 'template/header.php';
/*if (!isset($_SESSION['email'])) {
    redirect('login.php');
}*/
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
    <section class="CoursesTableSection">
    <?php if(!empty($message)){?>
        <h4 class="message"><?=$message?></h4>
    <?php }?>
    <h2 class="CourseTableHeading">Teachers List</h2>
        <?php
        $sql = "SELECT * FROM user WHERE Role = 2";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0 ){
            $i = 1;?>
            <table>
                    <tr>
                        <th>No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?=$row['ID']?></td>
                        <td><?=$row['FirstName']?></td>
                        <td><?=$row['FirstName']?></td>
                    </tr>
           
            <?php }
            }else{
                echo "Please Add Courses to view";
            }?>
             </table>
    </section>
    
</main>
<?php require 'template/footer.php' ?>