<?php

session_start();
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'courses';

    $connect = mysqli_connect($server,$username,  $password, $dbname);
?>