<?php
    include('include/config.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM review WHERE id = $id";
    $result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/review.css">

  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <script src="https://kit.fontawesome.com/3a4d23485c.js" crossorigin="anonymous"></script>

  <title>Edit Review</title>
</head>
<body>

  <div class="container-fluid navbar mb-5">
    <div class="col-12">
        <h1 class="text-center">Edit Review</h1>
    </div>
  </div>

<div class="container">
    <form method="POST" action="include/edit_review_action.php" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="row g-4 mb-5">

            <div class="col-lg-6">
                <div class="row g-4">

                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <label for="first_name" class="me-3">First&nbsp;Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control w-100" required>
                    </div>

                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <label for="last_name" class="me-3">Last&nbsp;Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" required>
                    </div>


            <!-- Star Rating -->
          <div class="form-group">
              <label for="rating">Rating</label>
              <select class="form-control" id="rating" name="rating" required>
                  <option value="1">1 Star</option>
                  <option value="2">2 Stars</option>
                  <option value="3">3 Stars</option>
                  <option value="4">4 Stars</option>
                  <option value="5">5 Stars</option>
              </select>
          </div>

          <!-- Comments/Feedback -->
          <div class="form-group">
              <label for="comments">Comments</label>
              <textarea class="form-control" id="comments" name="comments" rows="5" placeholder="Enter your comments" required></textarea>
          </div>

          <div class="form-group">
              <label for="date">Date</label>
              <input type="date" class="form-control" id="date" name="date" placeholder="Date" required>
          </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 text-center mb-5">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <div class="col-12 text-center">
        <a href="reviews.php" class="btn btn-danger">Back</a>
    </div>
</div>

</body>
</html>

<?php
$conn->close();
?>