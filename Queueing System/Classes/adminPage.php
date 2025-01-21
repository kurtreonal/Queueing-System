<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header('Location: http://localhost/Queueing%20System/Classes/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="CvSU Form Request, CvSU File Request">
    <meta name="description" content="CVSU Request Form It’s our business to know your business.">
    <meta name="author" content="Admin Page designer (Pascua) - Group RedRivon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Assets/cvsulogo.png" type="image/x-icon">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../Styles/dashboard.css" rel="stylesheet">
</head>
<body>
    <?php include '../Classes/navbar.php'; ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" style="font-size: 4rem; font-family: &quot;Spectral&quot;, serif;font-weight: 200;font-style: normal; color: rgb(50, 40, 32);">Welcome, Admin!</h1>
        </div>
    </main>

    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-3 mb-3">
            <div class="card bg-dark text-white h-100" style="background-color: #969590 !important; ">
            <div class="card-body py-5" style="padding-top: 15px !important;!i;!;font-family: &quot;Spectral&quot;, serif;font-weight: 200;font-style: normal;color: #fff;font-size: 30px;margin-bottom: 15% !important;!i;!;">Documents for Processing</div>
                <div class="card-footer d-flex" onclick="location.href='../Classes/users_table.php';" style="cursor: pointer;">
                    <u><b>View Details</b></u>
                    <span class="ms-auto">
                    <i class="fa-solid fa-chevron-right"></i>
                    </span>
                </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
            <div class="card bg-secondary text-white h-100" style="background-color: #aea19b !important;!i;!;">
            <div class="card-body py-5" style="padding-top: 15px !important;!i;!;font-family: &quot;Spectral&quot;, serif;font-weight: 200;font-style: normal;color: #fff;font-size: 30px;margin-bottom: 15%;">Messages</div>
                <div class="card-footer d-flex" onclick="location.href='../Classes/messages.php';" style="cursor: pointer;">
                    <u><b>View Details</b></u>
                    <span class="ms-auto">
                    <i class="fa-solid fa-chevron-right"></i>
                    </span>
                </div>
                </div>
            </div>
            </div>
        <?php include '../Classes/connection.php'; ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>