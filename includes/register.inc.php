<?php
//***Used in order to inser a new registered user in our usersdb database***/

if (isset($_POST["submit"]))                                                    //Checking if the user used the correct method to access this file ,through Submit_Button //
{

   $userName =$_POST["Username"];                                               //                                                                                                              //
   $email = $_POST["email"];                                                    //                                                                                                              //
   $pwrd = $_POST["password"];                                                  //Stores all the data from the Register.php input (method='POST') in variables,in order to insert them in our db//                                                                             //
   $repeat_pwrd = $_POST["password-repeat"];                                    //                                                                                                              //
   $answer = $_POST["answer"];                                                  //                                                                                                              //
   $teacher= null;
   
   if (isset($_POST["check"]))                                                  //If the "Sign up as a teacher" checkbox is checked //
         $teacher= 1;
   else
         $teacher= 0;     
      
   require_once 'db.inc.php';                                                   //Includes the db connection required// 
   require_once 'functions.inc.php';
   
   //***Used for error handling***//
   
   if (passwordMatch($pwrd , $repeat_pwrd)!==false)                             //Used for error checking , the fields "Password" and "Repeat Password" should be equal//
   {
      header("location:../Register/register.php?error=passwordmissmatch");      
      exit();
   }

   if (emailExists($link ,$email)!==false)                                      //Used for error checking, makes sure there isn't an already registered user using the same email//
   {
      header("Location:../Register/register.php?error=emailexists");            
      exit();
   }

   if (longerPassword($pwrd)!==false)                                           //Used for error checking, obligates the user to set a password of at least 8 characters/digits/symbols//
   {
    header("location:../Register/register.php?error=smallpassword");
    exit();
   }
   

   createUser($link,$userName,$email,$pwrd,$answer,$teacher);                   //Inserts the user credentials into our db//
      

}


else
{
    header("location:../Register/register.php");                                //if not, redirects to the Register.php page//
    exit(); 
}