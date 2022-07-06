<?php

/*if (!isset($_SESSION['email'])) {
    redirect('login.php');
}*/

require 'template/header.php';
?>

<nav class="main-nav" id="navbar">
    <?php
    if (isset($_SESSION['email'])) {
    ?>
        <a href="../profile.php" class="nav">Profile</a>
    <?php
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

<main>
    <a href="../editprofile.php?id=1"><img class="cover" src="../html.png" alt="Profile cover" width="100%" height="120px" /></a>
    <a href="../editprofile.php?id=1"><img class="profile" src="../47.jpg" alt="Profile Image" width="40%" height="120px" /></a>
    <a href="../editprofile.php?id=1" class="UserName">
        <h2 class="UserName">Suha Kamal</h2>
    </a>
    <section class="admin-card">
        <h1 class="enrolled-students"> 375<br> <span id="enrolled-students"> Courses </span> </h1>
    </section>
    <section class="admin-card">
        <h1 class="enrolled-students"> 375<br> <span id="enrolled-students"> teachers </span> </h1>
    </section>
    <section class="admin-card">
        <h1 class="enrolled-students"> 375<br> <span id="enrolled-students"> users </span> </h1>
    </section>
</main>