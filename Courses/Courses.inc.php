<?php
//***Used in order to check if the user accessed this page the correct way, through logging in a registered account***/

include_once 'db.connect.php';                                   //Used for connecting this page with the courses database//
session_start();
if (!isset( $_SESSION["loggedIn"])){
    header("location: ../Login/login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu4All</title>
    <link rel="icon" href="images/logo1.png">
    <link rel="stylesheet" href="courses_category.css">
    <link rel="stylesheet" href="navigationBar.css">  
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<body>

<section class="NavigationBar">
        <nav>
            <a href="../Home page/index.php"><img src="images/logo1.png"> </a>
            <div class="nav-bar">
                <ul>
                    <li><a href="../Dashboard/index.php">Courses</a></li>
                    <li><a href="../News/main-1.php">News</a></li>
                    <li><a href="../Contact/index.php">Contact</a></li>
                    <li><a href="../includes/logout.inc.php">Logout</a></li>
                </ul>
            </div>
        </nav> 
</section>

<section class="main-content" >
    <div class="school-courses">
        <div class="school-title">

        <?php     
            //**Through the $_GET['Subject] variable passed from Courses.php , it defines the selected faculty**//
             if ($_GET['Subject']=='Maths'){
                echo '<p>School of Mathematics</p>';
             }
             elseif ($_GET['Subject']=='ComputerScience'){
                echo '<p>Computer Science Department</p>';
             }
             elseif ($_GET['Subject']=='History'){
                echo '<p>Department of History</p>';
             }
             
        ?>
            
        </div>
        <div class="courses-label">
            <p>Available Courses</p>
        </div>

        

        <?php 
            //**Through the $_GET['Subject] variable passed from Courses.php , it fetches the 'Title' and 'Introduction' of all the  Courses from the courses db which belong to the selected 'Department'**//
             
            if ($_GET['Subject']=='Maths'){

                $query ="SELECT * FROM courses WHERE Department='School of Mathematics'";
                $result = mysqli_query($connect,$query);
                if (mysqli_num_rows($result)>0){
                    while ($row=mysqli_fetch_assoc($result)){
                        
                        $title=$row["Title"];
                        $introduction=$row["Introduction"];

                        echo "<div class='course-content'><div class='course-name'><a href='Courses_final.php?Title=$title'> <p> $title </p></a></div>";    //Redirects to Courses_final.php while passing as $_GET['Title] the selected course//
                        echo "<div class='course-description'> <p> $introduction </p> </div></div>";

                    }
                }
             }elseif ($_GET['Subject']=='ComputerScience'){

                $query ="SELECT * FROM courses WHERE Department='Computer Science Department'";
                $result = mysqli_query($connect,$query);
                if (mysqli_num_rows($result)>0){
                    while ($row=mysqli_fetch_assoc($result)){
                        
                        $title=$row["Title"];
                        $introduction=$row["Introduction"];

                        echo "<div class='course-content'><div class='course-name'><a href='Courses_final.php?Title=$title'> <p> $title </p></a></div>";   //Redirects to Courses_final.php while passing as $_GET['Title] the selected course//
                        echo "<div class='course-description'> <p> $introduction </p> </div></div>";

                    }
                }
            }elseif ($_GET['Subject']=='History'){

                $query ="SELECT * FROM courses WHERE Department='Department of History'";
                $result = mysqli_query($connect,$query);
                if (mysqli_num_rows($result)>0){
                    while ($row=mysqli_fetch_assoc($result)){
                        
                        $title=$row["Title"];
                        $introduction=$row["Introduction"];

                        echo "<div class='course-content'><div class='course-name'><a href='Courses_final.php?Title=$title'> <p> $title </p></a></div>";   //Redirects to Courses_final.php while passing as $_GET['Title] the selected course//
                        echo "<div class='course-description'> <p> $introduction </p> </div>";

                    }
                }
            }
            elseif ($_GET['Subject']=='Literature'){

                $query ="SELECT * FROM courses WHERE Department='Department of Literature'";
                $result = mysqli_query($connect,$query);
                if (mysqli_num_rows($result)>0){
                    while ($row=mysqli_fetch_assoc($result)){
                        
                        $title=$row["Title"];
                        $introduction=$row["Introduction"];

                        echo "<div class='course-content'><div class='course-name'><a href='Courses_final.php?Title=$title'> <p> $title </p></a></div>";  //Redirects to Courses_final.php while passing as $_GET['Title] the selected course//
                        echo "<div class='course-description'> <p> $introduction </p> </div>";

                    }
                }
            }
        ?>
           
    
  
    </div>

    <div class="footer">
        <p class="footer-par">©PSPI. 2021.</p>
    </div>

</section>

</body>
<script>  //***Changes the ".main-content" background-image every 1000 millieseconds***// 

    let item=document.querySelector('.main-content');

    var back_img = new Array (  'url(images/photo2.jpg)' , 'url(images/photo3.jpg)'  );

    var current=0;

    function changeImg () {
        current++;
        current = current % back_img.length;
        item.style.backgroundImage = back_img[current];
    }

    setInterval(changeImg,10000);

    item.style.backgroundImage = back_img[0];


</script> 
</html>