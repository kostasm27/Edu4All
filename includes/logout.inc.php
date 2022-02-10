<?php           
//***Used in order to termibate the session which was created during the LoginProgress***//
session_start();       
session_unset();  
session_destroy();                                               //Destroys the session (Courses,News,Contact become inavailable because they require $_SESSION['loggedIn']=true)//

if  (isset($_COOKIE['email']) && isset($_COOKIE['pwrd'])){       //Destroys the email and password cookies created during th Login proccess//
        $email=$_COOKIE['email'];
        $password=$_COOKIE['pwrd'];
        setcookie('email',$email,time() -1);
        setcookie('pwrd',$pwrd,time() -1);
                       
} 
       

header("location:../Home page/index.php");                       //Redirects to the HomePage , need Re-login in order to access Courses,News,Contact//
exit();