<?php
require 'template/header.php';
if (!isset($_SESSION['email'])) {
    redirect('login.php');
}
/*session_start();

if (isset($_SESSION['email'] ))  {
    header('Location: login.php');
    exit;
}**/

$first_name = $last_name = $email = $password = $repeat_Pwd = "";
$first_name_err = $last_name_err = $email_err = $password_err = $repeat_Pwd_err = "";
$success = $faild = "";

if (isset($_POST) && isset($_POST['send'])) {
    if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email'])
       && isset($_POST['password']) && isset($_POST['repeat-Pwd']))
    {
        $first_name = trim($_POST['first_name']);
        if (empty($first_name)) {
            $first_name_err = "Please Enter First Name";
        } elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $first_name)) {
            $first_name_err = "First name can only contain letters, numbers, and underscores.";
        }

        $last_name = trim($_POST['last_name']);
        if (empty($last_name)) {
            $last_name_err = "Please Enter Last Name";
        } elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $last_name)) {
            $last_name_err = "Last name can only contain letters, numbers, and underscores.";
        }

        $email = trim($_POST['email']);
        if (empty($email)) {
            $email_err = "Please Enter Email Address";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Please Enter Valid Email";
        }/* else {
            $sql = "SELECT * FROM user WHER Email = '$email";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $email_err = "Email Already Exist";
                }
            }
        }*/

        $password = trim($_POST['password']);
        if (empty($password)) {
            $password_err = "Please Enter Password";
        } elseif (strlen($password) < 6) {
            $password_err = "Password have at least 6 characters";
        }

        $repeat_Pwd = trim($_POST['repeat-Pwd']);
        if (empty($repeat_Pwd)) {
            $repeat_Pwd_err = "Please Confirm Password";
        } elseif (empty($password_err) && ($password != $repeat_Pwd)) {
            $repeat_Pwd_err = "Password does not match with confirm";
        }

        if (empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($password_err) && empty($repeat_Pwd_err))
     {
        $sql = "INSERT INTO user (First Name, Last Name, Email, Password) VALUES  ('$first_name', '$last_name', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $success = "User Added successfully";
        } else {
            $faild = "Faild to insert" .  mysqli_connect_error();
        }
    }
    }
  
    
}else{
    /*$faild = "Failed To Insert";
    header("Location: register.php");
    exit;*/
}
?>

        <main>
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
            <section class="container">
                <h1 class="section-header">Leave a comment</h1>
                <span><?=$success; ?></span><span><?=$faild; ?></span>
                <div class="form-register">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" id="first_name" value="<?= $first_name ?>" class="form-control" placeholder="Enter First Name" />
                        </div>
                        <span><?= $first_name_err; ?></span>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" value="<?= $last_name ?>" class="form-control" placeholder="Enter Last Name" />
                        </div>
                        <span><?= $last_name_err; ?></span>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="<?= $email ?>" class="form-control" placeholder="Enter Email" />
                        </div>
                        <span><?= $email_err; ?></span>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" name="password" id="password" value="" class="form-control" placeholder="Enter Password" />
                        </div>
                        <span><?= $password_err; ?></span>
                        <div class="form-group">
                            <label for="repeat-Pwd">Confirm Password</label>
                            <input type="password" name="repeat-Pwd" id="repeat-Pwd" value="" class="form-control" placeholder="Repeat Password" />
                        </div>
                        <span><?= $repeat_Pwd_err; ?></span>
                        <div class="form-group">
                            <button type="submit" name="send" id="send" class="send-btn">Sign Up</button>
                            <button type="reset" name="Cancel" id="Cancel" class="send-btn cancel">Cancel</button>
                        </div>
                        <p>First Time <a href="../register.php">Sign Up here</a>.</p>
                    </form>
                </div>
            </section>
        </main>
        <?php
        require 'template/footer.php'
        ?>