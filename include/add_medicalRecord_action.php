
<?php
session_start();
include("config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // prepare data
    $id = $_POST["id"];
    $dentistID = $_POST['dentistID'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $problem = $_POST['problem'];

    $sql = "INSERT INTO medicalRecord(dentistID,patientID,date,time,problem) VALUES ('$dentistID','$id','$date','$time','$problem')";

    $status = update_DbTable($conn, $sql);

    if ($status) {
        $message = "Form data and file updated successfully";
        include("./add_medicalRecord_message.php");
    } else {
        $message = "Sorry, there was an error uploading your data";
        include("./add_medicalRecord_message.php");
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
