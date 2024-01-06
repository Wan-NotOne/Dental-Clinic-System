<?php
session_start();
include("include/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/staff_detail.css">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://kit.fontawesome.com/3a4d23485c.js" crossorigin="anonymous"></script>

    <title>Staff Detail</title>
</head>

<body>

    <?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (isset($_SESSION['UID']) && !empty($_SESSION['UID'])) {
        $sql = "SELECT * FROM patient WHERE id='" . $_GET['id'] . "' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            $ic = $row['ic'];
            $email = $row['email'];
            $phone = $row['mobile'];
            $gender = $row['gender'];
            $address = $row['address'];
            $firstName = $row["firstName"];
            $lastName = $row["lastName"];
            $photo = $row['photo'];
        }
    }
    ?>

    <div class="container-fluid navbar mb-5">
        <div class="col-12">
            <h1 class="text-center">Patient Detail</h1>
        </div>
    </div>


    <div class="container">
        <div class="row g-4 mb-5 justify-content-center align-items-center">
            <div class="col-lg-6 col-7 d-flex justify-content-center align-items-center mb-lg-0 mb-4">
                <?php
                if ($photo != "")
                    echo "<img src=\"uploads/" . $row['photo'] . "\" alt=\"profile picture\" class=\"img-thumbnail mb-3\">";
                else
                    echo '<img src="./image/anonymous.png" alt="profile picture" class="img-thumbnail mb-3" />';

                ?>
            </div>

            <div class="col-lg-6">
                <div class="row g-4">

                    <div class="col-sm-6">
                        First Name: <?php echo $firstName ?>
                    </div>

                    <div class="col-sm-6">
                        Last Name: <?php echo $lastName ?>
                    </div>

                    <div class="col-sm-6">
                        Gender: <?php echo ucfirst($gender) ?>
                    </div>

                    <div class="col-sm-6">
                        Email: <?php echo $email ?>
                    </div>

                    <div class="col-sm-6">
                        Phone Number: <?php echo $phone ?>
                    </div>

                    <div class="col-sm-6">
                        IC No: <?php echo $ic ?>
                    </div>

                    <div class="col-12">
                        Address: <?php echo $address ?>
                    </div>
                </div>
            </div>
        </div>


        <?php

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        if (isset($_SESSION['UID']) && !empty($_SESSION['UID'])) {
            // $sql = "SELECT * FROM medicalRecord WHERE patientID='" . $_GET['id'] . "'";

            $sql = "SELECT m.id, m.dentistID, m.date, m.time, m.problem,
            CONCAT(d.firstName, ' ', d.lastName) AS dentistName
        FROM medicalRecord m
        JOIN dentist d ON m.dentistID = d.id
        WHERE m.patientID=" . $_GET['id'];

            $result = mysqli_query($conn, $sql);
        }
        ?>

        <div class="col-12">
            <h3 class="mb-4">Medical Records</h3>
            <table class="table table-bordered mb-5">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Dentist</th>
                        <th scope="col" class="text-center">Date</th>
                        <th scope="col" class="text-center">Time</th>
                        <th scope="col" class="text-center">Problem</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $numRow = 1;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>$numRow</td>";

                            echo "<td>" . $row['dentistName'] . "</td>";
                            echo "<td>" . $row['date'] . "</td>";
                            echo "<td>" . $row['time'] . "</td>";
                            echo "<td>" . $row['problem'] . "</td>";

                            echo '<td class="text-center">';
                            echo '<a href="edit_medicalRecord.php?id=' . $row['id'] . '">Edit</a>';
                            // echo '&nbsp;&nbsp;';
                            // echo '<a href="staff_detail.php?id=' . $row['id'] . '&position=dentist">View</a>';
                            echo '&nbsp;&nbsp;';
                            echo '<a href="./include/delete_medicalRecord_action.php?id=' . $row['id'] . '" class="text-danger" onClick="return confirm(\'Delete?\');">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                            $numRow = $numRow + 1;
                        }
                    }
                    ?>
                </tbody>
            </table>

            <div class="col-12 text-center">
                <?php
                echo '<a href="edit_patient.php?id=' . $_GET['id'] . '"class="btn btn-primary mb-3">Edit Patient</a>';
                ?>
                <?php
                echo '<a href="add_medicalRecord.php?id=' . $_GET['id'] . '"class="btn btn-primary mb-3">Add Medical Record</a>';
                ?>
                <a href="./staff.php" class="btn btn-danger mb-3">Back</a>
            </div>
        </div>
    </div>


</body>

</html>