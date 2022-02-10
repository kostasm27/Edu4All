<?php 
//***Used for error checking , the fields "Password" and "Repeat Password" should be equal***//
function passwordMatch($pwrd , $repear_pwrd) {
    $result=null;
    if ( $pwrd !== $repear_pwrd)
            $result=true;
    else
            $result=false;
    return $result;                
}

//***Used for error checking , makes sure there isn't an already registered user using the same email***//

function emailExists($link ,$email) {
    $query= " SELECT * FROM users WHERE usersEmail =  ? ";
    $stmt=mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt , $query))                                         //Used for safety reasons , in case someone tries to inflitrate our db using queries//
       { 
           header("location : ../Register/register.php?error=failedquery");           //Redirects to Login.php page with $_GET['error']=failedquery , used for error checking//
           exit();
       }
     
    mysqli_stmt_bind_param($stmt ,"s",$email);
    mysqli_stmt_execute($stmt);
    
    $result=mysqli_stmt_get_result($stmt);
    if ($row=mysqli_fetch_assoc($result)){
          return $row;                                                                //returns an associative array with all the fields of User with usersEmail=$email//
      }
    else{   
          $final=false;
          return $final;
      }

    mysqli_stmt_close($stmt);
}

//***Used for error checking , obligates the user to set a password of at least 8 characters/digits/symbols***//
function longerPassword($pwrd) {
    $result=null;
    if (strlen($pwrd)<8)
       $result=true;
    else
       $result=false;
    return $result;      
      
}

//***Inserts the credentials of a newly registered user to our usersdb database(table 'users')***//
function createUser($link,$userName,$email,$pwrd,$answer,$teacher) {

    $query = "INSERT INTO users (usersName , usersEmail ,usersPassword, usersRole, usersAnswer) VALUES(? , ? , ? , ? , ?);";
    $stmt=mysqli_stmt_init($link);
    if (!mysqli_stmt_prepare($stmt , $query))                                         //Used for safety reasons , in case someone tries to inflitrate our db using queries//
    { 
           header("location: ../Register/register.php?error=failedquery");            //Redirects to Login.php page with $_GET['error']=failedquery , used for error checking//
           exit();
    }
    

    #$encryptedPassword = password_hash($pwrd,PASSWORD_DEFAULT);                      //The password can be encrypted-hashed in order to make our db secure//


    mysqli_stmt_bind_param($stmt ,"sssis",$userName,$email,$pwrd,$teacher,$answer);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Login/login.php");
    exit();
     
}



//***Used for logging in the user to our website***//
function loginUser($link,$email,$pwrd){

    $user = emailExists($link ,$email);                                               //returns an associative array with all the fields of User with usersEmail=$email//

    if ($user === false){                                                             //Checks if the user's email exists in our db//
        header("location: ../Login/login.php?error=notexists");                       //Redirects to Login.php page with $_GET['error']=notexists , used for error checking//
        exit();
    }

    #$hashedPwrd = $user["usersPassword"];                                            //Verifying the Password input on Login.php page with the hashed_pwrd on our db //
    #$checkPwrd=password_verify($pwrd,$hashedPwrd);                                   //                                                                              //



    if (strcmp($pwrd,$user["usersPassword"])=== 0){                                   //Checks if the Password input on the Login.php page matches the one stored in our db//
       
        session_start();                                                              //Creates a session so that the user can access all the blocked content(Courses,News,Contact) of our website//
        $_SESSION["loggedIn"]=true;
        if (isset($_POST['remember'])){                          
            setcookie('email',$email,time() + 86400,'', '', true, true);              //Creates a cookie for the user's email and the user's password //
            setcookie('pwrd',$pwrd,time() + 86400,'', '', true, true);
        }
        header("location: ../Home page/index.php");                                   //Redirects the user to HomePage.php//
        exit(); 
    }
    else{
        header("location: ../Login/login.php?error=wronginput");                      //Redirects to Login.php page with $_GET['error']=wronginput, used for error checking//
        exit();  
    }

}

//***Used for reseting the user's password***//
function generateNewToken() {
        
        $token = "zxcvbnmasdfghjklqwer1234567890";                                    //Generates a random token which will be used for the user's authentication during the ResetPassword progress//
		$token = str_shuffle($token);
		$token = substr($token, 0, 10);
        return $token;
}