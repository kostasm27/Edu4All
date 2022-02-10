<?php

if (isset($_POST["submit"]))                     //Checking if the user used the correct method to access this file ,through Submit_Button //
{

   
   $email = $_POST["email"];
   $pwrd = $_POST["password"];
       
   require_once 'db.inc.php';                     //Includes the db connection required// 
   require_once 'functions.inc.php';  

   loginUser($link,$email,$pwrd);                //used for loging in the user(authentication process)//
     
}

else
{
    header("location:../Login/login.php");       //if not, redirects to the Login.php page//
    exit();
}

