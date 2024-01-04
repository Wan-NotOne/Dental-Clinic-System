<?php
session_start();
include("include/config.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="style/staff.css">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://kit.fontawesome.com/3a4d23485c.js" crossorigin="anonymous"></script>

    <title>Admin</title>

</head>

<body>

    <?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (isset($_SESSION['UID']) && !empty($_SESSION['UID'])) {
        $sql = $sql = "SELECT * FROM patient";
        $result = mysqli_query($conn, $sql);
    }
    ?>

    <div class="container-fluid navbar mb-5">
        <div class="col-12">
            <h1 class="text-center">Staff</h1>
        </div>
    </div>

    <div class="container">
        <h2 class="text-center mb-5">Patient List</h2>

        <table class="table table-bordered mb-5">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center w-80">Name</th>
                    <th scope="col" class="text-center w-20">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    $numRow = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>$numRow</td>";
                        echo "<td>" . $row['firstName'] . " " . $row['lastName'] . "</td>";

                        echo '<td class="text-center">';
                        echo '<a href="edit_patient.php?id=' . $row['id'] . '">Edit</a>';
                        echo '&nbsp;&nbsp;';
                        echo '<a href="patient_detail.php?id=' . $row['id'] . '">View</a>';
                        echo '&nbsp;&nbsp;';
                        echo '<a href="./include/delete_patient_action.php?id=' . $row['id'] . '" class="text-danger" onClick="return confirm(\'Delete?\');">Delete</a>';
                        echo '</td>';

                        echo "</tr>";
                        $numRow = $numRow + 1;
                    }
                } else {
                    echo '<tr><td colspan="6">0 results</td></tr>';
                }
                ?>

            </tbody>
        </table>

        <div class="col-12 text-center">
            <a href="./add_patient.php" class="btn btn-primary">Add Patient</a>
        </div>



    </div>

</body>

</html>