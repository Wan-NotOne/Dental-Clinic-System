<?php
session_start();
include("include/config.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/edit_medicalRecord.css">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://kit.fontawesome.com/3a4d23485c.js" crossorigin="anonymous"></script>

    <title>Edit Schedule</title>
</head>

<body>

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (isset($_SESSION['UID']) && !empty($_SESSION['UID'])) {
        $sql = "SELECT * FROM medicalRecord WHERE id=" . $_GET['id'];
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
        }

        $sqlDentist = "SELECT * FROM dentist";
        $resultDentist = mysqli_query($conn, $sqlDentist);
    } else {
        header("location:./admin_staff.php");
    }


    ?>

    <div class="container-fluid navbar mb-5">
        <div class="col-12">
            <h1 class="text-center">Edit Medical Record</h1>
        </div>
    </div>

    <div class="container">

        <form action="./include/edit_medicalRecord_action.php" method="POST">
            <input type="text" id="id" name="id" value="<?= $_GET['id'] ?>" hidden>
            <div class="row g-4 mb-5">

                <div class="col-12">
                    <label for="dentistID" class="mb-2">Doctor</label>
                    <select name="dentistID" id="dentistID" class="form-select">
                        <?php
                        if (mysqli_num_rows($resultDentist) > 0) {
                            while ($rowDentist = mysqli_fetch_array($resultDentist)) {
                                $selected = ($rowDentist['id'] == $row['dentistID']) ? 'selected' : '';
                                echo "<option value=" . $rowDentist['id'] . " $selected >" . $rowDentist['id'] . " - " . $rowDentist['firstName'] . " " . $rowDentist['lastName'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="date" class="mb-2">Date</label>
                    <input type="date" name="date" id="date" class="form-control" value="<?php echo $row['date'] ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="time" class="mb-2">Time</label>
                    <input type="time" name="time" id="time" class="form-control" value="<?php echo $row['time'] ?>" required>
                </div>

                <div class="col-12">
                    <label for="problem" class="mb-2">Problem</label>
                    <input type="text" name="problem" id="problem" class="form-control" value="<?php echo $row['problem'] ?>" required>
                </div>
            </div>

            <div class="col-12 text-center mb-5">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <div class="col-12 text-center">
            <a href="./patient_detail.html" class="btn btn-danger">Back</a>
        </div>
    </div>
</body>

</html>