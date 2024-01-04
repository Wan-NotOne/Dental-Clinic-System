<?php
include('config.php');

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];
    $date = $_POST['date'];

    $sql = "UPDATE review SET first_name = '$first_name', last_name = '$last_name',rating = '$rating', comments = '$comments', date = '$date'";

    if ($conn->query($sql) === TRUE) {
        include("edit_review_message.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


$conn->close();
?>