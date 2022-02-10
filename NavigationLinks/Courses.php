<?php
    include_once '../DatabaseConnect.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu4All</title>
    <link rel="stylesheet" href="../Courses/mainCourse.css?v=<?php echo time(); ?>">

</head>

<body>
    
    <?php include '../Nav and footer/navigationBar.php';?>

        <?php 
        $data = "SELECT * FROM newcourse;";
        $Courses = mysqli_query($connect, $data);
        while ($row = mysqli_fetch_assoc($Courses))
        {
        ?>
            <section class="main-content">

                <div class="faculty" id="faculty-box-science">
                    <div class="faculty-title">
                        <?php
                                    echo $row['Faculty'];
                        ?>
                    </div>
                    <div class="faculty-content">
                        <a href="../Courses/mathematics.php">
                        <?php
                                    echo $row['Department'];
                        ?>
                        </a>
                    </div>
                    <div class="faculty-content">
                        <a href="../Courses/csd.php">
                        <?php
                                    echo $row['Department'];
                        ?>
                        </a>
                    </div>
                </div>

                <div class="faculty" id="faculty-box-humanitarian">
                    <div class="faculty-title">
                        <?php
                                    $row = mysqli_fetch_assoc($Courses);

                                    echo $row['Faculty'];
                        ?>
                    </div>
                    <div class="faculty-content">
                        <a href="../Courses/history.php">
                        <?php
                                    echo $row['Department'];
                        ?>
                        </a>
                    </div>
                </div>
                <form action="../Courses/Upload_form/index.php">
                    <div class='add-new'>
                        <button class="button"> <span>Add New Course </span></button>
                    </div>
                </form>
                <div class="footer">
                <p class="footer-par">©PSPI. 2021.</p>
            </div>
            </section>
        <?php
        }
        ?>
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>

</html>