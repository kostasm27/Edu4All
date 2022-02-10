<?php
//***Used in order to send the requesting user an email which will change his password***/

    if (isset($_POST["submit-button"]))                                 //Checking if the user used the correct method to access this file ,through Submit_Button //
    {
        $email = $_POST["email"];
        
        require_once 'db.inc.php';                                      //Includes the db connection required// 
        require_once 'functions.inc.php';

        $query= " SELECT * FROM users WHERE usersEmail =  ? ";          //Finds the user's email in our db//
        $stmt=mysqli_stmt_init($link);
        if (!mysqli_stmt_prepare($stmt , $query))                       //Used for safety reasons , in case someone tries to inflitrate our db using queries//
        { 
            header("location : ../Register/register.php");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt ,"s",$email);
        mysqli_stmt_execute($stmt);

        $result=mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result)>0){                                 //If the requesting user (his email) actually exists in our db//

            $token = generateNewToken();                                 //Generates a random token which will be used for the user's authentication during the ResetPassword progress//
        
        
            $query= "UPDATE users SET token= ? ,  tokenExpire=DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE usersEmail= ? ";       //Updates our 'users' table  setting a token and tokenExpiration for the requesting user//
            $stmt=mysqli_stmt_init($link);
            if (!mysqli_stmt_prepare($stmt , $query))                   //Used for safety reasons , in case someone tries to inflitrate our db using queries//
                { 
                    header("location : ../Register/register.php");
                    exit();
                }
        
            mysqli_stmt_bind_param($stmt ,"ss", $token ,$email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            
            //***Preparation to send the requesting user an email, with a link containing his email  and token for authentication(in $_GET variables)***/
            $subject="Reset your password";
            $sender="From: georgehacker7@yahoo.gr";
            $url="http://localhost/Project_PSPI-georgioct/includes/resetpassword.php?email=$email&token=$token";              //Link to the resetPassword.php including the email and token of the user for authentication//
            
            $content=" Hello user,
                        In order to reset your password, please click on the link below:
                        $url
                                    
                        Edu4All Team
                    ";
            
            $delivery=mail($email,$subject,$content,$sender);                                 //Sends the email through Yahoo email services//
            
            if ($delivery){                                                                   //Checks if the email was sent successfully//
                header("location:../Login/login.php?reset=successful");              
            }
            else{
                header("location:../Login/login.php?reset=unsuccessful");
            }   

            

        }
    }
    else
    {
        header("location:../Login/login.php");                                //if not, redirects to the Login.php page//
        exit();
    }
