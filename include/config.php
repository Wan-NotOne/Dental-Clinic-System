<?php

$servernme = "localhost";
$username = "root";
$password = "";
$dbname = "dental-clinic";

// Create connection
$conn = mysqli_connect($servernme, $username, $password, $dbname);

// Check connection
if (!$conn) {
    // echo "<script>alert('Cannot Connect to database');</script>";
    die("Connection failed: " . mysqli_connect_error());
}
