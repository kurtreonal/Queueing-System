<?php
session_start();
include("connection.php");

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header('Location: http://localhost/Queueing%20System/Classes/login.php');
    exit();
}

// Retrieve admin_id based on the logged-in username
$adminUsername = $_SESSION['username'];
$admin_query = mysqli_query($con, "SELECT id FROM admin WHERE username = '$adminUsername'");
$admin_row = mysqli_fetch_assoc($admin_query);
$admin_id = $admin_row['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="CvSU Form Request, CvSU File Request">
  <meta name="description" content="CVSU Request Form It’s our business to know your business.">
  <meta name="author" content="Landing Page designer (Pascua) - Group RedRivon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../Assets/cvsulogo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4aa19b73e3.js" crossorigin="anonymous"></script>
    <link href="dashboard.css" rel="stylesheet">
    <title>Terminal</title>
    <style type="text/css">
        h2 {
            margin-bottom: 15px;
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .row {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .col-md-6 {
            text-align: center;
        }
    </style>
</head>
<body>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-left: 8% !important;">
    <div class="container">
        <!-- First section for documents currently in queue -->
        <div class="row">
            <div class="col-md-6">
                <h2>Documents for Processing</h2>
                <table class='table table-striped table-sm'>
                    <thead>
                        <tr>
                            <th scope='col'>Queue No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query to get all users from the 'users' table (queued for processing)
                        $queue_query = mysqli_query($con, "SELECT * FROM users ORDER BY id ASC");

                        while ($queue_row = mysqli_fetch_assoc($queue_query)) {
                            $id = $queue_row['id']; // Queue No. (also User ID)
                            echo "<tr><td>$id</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Second section for processed documents -->
            <div class="col-md-6">
                <h2>Processed Documents</h2>
                <table class='table table-striped table-sm'>
                    <thead>
                        <tr>
                            <th scope='col'>Queue No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query to get all claimed users from the 'claimed_users' table
                        $claimed_query = mysqli_query($con, "SELECT * FROM claimed_users ORDER BY id ASC");

                        while ($claimed_row = mysqli_fetch_assoc($claimed_query)) {
                            $id = $claimed_row['id']; // Queue No.
                            echo "<tr><td>$id</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
