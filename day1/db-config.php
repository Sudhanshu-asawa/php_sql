<?php

$dbname = "userinfo";
$tbname = "post";

$conn = mysqli_connect("localhost", "admin", "admin");

echo "<div>";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // Create the database
    $createdb = "CREATE DATABASE IF NOT EXISTS $dbname";
    mysqli_query($conn, $createdb);
}


$conn = mysqli_connect("localhost", "admin", "admin",$dbname);
//Create the table

$createtb = "CREATE TABLE IF NOT EXISTS  $tbname(`id` INT(6) PRIMARY KEY, `PostTitle` VARCHAR(30), `PostDescription` VARCHAR(50))";

mysqli_query($conn, $createtb);
?>