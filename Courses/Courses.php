<?php
   //***Used in order to check if the user accessed this page the correct way, through logging in a registered account***/    
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edu4All</title>
        <link rel="icon" href="images/logo1.png">
        <link rel="stylesheet" href="courses_dashboard.css">
        <link rel="stylesheet" href="navigationBar.css">  
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">    
     </head>
     <body>
       
        <section class="NavigationBar">
            <nav>
               <a href="../Home page/index.php"><img src="images/logo1.png"> </a>
               <div class="nav-bar">
                   <ul>
                       <li><a href="Courses.php">Courses</a></li>
                       <li><a href="../News/main-1.php">News</a></li>
                       <li><a href="../Contact/index.php">Contact</a></li>
                       <li><a href="../includes/logout.inc.php">Logout</a></li>
                    </ul>
                </div>
             </nav> 
         </section>

         <section class="main-content">

              <div class="faculty">
                   
                   <div class="faculty-title">
                      <p>Faculty of Sciences</p>
                   </div>
                    
                   <div class="faculty-content">
                        <a href="Courses.inc.php?Subject=Maths">School of Mathematics</a>   
                   </div>
                    
                   <div class="faculty-content">
                        <a href="Courses.inc.php?Subject=ComputerScience">CS Department</a>
                   </div>

              </div>

                <div class="faculty">
                    
                    <div class="faculty-title">
                           <p>Faculty of Philosophy</p>
                    </div>
                    
                    <div class="faculty-content">
                        <a href="Courses.inc.php?Subject=History">Department of History</a>
                    </div>

                    <div class="faculty-content">
                        <a href="Courses.inc.php?Subject=Literature">Department of Literature</a>
                    </div>

                    
                    
                   
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