<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "index";

$con = mysqli_connect($host, $username, $password, $dbname,3306);
if (!$con)
        {
        die("Connection failed!" . mysqli_connect_error());
        }
?>