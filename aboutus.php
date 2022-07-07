<?php require 'template/header.php';

?>
<main class="AboutusPage">
<nav class="main-nav" id="navbar" style="display:none;>
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
                                                            <a href="aboutus.php" class="nav">About us</a>
            <a href="courses.php?Category=backend" class="nav">Back-End Course</a>
            <a href="courses.php?Category=frontend" class="nav">Front-End Course</a>
            
           
            <a onclick="CloseMenu()" class="nav">Close</a>
        </nav>
    <section class="AboutusIntro">
        <p class="AboutusPara">Welcome to <span class="OneTouch">OneTouch</span> E-Learning  Platform, your number one source for all web development courses  FrontEnd Courses like HTML, CSS, JavaScript,React JS, JavaScript Data Types, Flutter. BackEnd Courses like PHP, MySQL, Node JS].</p>
        <p class="AboutusPara"> We're dedicated to giving you the very best of courses, with a focus on three characteristics,  Knowing Basics, Practicing in Real Projects and Uniqueness in your Projects.</p>
        <p class="AboutusPara">Founded in [2022] by [ALaa Mustafa and Suha Kamal], <span class="OneTouch"> OneTouch</span> has come a long way from its beginnings until it lanuches now. When we first started out, our passion for Learning,  helping other parents be more eco-friendly, providing the best courses for others. This drove us to do intense research, quit our day job, then it gave us the impetus to turn hard work and inspiration into to a booming E-learning website.</p>
        <p class="AboutusPara"> We now teach students all over the World, and are thrilled to cover a wide range of courses related to computer Science fields soon.</p>

        <p class="AboutusPara">We hope you enjoy our courses and you take the most advantage from it as much as we enjoy teaching them to you. If you have any questions or comments, please don't hesitate to contact us.</p>

        <p class="lastpara">Sincerely,</p>
        <p class="lastpara">ALaa and Suha, <p class="lastpara">CEO, Founder: OneTouch Website.</p></p>
    </section>
    <section class="CeoDetails">
        <h2 class="AboutusHeading"> Behind the Scenes </h2>
        <section class="alaa">
        <img src="suha.jpg" height="200px" width="200px" class="Img"/>
            <section class="alaadetails">
            <p>CEO & Founder</p>
            <p>Full Stack Web Development</p>
            <p class="email">suhakamal6@gmail.com</p>
            
            <section class="icons-template">
                <img src="instagram.svg" class="media-icons" alt="Instagram" width="40px"/>
                <img src="facebook.svg" class="media-icons" alt="Facebook"width="40px"/>
                <img src="twitter.svg" class="media-icons" alt="Twitter"width="40px"/>
            </section>  
            </section> 
        </section>

        <section class="suha">
            <img src="suha.jpg" height="200px" width="200px" class="Img"/>
            <section class="suhadetails">
                <p>CEO & Founder</p>
                <p>Full Stack Web Development</p>
                <p class="email">suhakamal6@gmail.com</p>
            
            <section class="icons-template">
                <img src="instagram.svg" class="media-icons" alt="Instagram" width="40px"/>
                <img src="facebook.svg" class="media-icons" alt="Facebook"width="40px"/>
                <img src="twitter.svg" class="media-icons" alt="Twitter"width="40px"/>
            </section>
            </section>
        </section>
    </section>
</main>


<?php require 'template/footer.php';