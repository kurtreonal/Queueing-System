
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/4aa19b73e3.js" crossorigin="anonymous"></script>
  <link href="style.css" rel="stylesheet">
  <style type="text/css">
    h2{
      display: inline;
      margin-right: 78%;
    }
  </style>
  <title>Users Data</title>
</head>
<body>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <span><h2>Queue Data</h2>
    <hr>

        <div class="table-responsive" >

          <table class='table table-striped table-sm'>

            <thead>
              <tr>
                <th scope='col'>#</th>
                <th scope='col'>Student Name</th>
                <th scope='col'>Student Number</th>
                <th scope='col'>Request</th>
                <th scope='col'>Year Attended</th>
                <th scope='col'>Course</th>
                <th scope='col'>Section </th>
                <th scope='col'>Queue no.</th>
                <th scope='col'>Status</th>
                <th scope="col">Time</th>
                <th scope="col">Admin</th>
                <th colspan='2'>Options</th>
              </tr>
            </thead>
            <?php
              include ("connection.php"); //codes from connection.php

              //view query
              //CReadUD

              $view_query = mysqli_query($con, "SELECT * FROM users ORDER BY id DESC"); //holds query string

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
                    if ($row['status']==0){
                      echo "<p><span><a href='status.php?id=".$row['id']."&status=1' style='background-color: #d1001f; padding-left: 7px; padding-right: 7px; border-radius: 5px; color: #006400; text-decoration: none;'>Error</a></span></p>";
                    }else if ($row['status']==1){
                      echo "<p><span><a href='status.php?id=".$row['id']."&status=2' style='background-color: #FFFF8F; padding-left: 7px; padding-right: 7px; border-radius: 5px; color: #E49B0F; text-decoration: none;'>Processing</a></span></p>";
                    }else if ($row['status']==2) {
                      echo"<p><span><a href='status.php?id=".$row['id']."&status=3' style='background-color: #FF7B00; padding-left: 7px; padding-right: 7px; border-radius: 5px; color: #E49B0F; text-decoration: none;'>On Release</a></span></p>";
                    }else if ($row['status']==3){
                      echo "<p><span><a href='status.php?id=".$row['id']."&status=0' style='background-color: #bee5b0; padding-left: 7px; padding-right: 7px; border-radius: 5px; color: #006400; text-decoration: none;'>Claim</a></span></p>";
                    }
                  ?>
                </td>
                <td>
                  <?php echo $row['time']; ?>
                </td>
                <td>
                 <?php //admin side toh wala pakasi kupal?>
                </td>
                <td>
                  <?php
                    echo "<a class='btn btn-outline-dark btn-sm'>Update</a>
                    <a class='btn btn-outline-dark btn-sm'>Delete</a>"; }
                  ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>