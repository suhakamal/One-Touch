<?php
require 'template/header.php';

/*
if (isset($_SESSION['email'])) {
    if ($_SESSION['role'] == 1) //$_POST['role]
    {
        header("Location: student/index.php");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
}*/

if (!isset($_SESSION['email']) && !isset($_SESSION['role'])) {
    //require 'setup/auth2.php';
    

    $email = $password = "";
    $email_err = $password_err = "";
    $success = $fail = "";
    if (isset($_POST) && isset($_POST['send'])) {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = trim($_POST['email']);
            if (empty($email)) {
                $email_err = "Please enter Email address";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_err = "Please enter valid email";
            }

            $password = trim($_POST['password']);
            if (empty($password)) {
                $password_err = "Please enter password";
            }

            if (empty($email_err) && empty($password_err)) {
                $sql = "SELECT * FROM user where Email = '$email' and Password = '$password'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $user_id = $row['ID'];
                            $user_email = $row['Email'];
                            $user_pass = $row['Password'];
                            $role = $row['Role'];

                            if (($email == $user_email) && ($password == $user_pass)) {
                                $_SESSION['email'] = $user_email;
                                $_SESSION['role'] = $role;
                                $_SESSION['id'] = $user_id;

                                //if ($_SESSION['role'] == 1 ) {
                                    header("Location: index.php");
                                    exit;
                                //} else {
                                  //  header("Location: profile.php");
                                    //exit;
                                //}
                            }
                            
                            // $em = "Incorrect user name OR password";
                            $fail = "Incorrect user name OR password";
                            //header("Location: login.php?error=$em");exit;
                        }
                    } //$fail = "Incorrect user name OR password";
                }
                $fail = "Incorrect user name OR password";
            } //$fail = "Incorrect user name OR password";
        }
    }
} else {
    header("Location: index.php");
    exit;
}
?>

    
        <main>
            <nav class="main-nav" id="navbar">
                        <a href="courses.php?Category=backend" class="nav">Back-End Course</a>
                        <a href="courses.php?Category=frontend" class="nav">Front-End Course</a>
                        <a href="" class="nav">About us</a>
                        <a href="login.php" class="nav">Login</a>
                        <a onclick="CloseMenu()" class="nav">Close</a>
            </nav>
            <section class="container">
                <h1 class="section-header">OneTouch Login</h1>
                <?php
                if (isset($_GET['error'])) { ?>
                    <span><?= htmlspecialchars($_GET['error']); ?></span><?php } ?>
                <?php if (isset($_GET['success'])) { ?>
                    <span><?= htmlspecialchars($_GET['success']); ?></span> <?php } ?>
                <div class="form-register">
                <span><?=$success; ?></span><span><?=$fail; ?></span>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="<?=$email?>" class="form-control" placeholder="Enter Email"  />
                        </div>
                        <span><?= $email_err; ?></span>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" name="password" id="password" value="" class="form-control" placeholder="Enter Password"  />
                        </div>
                        <span><?= $password_err; ?></span>
                        <div class="form-group">
                            <button type="submit" name="send" id="send" class="send-btn">Sign In</button>
                            <button type="reset" name="Cancel" id="Cancel" class="send-btn cancel">Cancel</button>
                        </div>
                        
                    </form>
                    <p class="LoginPara"> Don't have an account, <a href="register.php">Create One </a><p>
                </div>
            </section>
        </main>

<?php require 'template/footer.php' ?>