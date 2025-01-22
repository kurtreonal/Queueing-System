<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header('Location: http://localhost/Queueing%20System/Classes/login.php');
    exit();
}

// Include database connection
include("connection.php");

// Insert data handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // SQL query to insert the data
    $query = "INSERT INTO contact (name, email, phone, subject_line, message)
              VALUES ('$name', '$email', '$phone', '$subject', '$message')";

    // Execute the query
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        echo "<script>alert('Error inserting data: " . mysqli_error($con) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="CvSU Form Request, CvSU File Request">
    <meta name="description" content="CVSU Request Form It’s our business to know your business.">
    <meta name="author" content="Messages Page designer (Pascua) - Group RedRivon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Assets/cvsulogo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4aa19b73e3.js" crossorigin="anonymous"></script>
    <link href="dashboard.css" rel="stylesheet">
    <title>Database</title>
    <style type="text/css">
        h2 {
            margin-bottom: 20px;  /* Space below h2 */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto; /* Adjust height */
            flex-direction: column; /* Center content vertically */
        }

        .form-container {
            width: 80%;
            max-width: 600px;
            margin-bottom: 30px;
        }

        .table-container {
            width: 100%;
            max-width: 1000px;
            margin-top: 20px; /* Adds space between the h2 and the table */
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <hr>
    <h2>Messages</h2>

    <!-- Table for displaying data -->
    <div class="table-container">
        <table class='table table-striped table-sm'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Student Name</th>
                    <th scope='col'>Email</th>
                    <th scope='col'>Phone Number</th>
                    <th scope='col'>Subject</th>
                    <th scope='col'>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query to fetch all messages from the database
                $view_query = mysqli_query($con, "SELECT * FROM contact ORDER BY id ASC");

                // Display all records
                while ($row = mysqli_fetch_assoc($view_query)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['subject_line']}</td>
                            <td>{$row['message']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
