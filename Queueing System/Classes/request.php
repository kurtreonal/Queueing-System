<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Styles/request.css">
    <link rel="stylesheet" href="../Styles/landingpage.css">
    <title>Request Form</title>
</head>
<body>
<header class="nav">
    <a href="./landingpage.php"><img class="nav-logo" src="../Assets/cvsulogo.png" alt="Tohsaka Cute Photo" height="45px" width="35%"></a>
        <div class="CVSU"> Cavite State University
        </div>
        <nav class="navigation" style="margin-top: 45px;">
                <a href="./landingpage.php">Home</a>
                <a href="./request.php">Request</a>
                <a href="#">About us</a>
                <a href="../Classes/contact.php">Contact</a>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-body">
            <form action="connection.php" method="POST">
                <h2>Request Form</h2>
                <div class="row">
                    <div class="col-md-6">
                        <label>Name</label>
                        <input type="text" name="studentName" class="form-control" required />

                        <label>Student Number</label>
                        <input type="number" name="studentNum" class="form-control" required />

                        <label>Year Attended</label>
                        <input type="tel" name="year_attended" class="form-control" required />
                    </div>
                    <div class="col-md-6">
                        <label>Course</label>
                        <input type="text" name="course" class="form-control" required />

                        <label>Section</label>
                        <input type="tel" name="section" class="form-control" required />

                        <label>Request</label>
                        <select name="request" class="form-control" required>
                            <option value="">What do you need?</option>
                            <option value="COR">COR — Counter 1</option>
                            <option value="SF10">SF10 — Counter 1</option>
                            <option value="Goodmoral">Good Moral — Counter 1</option>
                            <option value="Trecord">Transcript Record — Counter 2</option>
                            <option value="Diploma">Diploma — Counter 2</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" id="status" name="status" value="1">
                <input type="submit" name="save" class="button btn-primary mt-3">
            </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>
