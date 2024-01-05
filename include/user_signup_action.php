<?php

include("config.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

//STEP 1: Form data handling using mysqli_real_escape_string function to 
// escape special characters for use in an SQL query,
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
    $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $phone = $_POST["phone"];
    $ic = $_POST["ic"];
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);

    // Validate pwd and confirmPwd
    if ($password != $confirmPassword) {
        // die("Password and confirm password do not match");
        // header("Location: ../sign_up.php");
        $message = "Password and confirm password do not match";
        include("./user_signup_message.php");
    }

    //STEP 2: Check if matricNo already exist
    $sql = "SELECT * FROM patient WHERE ic='$ic' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $message = "Error: User exist, please register a new user";
        include("./user_signup_message.php");
    } else {
        // User does not exist, insert new user record, hash the password
        $pwdHash = trim(password_hash($_POST['password'], PASSWORD_DEFAULT));

        $sql = "INSERT INTO user (ic,email,mobile,gender,address,password,firstName,lastName) VALUES ('$ic','$email','$phone','$gender','$address','$pwdHash','$firstName','$lastName')";
        if (mysqli_query($conn, $sql)) {
            $message = "New user record created successfully. Welcome $firstName $lastName.";
            include("./user_signup_message.php");
        } else {
            $message = "Error: $sql \n $error";
            include("./user_signup_message.php");
        }
    }
    mysqli_close($conn);
}
