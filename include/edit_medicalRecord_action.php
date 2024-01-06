
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
    // $update_date = new DateTime("now", new DateTimeZone("Asia/Kuala_Lumpur"));

    // $sql = "UPDATE schedule SET room_number='$room_number',date='$date',time_from=$time_from,time_to='$time_to',update_date='$update_date' WHERE id='$id'";
    $sql = "UPDATE medicalRecord SET dentistID='$dentistID', date='$date',time='$time',problem='$problem' WHERE id='$id'";

    $status = update_DbTable($conn, $sql);

    if ($status) {
        $message = "Form data and file updated successfully";
        include("./edit_medicalRecord_message.php");
    } else {
        $message = "Sorry, there was an error uploading your data";
        include("./edit_medicalRecord_message.php");
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
