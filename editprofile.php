<?php
require 'template/header.php';
if (!isset($_SESSION['email'])) {
    redirect('login.php');
}
/*
$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE ID = $id";
$result = mysqli_query($conn, $sql) ;
if(mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_array($result);
}
if (isset($_SESSION['email']) && isset($_SESSION['id'])) {

    //file upload  helper function
    include 'fun-file-upload.php';
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM user where ID = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
        }
    }

    $first_name = $last_name = $email = $password = $repeat_Pwd = "";
    $first_name_err = $last_name_err = $email_err = $password_err = $repeat_Pwd_err = "";
    $success = $faild = "";

    if (isset($_POST) && isset($_POST['send'])) {
        //validate First  Name
        if (isset($_POST['first_name'])) {
            $first_name = trim($_POST['first_name']);
            if (empty($first_name)) {
                $first_name_err = "Please Enter First Name";
            } elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $first_name)) {
                $first_name_err = "First name can only contain letters, numbers, and underscores.";
            }
        }

        //validate Last  Name
        if (isset($_POST['last_name'])) {
            $last_name = trim($_POST['last_name']);
            if (empty($last_name)) {
                $last_name_err = "Please Enter Last Name";
            } elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $last_name)) {
                $last_name_err = "Last name can only contain letters, numbers, and underscores.";
            }
        }

        //validate Email
        if (isset($_POST['email'])) {
            $email = trim($_POST['email']);
            if (empty($email)) {
                $email_err = "Please Enter Email Address";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_err = "Please Enter Valid Email";
            } else {
                $sql = "SELECT * FROM user WHER E-mail = '$email";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        $email_err = "Email Already Exist";
                    }
                }
            }
        }

        if (empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($password_err) && empty($repeat_Pwd_err)) {
            $sql = "UPDATE user SET First Name='$first_name', Last Name='$last_name', E-mail='$email' WHERE ID ='$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $success = "update successfully";
            } else {
                $faild = "Faild to update" .  mysqli_connect_error();
            }
        }
    }
} else {
    // header('Location: ../login.php');
    //exit;
}*/


$first_name = $last_name = $email = $password = $repeat_Pwd = "";
$first_name_err = $last_name_err = $email_err = $password_err = $repeat_Pwd_err = "";
$success = $faild = "";

if (isset($_POST) && isset($_POST['send'])) {
    //validate First  Name
    if (isset($_POST['first_name'])) {
        $first_name = trim($_POST['first_name']);
        if (empty($first_name)) {
            $first_name_err = "Please Enter First Name";
        } elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $first_name)) {
            $first_name_err = "First name can only contain letters, numbers, and underscores.";
        }
    }

    //validate Last  Name
    if (isset($_POST['last_name'])) {
        $last_name = trim($_POST['last_name']);
        if (empty($last_name)) {
            $last_name_err = "Please Enter Last Name";
        } elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $last_name)) {
            $last_name_err = "Last name can only contain letters, numbers, and underscores.";
        }
    }

    //validate Email
    if (isset($_POST['email'])) {
        $email = trim($_POST['email']);
        if (empty($email)) {
            $email_err = "Please Enter Email Address";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Please Enter Valid Email";
        } else {
            $sql = "SELECT * FROM user WHER E-mail = '$email";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $email_err = "Email Already Exist";
                }
            }
        }
    }

    //validate Password
    if (isset($_POST['password'])) {
        $password = trim($_POST['password']);
        if (empty($password)) {
            $password_err = "Please Enter Password";
        } elseif (strlen($password) < 6) {
            $password_err = "Password have at least 6 characters";
        }
    }

    //validate confirm password
    if (isset($_POST['repeat-Pwd'])) {
        $repeat_Pwd = trim($_POST['repeat-Pwd']);
        if (empty($repeat_Pwd)) {
            $repeat_Pwd_err = "Please Confirm Password";
        } elseif (empty($password_err) && ($password != $repeat_Pwd)) {
            $repeat_Pwd_err = "Password does not match with confirm";
        }
    }

    if (empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($password_err) && empty($repeat_Pwd_err)) {
        $sql = "UPDATE user SET First Name='$first_name', Last Name='$last_name', E-mail='$email' WHERE ID ='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $success = "update successfully";
        } else {
            $faild = "Faild to update" .  mysqli_connect_error();
        }
    }
} else {
    /*$faild = "Failed To Insert";
    header("Location: register.php");
    exit;*/
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
<section class="container">
                <h1 class="section-header">Sign In to OneTouch</h1>
                <span><?=$success; ?></span><span><?=$faild; ?></span>
                <div class="form-register">
                    <form action="" method="POST">
                    <div class="Current-Photo">
                        <input type="file" name="student-photo" id="student-photo" />
                        <label for="photo">photo</label>
                        <input type="text" name="Current_photo" id="Current photo" value="" hidden />
                        <a href="#">Current Photo</a>
                    </div>
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
                            <button type="submit" name="send" id="send" class="send-btn">Save</button>
                            <button type="reset" name="Cancel" id="Cancel" class="send-btn cancel">Cancel</button>
                        </div>
                        
                    </form>
                </div>
            </section>
</article>
</main>
<?php require 'template/footer.php' ?>