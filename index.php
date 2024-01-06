<?php
    session_start();
    include('include/config.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/review.css">
    <link rel="stylesheet" href="style/style.css">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://kit.fontawesome.com/3a4d23485c.js" crossorigin="anonymous"></script>

    <title>Home</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">
    <!-- Navbar -->
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        if(isset($_SESSION['UID'])) {
            // User is logged in, display logged-in navigation bar
            include 'include/navbar_user.php';

        } else {
            // User is not logged in, display logged-out navigation bar
            include 'include/navbar_logout.php';
        }

    ?>
    

    <!-- hero -->
    <div class="hero">

        <div class="container-fluid h-100 hero-title ">
            <div class="col-lg-6 h-100 d-flex flex-column align-items-center justify-content-center text-center">
                <h1>Make Your Dental Appointment</h1>
                <p>
                    Our mission is to create healthy, beautiful smiles that inspire confidence and joy.
                </p>
            </div>
        </div>

    <!-- booking -->
        <section id="booking">
            <h1 class="text-center">Our Services</h1>
            <h6 class="text-center">See our special services for you at a glace</h6>
        <div class="container">
            <div class="row g-4">

                <div>
                    <div class="card">
                        <div class="booking_con">
                        <div class="card-logo text-center">
                            <i class="fa-solid fa-tooth"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">Book Appointment</h5>
                            <p class="card-text text-center">Book Appointment From Your Nearest Dental Clinic right now
                            </p>
                            <div class="text-center">
                            <a class="btn btn-primary" href="appointment.php">Book Appointment &rarr;</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </section>

        <section id="review">
            <h1 class="text-center">What our patients say about us</h1>
            <h6 class="text-center">Our dedicated team is committed to providing personalized care</h6>
        <div class="container">
            <?php
              $sql = "SELECT review_id, first_name, last_name, rating, comments, date FROM review";
              $result = $conn->query($sql);
              $counter = 0;
              
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      echo 
                    '<div class="mb-4">
                        <div class="card">
                            <div class = "booking_con">';
                            echo '<div class="mt-4">
                                </div>';

                                  echo'<div class="card-body">
                                      <div class="text-end mb-2">';
                      for ($i = 1; $i <= $row['rating']; $i++) {
                          echo '<i class="fa-solid fa-star"></i>';
                      }
                      echo '</div>
                              <p class="review-text">' . $row['comments'] . '</p>
                            </div>
                          <div class="card-footer">
                              <div class="col-12 d-flex align-items-center">
                                  <div></div>
                                  <div>
                                      <p class="mb-0 name">' . $row['first_name'] . ' ' . $row['last_name'] . '</p>
                                      <p class="mb-0 patient">Patient</p>
                                      <p class="mb-0 date">' . $row['date'] . '</p>
                                  </div>
                            </div>
                          </div>
                          </div>';
            
                        echo '</div>
                        </div>';

                        // Increment the counter
                        $counter++;

                        // Break out of the loop after displaying the first two entries
                        if ($counter >= 2) {
                            break;
                        }
                  }
              } else {
                  echo "0 results";
              }
            
              ?>
            <a class="btn btn-primary" href="add_review.php">Add Review</a>
            <a class="btn btn-primary" href="reviews.php">See all Reviews</a>
        </div>
              
        </section>
</body>

</html>
