<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "login_register";

$conn = mysqli_connect($hostname, $username, $password, $database) or die("Database connection failed");

$base_url = "http://localhost:user-management-system/";
$my_email = "";

$smtp['host'] = "bloodshed009@gmail.com";
$smtp['user'] = "";
$smtp['pass'] = "";
$smtp['port'] = 3306;
