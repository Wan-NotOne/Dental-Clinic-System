<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/user_sign_up.css">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://kit.fontawesome.com/3a4d23485c.js" crossorigin="anonymous"></script>

    <title>User Sign Up</title>

</head>

<body>

    <main>
        <div class="container content justify-content-center d-flex vh-100 align-items-center">
            <div class="col-10 login-box p-5">

                <h1 class="text-center mb-5">Sign Up</h1>


                <form action="./include/user_signup_action.php" method="POST" class="h-100 d-flex align-items-center">
                    <div class="col-12">
                        <div class="row g-4 mb-5">

                            <div class="col-md-6">
                                <label for="firstName" class="mb-1">First Name</label>
                                <input type="text" id="firstName" name="firstName" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="lastName" class="mb-1">Last Name</label>
                                <input type="lastName" name="lastName" id="lastName" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="gender" class="mb-1">Gender</label>
                                <select name="gender" id="gender" class="form-select" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="mb-1">Phone Number</label>
                                <input type="text" name="phone" id="phone" placeholder="xxx-xxxxxxxxxx"
                                    class="form-control" required>
                            </div>


                            <div class="col-12">
                                <label for="ic" class="mb-1">IC No</label>
                                <input type="text" name="ic" id="ic" placeholder="" class="form-control" required>
                            </div>

                            <div class="col-12">
                                <label for="email" class="mb-1">Email</label>
                                <input type="email" name="email" id="email" placeholder="example@gmail.com"
                                    class="form-control" required>
                            </div>

                            <div class="col-12">
                                <label for="address" class="mb-1">Address</label>
                                <input type="text" name="address" id="address" class="form-control" required>
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

                        <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                    </div>
                </form>
                <p class="text-center mt-4">Already have an account? <a href="user_login.php">Sign In</a></p>
            </div>
        </div>
    </main>

</body>

</html>