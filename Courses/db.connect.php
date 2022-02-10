<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'courses';

$connect = mysqli_connect($server,$username,  $password, $dbname);
if (!$connect){
      die("Connection failed :"  . mysqli_connect_error());
}