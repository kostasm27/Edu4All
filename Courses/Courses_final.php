<?php 
//***Used in order to check if the user accessed this page the correct way, through logging in a registered account***/
    
    include_once 'db.connect.php';                //Used for connecting this page with the courses database//
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
        <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1">
        <title>Edu4All</title>
        <link rel="icon" href="images/logo1.png">
        <link rel="stylesheet" href="courses_final.css">
        <link rel="stylesheet" href="navigationBar.css">
        <link rel="stylesheet" href="calendar.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">   
     </head>
     <body>

        <section class="NavigationBar">
            <nav >
                <a href="../Home page/index.php"><img src="images/logo1.png"> </a>
                <div class="nav-bar">
                    <ul>
                        <li><a href="Courses.php">Courses</a></li>
                        <li><a href="../news/main-1.php">News</a></li>
                        <li><a href="../Contact/index.php">Contact</a></li>
                        <li><a href="../includes/logout.inc.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
         </section>

        <section class="Course">
            <div class="main-content">
                <div class="course-content">
                    <?php 
                     //Used in order to fetch the content of the selected Course (Introduction , Requirements , Bibliography )//
                     $input=$_GET['Title'];
                     $query="SELECT * FROM courses WHERE Title='$input'";
                     $result=mysqli_query($connect,$query);
                     if (mysqli_num_rows($result)>0){
                         $row=mysqli_fetch_assoc($result);
                         $title=$row['Title'];
                         $introduction=$row['Introduction'];
                         $chapters=$row['Chapters'];
                         $requirements=$row['Requirements'];
                         $bibliography=$row['Bibliography'];

                         echo "<div class='introduction'><h1>Introduction to $title</h1><p>$introduction</p></div>";

                         echo "<div class='learning'><h1>What will we learn?</h1><div class='learn-info'> $chapters</div></div> ";

                         echo " <div class='requirements'><h1>Requirements</h1><p>$requirements</p></div>";

                         echo "<div class='bibliography'><h1>Bibliography</h1> <a href=$bibliography><p>&#x1F56E Anany Levitin: 'Introduction to the Design and Analysis of Algorithms'</p></a>";



                     }
                     else{
                         header('location: Courses.inc.php');
                     }

                    ?>
                     
                </div>
            
               <div class="other-content">
                  <div class="calendar">
                      <div class="month">
                         <i class="fas fa-angle-left prev"></i>
                         <div class="date">
                           <h1></h1>
                           <p></p>
                         </div>
                         <i class="fas fa-angle-right next"></i>
                      </div>
                      <div class="weekdays">
                         <div>Sun</div>
                         <div>Mon</div>
                         <div>Tue</div>
                         <div>Wed</div>
                         <div>Thu</div>
                         <div>Fri</div>
                         <div>Sat</div>
                      </div>
                     <div class="days"></div>
                 </div>



                 <div class="classer">
                     <img  src="images/photo1.jpg" >
                 </div>
              </div>
            </div>

            <div class="footer">
                <p class="footer-par">©PSPI. 2021.</p>
            </div>
            
        </section>

     
    <script src="setCalendar.js"></script>
 </body>
</html>