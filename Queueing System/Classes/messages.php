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
  <style type="text/css">
    h2{
      display: inline;
      margin-right: 78%;
    }
  </style>
  <title>Database</title>
</head>
<body>
<?php include 'navbar.php'; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <hr>
        <div class="table-responsive">
          <!-- First table for claimed users -->
          <h2>Messages</h2>
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
            <?php
                include ("connection.php"); //codes from connection.php

                // View query to display users table in ascending order of ID
                $view_query = mysqli_query($con, "SELECT * FROM contact ORDER BY id ASC"); // ASC means ascending order

                while ($row = mysqli_fetch_assoc($view_query)){

                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $subject = $row['subject_line'];
                    $message = $row['message'];

                ?>
                <tbody>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['subject_line']; ?></td>
                    <td><?php echo $row['message']; ?></td>
                  </tr>
                </tbody>
          </table>
            <?php } ?>
        </div>
      </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>