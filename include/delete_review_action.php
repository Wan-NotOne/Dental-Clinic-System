<?php
include('config.php');

$id = $_GET['id'];

$sql = "DELETE FROM review WHERE review_id=" . $id;
if (mysqli_query($conn, $sql)) {
  include('delete_review_message.php');
}
mysqli_close($conn);
?>