<?php                  
//***Used to established a connection with the usersdb , which stores the credentials of all the registered users***//
$serverName="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="usersdb";

$link = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$link)
  {
      die("Connection failed :"  . mysqli_connect_error());
  }