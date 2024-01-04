<?php
include('config.php');

// Check if the required POST parameters are set
if (isset($_POST['first_name'], $_POST['last_name'], $_POST['rating'], $_POST['comments'], $_POST['date'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];
    $date = $_POST['date'];

    $sql = "INSERT INTO review (first_name, last_name, rating, comments, date) VALUES ('$first_name','$last_name','$rating','$comments','$date')";

    if ($conn->query($sql) === TRUE) {
        include("add_review_message.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: Required parameters are not set.";
}

$conn->close();
?>

