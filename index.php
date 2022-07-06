<?php require 'template/header.php';
if (!isset($_SESSION['email'])) {
    redirect('login.php');
}
?>
    <main>
        <!--  <section class="offer">
                    
                </section>-->
        <section class="jambotron">
              
                <section class="jambotron-head">
                    <h1>Ready <br>to Level-Up <br> Your<br> <span>PROGRAMING SKILLS?</span></h1>
                </section>
                <section class="reviews">
                    <h2 class="reviews-head"> <span >What Our Students Say?</span></h2>
                    
                    
                    <?php
                        $sql = "SELECT * FROM comment ORDER BY ID DESC LIMIT 2";
                        $result = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($result) > 0 ){
                            while($row = mysqli_fetch_assoc($result)){ ?>
                            <article class="review">
                                <h4 class="review-head"><?= $row['FirstName']?> <?=$row['LastName']?></h4>
                                <q class="comment"><?=$row['Comment']?></q>
                            </article>
                        <?php }
                    }?>
                    
                    <a href="comments.php"><button  class="Buttons" id="Commentbtn">Leave a comment</button></a>
                    <button class="login-btn">Login</button>
                </section>
        </section>
            
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
                    <a href="aboutus.php" class="nav">About us</a>
                   
                    <a onclick="CloseMenu()" class="nav">Close</a>
                </nav>
            
                </div>
        
            <section class="courses">
                <article class="web-development">
                    <h2 class="header">
                        Web Development Course
                    </h2>
                    <p >
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod beatae, earum minus accusantium
                        neque
                        asperiores explicabo quos iure, omnis molestias dicta impedit autem fugit iste cumque, nobis
                        culpa
                        excepturi blanditiis. 
                    </p>
                    <br>
                </article>
                <article class="front-end">
                    <h2 class="course-head"> Front End </h2>
                    <p class="para">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod beatae, earum minus accusantium
                        neque
                        asperiores explicabo quos iure, omnis molestias dicta impedit autem fugit iste cumque, nobis
                        culpa
                        excepturi blanditiis. <a href="courses.php?Category=frontend" class="course-link">Learn More...</a>
                    </p>
                    <div class="counter-container">
                        <div class="counter" data-target="1500" class="enrolled-students" id="enrolled-students"> 724 </div>
                    </div>
                    <p>Enrolled Students</p>
                </article>
                <article class="back-end">
                    <h2 class="course-head"> Back End </h2>
                    <p class="para">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod beatae, earum minus accusantium
                        neque
                        asperiores explicabo quos iure, omnis molestias dicta impedit autem fugit iste cumque, nobis
                        culpa
                        excepturi blanditiis. <a href="courses.php?Category=backend" class="course-link">Learn More...</a>
                    </p>
                    <div class="counter-container">
                        <div class="counter" data-target="3000" class="enrolled-students" id="enrolled-students"> 508 </div>
                    </div>
                </article>
            </section>
            <br><br><br><br>
            <section class="row">
                <article class="column">
                    <img src="102.jpg" alt="teacher photo" class="teacher-photo" width="" />
                    <section class="teacher-details">
                        <h3 class="teacher-name">Ahmad Tibin</h3>
                        <p class="courseShortDesc">
                            Dive into HTML (Hyper Text Markup Language) blah
                        </p>
                    <section class="icons-template">
                        <img src="instagram.svg" class="media-icons" alt="Instagram"width="40px" />
                        <img src="facebook.svg" class="media-icons" alt="Facebook"width="40px"/>
                        <img src="twitter.svg" class="media-icons" alt="Twitter"width="40px"/>
                    </section>
                    </section>
                </article>
                <article class="column">
                    <img src="102.jpg" alt="teacher photo" class="teacher-photo" width="" id="mid-teacher-photo"/>
                    <section class="teacher-details"  id="mid-teacher-details">
                        <h3 class="teacher-name">Ahmad Tibin</h3>
                        <p class="courseShortDesc">
                            Dive into HTML (Hyper Text Markup Language) blah
                        </p>
                    <section class="icons-template">
                        <img src="instagram.svg" class="media-icons" alt="Instagram" width="40px"/>
                        <img src="facebook.svg" class="media-icons" alt="Facebook"width="40px"/>
                        <img src="twitter.svg" class="media-icons" alt="Twitter"width="40px"/>
                    </section>
                    </section>
                </article>
                <article class="column">
                    <img src="102.jpg" alt="teacher photo" class="teacher-photo" width=""/>
                    <section class="teacher-details">
                        <h3 class="teacher-name">Ahmad Tibin</h3>
                        <p class="courseShortDesc">
                            Dive into HTML (Hyper Text Markup Language) blah
                        </p>
                    <section class="icons-template">
                        <img src="instagram.svg" class="media-icons" alt="Instagram" width="40px"/>
                        <img src="facebook.svg" class="media-icons" alt="Facebook" width="40px"/>
                        <img src="twitter.svg" class="media-icons" alt="Twitter" width="40px"/>
                    </section>  
                    </section>  
                </article>
            </section>
        </main>
        <?php require 'template/footer.php' ?>
        