<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header('Location: http://localhost/Queueing%20System/Classes/login.php');
    exit();
}

include ("connection.php"); // Include the connection file

// Retrieve admin_id based on the logged-in username
$adminUsername = $_SESSION['username'];
$admin_query = mysqli_query($con, "SELECT id FROM admin WHERE username = '$adminUsername'");
$admin_row = mysqli_fetch_assoc($admin_query);
$admin_id = $admin_row['id'];

?>

<!DOCTYPE html>
<html>
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
          <h2>Requests</h2>
          <table class='table table-striped table-sm'>
            <thead>
            <tr>
                <th scope='col'>ID</th>
                <th scope='col'>Student Name</th>
                <th scope='col'>Student Number</th>
                <th scope='col'>Request</th>
                <th scope='col'>Year Attended</th>
                <th scope='col'>Course</th>
                <th scope='col'>Section</th>
                <th scope='col'>Queue no.</th>
                <th scope='col'>Status</th>
                <th scope="col">Time</th>
              </tr>
            </thead>
            <?php
                //View query to display users table
                $view_query = mysqli_query($con, "SELECT * FROM users ORDER BY id ASC"); //ASC means ascending order

                while ($row = mysqli_fetch_assoc($view_query)){

                  $id = $row['id'];
                  $studentName = $row['studentName'];
                  $studentNum = $row['studentNum'];
                  $request = $row['request'];
                  $year_attended = $row['year_attended'];
                  $course = $row['course'];
                  $section = $row['section'];
                  $time = $row['time'];
                  $status = $row['status'];

                ?>
                <tbody>
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['studentName']; ?></td>
                    <td><?php echo $row['studentNum']; ?></td>
                    <td><?php echo $row['request']; ?></td>
                    <td><?php echo $row['year_attended']; ?></td>
                    <td><?php echo $row['course']; ?></td>
                    <td><?php echo $row['section']; ?></td>
                    <td><?php echo "000"; echo $row['id']; ?></td>
                    <td>
                      <?php
                        if ($row['status'] == 1) {
                          echo "<p><span><a href='status.php?id=".$row['id']."&status=2' style='background-color: #FFFF8F; padding-left: 7px; padding-right: 7px; border-radius: 5px; color: #E49B0F; text-decoration: none;'>Processing</a></span></p>";
                        } else if ($row['status'] == 2) {
                          echo"<p><span><a href='status.php?id=".$row['id']."&status=3' style='background-color: #FF7B00; padding-left: 7px; padding-right: 7px; border-radius: 5px; color: #E49B0F; text-decoration: none;'>On Release</a></span></p>";
                        } else if ($row['status'] == 3) {
                          echo "<p><span><a href='status.php?id=".$row['id']."&status=claimed' style='background-color: #bee5b0; padding-left: 7px; padding-right: 7px; border-radius: 5px; color: #006400; text-decoration: none;'>Claim</a></span></p>";

                          //Insert data into the second table (claimed_users) when the status is changed to "Claim"
                          $insert_claim_query = "INSERT INTO claimed_users (studentName, studentNum, request, year_attended, course, section, time, status, admin_id)
                                                VALUES ('$studentName', '$studentNum', '$request', '$year_attended', '$course', '$section', '$time', 'Claim', '$admin_id')";
                          mysqli_query($con, $insert_claim_query);

                          //Delete the claimed data from the users table
                          $delete_query = "DELETE FROM users WHERE id = '$id'";
                          mysqli_query($con, $delete_query);
                      }
                      ?>
                    </td>
                    <td><?php echo $row['time']; ?></td>
                    <td><?php } ?></td>
                  </tr>
                </tbody>
          </table>

          <!-- Second table for claimed users -->
          <h2>Claimed Requests</h2>
          <table class='table table-striped table-sm'>
            <thead>
            <tr>
                <th scope='col'>ID</th>
                <th scope='col'>Student Name</th>
                <th scope='col'>Student Number</th>
                <th scope='col'>Request</th>
                <th scope='col'>Year Attended</th>
                <th scope='col'>Course</th>
                <th scope='col'>Section</th>
                <th scope='col'>Queue no.</th>
                <th scope='col'>Status</th>
                <th scope="col">Time</th>
                <th scope="col">Admin</th>
              </tr>
            </thead>
            <?php
              //Query to display claimed requests and the admin username
              $claimed_query = mysqli_query($con, "SELECT claimed_users.*, admin.username
              FROM claimed_users LEFT JOIN admin ON claimed_users.admin_id = admin.id
              ORDER BY claimed_users.id ASC");

              while ($claimed_row = mysqli_fetch_assoc($claimed_query)) {

            ?>
            <!--Display the data-->
            <tbody>
              <tr>
                <td><?php echo $claimed_row['id']; ?></td>
                <td><?php echo $claimed_row['studentName']; ?></td>
                <td><?php echo $claimed_row['studentNum']; ?></td>
                <td><?php echo $claimed_row['request']; ?></td>
                <td><?php echo $claimed_row['year_attended']; ?></td>
                <td><?php echo $claimed_row['course']; ?></td>
                <td><?php echo $claimed_row['section']; ?></td>
                <td><?php echo "000"; echo $claimed_row['id']; ?></td>
                <td><span style="background-color: #bee5b0; padding-left: 7px; padding-right: 7px; border-radius: 5px; color: #006400; text-decoration: none;">Claimed</span></td>
                <td><?php echo $claimed_row['time']; ?></td>
                <td><?php echo $claimed_row['username']; ?></td>
              </tr>
            </tbody>
            <?php } ?> <!---DONT REMOVE VERY IMPORTANT-->
          </table>
        </div>
      </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
