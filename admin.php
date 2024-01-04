<?php
session_start();
include("include/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="style/admin.css">

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
        $sqlDentist = $sql = "SELECT * FROM dentist";
        $resultDentist = mysqli_query($conn, $sql);
        $sqlNurse = $sql = "SELECT * FROM nurse";
        $resultNurse = mysqli_query($conn, $sql);
    }
    ?>


    <div class="container-fluid navbar mb-5">
        <div class="col-12">
            <h1 class="text-center">Admin</h1>
        </div>
    </div>

    <div class="container">
        <h2 class="text-center mb-5">Staff List</h2>

        <table class="table table-bordered mb-5">
            <thead>
                <tr>

                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center w-40">Name</th>
                    <th scope="col" class="text-center w-40">Position</th>
                    <th scope="col" class="text-center w-20">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $numRow = 1;
                if (mysqli_num_rows($resultDentist) > 0) {
                    while ($row = mysqli_fetch_array($resultDentist)) {
                        echo "<tr>";
                        echo "<td>$numRow</td>";

                        echo "<td>" . $row["firstName"] . " " . $row["lastName"] . "</td>";
                        echo "<td>Dentist</td>";

                        echo '<td class="text-center">';
                        echo '<a href="edit_staff.php?id=' . $row['id'] . '&position=dentist">Edit</a>';
                        echo '&nbsp;&nbsp;';
                        echo '<a href="staff_detail.php?id=' . $row['id'] . '&position=dentist">View</a>';
                        echo '&nbsp;&nbsp;';
                        echo '<a href="./include/delete_staff_action.php?id='.$row['id'].'&position=dentist" class="text-danger">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                        $numRow = $numRow + 1;
                    }
                }
                if (mysqli_num_rows($resultNurse) > 0) {
                    while ($row = mysqli_fetch_array($resultNurse)) {
                        echo "<tr>";
                        echo "<td>$numRow</td>";
                        echo "<td>" . $row["firstName"] . " " . $row["lastName"] . "</td>";
                        echo "<td>Nurse</td>";
                        echo '<td class="text-center">';
                        echo '<a href="edit_staff.php?id=' . $row['id'] . '&position=nurse">Edit</a>';
                        echo '&nbsp;&nbsp;';
                        echo '<a href="staff_detail.php?id=' . $row['id'] . '&position=nurse">View</a>';
                        echo '&nbsp;&nbsp;';
                        echo '<a href="./include/delete_staff_action.php?id='.$row['id'].'&position=nurse" class="text-danger">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                        $numRow = $numRow + 1;
                    }
                }
                if ($numRow == 1) {
                    echo '<tr><td colspan="6">0 results</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <div class="col-12 text-center">
            <a href="./add_staff.html" class="btn btn-primary">Add Staff</a>
        </div>



    </div>

</body>

</html>