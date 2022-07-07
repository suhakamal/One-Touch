<?php
require 'template/header.php';
$search = $_GET['search'];


            $sql ="SELECT * FROM course WHERE CourseName LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)) {
                $filter = $row["Catogary"];
                header("Location: course.php?Catogary=$filter&search=$search");
                }
            } 

    require 'template/footer.php';