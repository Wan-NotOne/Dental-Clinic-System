<?php
session_start();
if (isset($_SESSION["UID"])) {
    unset($_SESSION["UID"]);
    unset($_SESSION["loggedin_time"]);
    unset($_SESSION["email"]);
    echo $_SESSION["UID"];
    header("location:../index.php");
}