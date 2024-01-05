<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/edit_schedule.css">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://kit.fontawesome.com/3a4d23485c.js" crossorigin="anonymous"></script>

    <title>Edit Schedule</title>
</head>

<body>
    <div class="container-fluid navbar mb-5">
        <div class="col-12">
            <h1 class="text-center">Edit Schedule</h1>
        </div>
    </div>

    <div class="container">

        <form action="">
            <div class="row g-4 mb-5">
                <div class="col-12 mb-3">
                    <label for="room" class="mb-2">Room Number</label>
                    <select name="room" id="room" class="form-select">
                        <option selected>Open this select menu</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </div>

                <div class="col-12">
                    <label for="nurse" class="mb-2">Nurse</label>
                    <input type="text" name="nurse" id="nurse" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="date" class="mb-2">Date</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="time" class="mb-2">Time</label>
                    <input type="time" name="time" id="time" class="form-control" required>
                </div>
            </div>

            <div class="col-12 text-center mb-5">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <div class="col-12 text-center">
            <a href="./staff_detail.html" class="btn btn-danger">Back</a>
        </div>
    </div>
</body>
</html>