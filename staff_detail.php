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
        if ($_GET['position'] == 'dentist') {
            $sql = "SELECT * FROM dentist WHERE id='" . $_GET['id'] . "' LIMIT 1";
        } else {
            $sql = "SELECT * FROM nurse WHERE id='" . $_GET['id'] . "' LIMIT 1";
        }

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            $position = $_GET['position'];
            $ic = $row['ic'];
            $email = $row['email'];
            $phone = $row['mobile'];
            $gender = $row['gender'];
            $address = $row['address'];
            $firstName = $row["firstName"];
            $lastName = $row["lastName"];
            $photo = $row['photo'];
            $isAdmin = $row['isAdmin'];
        }
    }
    ?>

    <div class="container-fluid navbar mb-5">
        <div class="col-12">
            <h1 class="text-center">Staff Detail</h1>
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
                        Position: <?php echo ucfirst($position) ?>
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

                    <div class="col-sm-6">
                        Admin: <?php
                                if ($isAdmin) {
                                    echo "Yes";
                                } else {
                                    echo "No";
                                }
                                ?>
                    </div>

                    <div class="col-12">
                        Address: <?php echo $address ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <h3 class="mb-4">Schedule</h3>
            <table class="table table-bordered mb-5">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Room Number</th>
                        <th scope="col" class="text-center">Nurse</th>
                        <th scope="col" class="text-center">Date</th>
                        <th scope="col" class="text-center">Time</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Room 1</td>
                        <td>Nurse 2</td>
                        <td>Decmber 30,2023 </td>
                        <td>10:00 AM</td>
                        <td class="text-center">
                            <a href="./edit_schedule.html">Edit</a>
                            &nbsp;&nbsp;
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Room 2</td>
                        <td>Nurse 2</td>
                        <td>Decmber 30,2023 </td>
                        <td>10:00 AM</td>
                        <td class="text-center">
                            <a href="#">Edit</a>
                            &nbsp;&nbsp;
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Room 3</td>
                        <td>Nurse 3</td>
                        <td>Decmber 30,2023 </td>
                        <td>10:00 AM</td>
                        <td class="text-center">
                            <a href="#">Edit</a>
                            &nbsp;&nbsp;
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Room 4</td>
                        <td>Nurse 4</td>
                        <td>Decmber 30,2023 </td>
                        <td>10:00 AM</td>
                        <td class="text-center">
                            <a href="#">Edit</a>
                            &nbsp;&nbsp;
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Room 5</td>
                        <td>Nurse 5</td>
                        <td>Decmber 30,2023 </td>
                        <td>10:00 AM</td>
                        <td class="text-center">
                            <a href="#">Edit</a>
                            &nbsp;&nbsp;
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Room 6</td>
                        <td>Nurse 6</td>
                        <td>Decmber 30,2023 </td>
                        <td>10:00 AM</td>
                        <td class="text-center">
                            <a href="#">Edit</a>
                            &nbsp;&nbsp;
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="col-12 text-center">
                <?php
                echo '<a href="edit_staff.php?id=' . $row['id'] . '&position=' . $position . '" class="btn btn-primary mb-3">Edit Staff</a>';
                ?>
                <a href="./admin.php" class="btn btn-danger mb-3">Back</a>
            </div>
        </div>
    </div>


</body>

</html>