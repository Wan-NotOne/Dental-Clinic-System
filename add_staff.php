<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/edit_staff.css">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://kit.fontawesome.com/3a4d23485c.js" crossorigin="anonymous"></script>

    <title>Add Staff</title>
</head>

<body>

    <div class="container-fluid navbar mb-5">
        <div class="col-12">
            <h1 class="text-center">Add New Staff</h1>
        </div>
    </div>


    <div class="container">
        <form action="./include/add_staff_action.php" method="POST" enctype="multipart/form-data">
            <div class="row g-4 mb-5 justify-content-center">
                <div class="col-lg-6 col-7 d-flex justify-content-center align-items-center mb-lg-0 mb-4">
                    <div>

                        <!-- <div class="image">

                        </div> -->
                        <img src="./image/anonymous.png" alt="profile picture" class="img-thumbnail">
                        <!-- <img src="./image/anonymous.png" alt="" class="img-thumbnail"> -->
                        <div class="text-center">
                            <small class="my-2 d-inline-block">Max size: 488.28KB</small><br>
                            <input type="file" name="fileToUpload" id="fileToUpload" accept=".jpg, .jpeg, .png" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row g-4">

                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <label for="firstName" class="me-3">First&nbsp;Name</label>
                            <input type="text" name="firstName" id="firstName" class="form-control w-100" required>
                        </div>

                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <label for="lastName" class="me-3">Last&nbsp;Name</label>
                            <input type="text" name="lastName" id="lastName" class="form-control" required>
                        </div>

                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <label for="ic" class="me-3">IC&nbsp;No</label>
                            <input type="text" name="ic" id="ic" class="form-control" required>
                        </div>


                        <div class="col-sm-6 d-flex align-items-center">
                            <label for="gender" class="me-3">Gender</label>
                            <select name="gender" id="gender" class="form-select" required>
                                <option selected>Open this select menu</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="col-sm-6 d-flex align-items-center">
                            <label for="position" class="me-3">Position</label>
                            <select name="position" id="position" class="form-select" required>
                                <option selected>Open this select menu</option>
                                <option value="dentist">Dentist</option>
                                <option value="nurse">Nurse</option>
                            </select>
                        </div>


                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <label for="email" class="me-3">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <label for="phone" class="me-3">Phone&nbsp;Number</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>

                        <div class="col-12">
                            <label for="address" class="mb-3">Address</label>
                            <input type="text" name="address" id="address" class="form-control" required>
                        </div>

                        <div class="col-sm-6 d-flex align-items-center">
                            <label for="isAdmin" class="me-3">Admin</label>
                            <select name="isAdmin" id="isAdmin" class="form-select">
                                <option selected>Open this select menu</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="password" class="mb-1">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="col-12">
                            <label for="confirmPassword" class="mb-1">Confirm Password</label>
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 text-center mb-5">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <div class="col-12 text-center">
            <a href="./admin.php" class="btn btn-danger">Back</a>
        </div>
    </div>
</body>

</html>