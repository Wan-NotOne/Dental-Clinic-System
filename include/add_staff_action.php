<?php

session_start();
include("config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$target_dir = "./../uploads/";

$target_file = "";
$uploadOk = 0;
$imageFileType = "";
$uploadfileName = "";

$firstName = "";
$lastName = "";
$pwdHash = "";

//STEP 1: Form data handling using mysqli_real_escape_string function to 
// escape special characters for use in an SQL query,
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = mysqli_real_escape_string($conn, $_POST["firstName"]);
    $lastName = mysqli_real_escape_string($conn, $_POST["lastName"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $ic = mysqli_real_escape_string($conn, $_POST["ic"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $position = mysqli_real_escape_string($conn, $_POST["position"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $isAdmin = mysqli_real_escape_string($conn, $_POST["isAdmin"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);



    // Validate pwd and confirmPwd
    if ($password != $confirmPassword) {
        $message = "Password and confirm password do not match";
        include("./add_staff_message.php");
    } else {
        // Hash the password
        $pwdHash = trim(password_hash($_POST['password'], PASSWORD_DEFAULT));
    }

    //STEP 2: Check if staff already exist
    if ($_POST['position'] == "dentist") {
        $sql = "SELECT * FROM dentist  WHERE ic='$ic' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $message = "Error: Dentist exist, please register a new dentist";
            include("./add_staff_message.php");
        }
    } else if ($_POST['position'] == 'nurse') {
        $sql = "SELECT * FROM nurse  WHERE ic='$ic' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $message = "Error: Nurse exist, please register a new nurse";
            include("./add_staff_message.php");
        }
    }

    // Check if there is an image to be uploaded
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {

        $filetmp = $_FILES["fileToUpload"];
        $uploadfileName = $filetmp["name"];
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            $message = "Sorry, image file $uploadfileName already exists";
            $uploadOk = 0;
            include("./add_staff_message.php");
        }

        // Check file size <= 488.28KB or 500000 bytes
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $message = "Sorry, your file is too large. Try resizing your image.";
            $uploadOk = 0;
            include("./add_staff_message.php");
        }

        // Allow only these file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
            $uploadOk = 0;
            include("./add_staff_message.php");
        }

        // Check if uploadOk==1 and continue
        if ($uploadfileName != "" && $uploadOk == 1) {

            if ($row['position'] == "dentist") {
                $sql = "INSERT INTO dentist(ic,email,mobile,gender,address,password,firstName,lastName,photo,isAdmin) VALUES ('$ic','$email',$phone,'$gender','$address','$pwdHash','$firstName','$lastName','$uploadfileName','$isAdmin')";
            } else if ($row['position'] == 'nurse') {
                $sql = "INSERT INTO nurse(ic,email,mobile,gender,address,password,firstName,lastName,photo,isAdmin) VALUES ('$ic','$email',$phone,'$gender','$address','$pwdHash','$firstName','$lastName','$uploadfileName','$isAdmin')";
            }
            $status = update_DbTable($conn, $sql);

            if ($status) {
                if (move_uploaded_file(
                    $_FILES["fileToUpload"]["tmp_name"],
                    $target_file
                )) {
                    $message = "Form data updated successfully";
                    include("./add_staff_message.php");
                } else {
                    $message = "Sorry, there was an error uploding your file";
                    include("./add_staff_message.php");
                }
            } else {
                $message = "Sorry, there was an error uploading your data";
                include("./add_staff_message.php");
            }
        }
    }
    // There is no image to be uploaded so save the record
    else {
        // $sql = "UPDATE Profile SET name='$name',email='$email',program='$program',mentorName='$mentorName',motto='$motto' WHERE matricNo='$matricNo'";
        if ($_POST['position'] == "dentist") {
            $sql = "INSERT INTO dentist(ic,email,mobile,gender,address,password,firstName,lastName,isAdmin) VALUES ('$ic','$email',$phone,'$gender','$address','$pwdHash','$firstName','$lastName','$isAdmin')";
        } else if ($_POST['position']) {
            $sql = "INSERT INTO nurse(ic,email,mobile,gender,address,password,firstName,lastName,isAdmin) VALUES ('$ic','$email',$phone,'$gender','$address','$pwdHash','$firstName','$lastName','$isAdmin')";
        }

        $status = update_DbTable($conn, $sql);

        if ($status) {
            $message = "Success Add New Staff $firstName $lastName";
            include("./add_staff_message.php");
        } else {
            $message = "Sorry, there was an error uploading your data";
            include("./add_staff_message.php");
        }
    }
}

mysqli_close($conn);

// Function to insert data to database table
function update_DbTable($conn, $sql)
{
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {

        return false;
    }
}
