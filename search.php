<?php
require 'template/header.php';
$search = $_GET['search'];?>
<main id="searchpage">

        <section  id="mobile">
            
            <?php
                $sql ="SELECT * FROM course WHERE CourseName LIKE '%$search%'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0){ ?>
                        <section class="row" >

                        <?php 
                            while($row = mysqli_fetch_assoc($result)){ ?>
                            <section class="column" >
                                <img class="CourseImage" src="102.jpg" alt="<?=$row['CourseName']?>" width="" height="150px"/>
                                <h3 class="CourseName"><a href="course.php?ID=<?=$row['ID']?>&desc=<?=$row['Description']?>&course=<?=$row['CourseName']?>"><?=$row['CourseName']?></a></h3>
                                <p class="CourseDescription"><?= substr($row['Description'],0,50)?></p>
                            </section>
                            <?php 
                                }} else{
                                    $message= " Oops, the course  you are looking for isn't available";
                                }

                
                            ?>

                        </section>
                        <?php if(!empty($message)){ ?>
        <h4 class="message"><?=$message?></h4>
    <?php } ?>  
        </section>
  </main>        

<?php    require 'template/footer.php';