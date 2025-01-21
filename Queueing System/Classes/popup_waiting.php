<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POP UP</title>
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

    <?php
    echo "<link rel='stylesheet' type='text/css' href='../Styles/waiting.css'>";
    include ("./connection.php"); //codes from connection.php

    $view_query = mysqli_query($con, "SELECT * FROM users ORDER BY id DESC LIMIT 1");

    while ($row = mysqli_fetch_assoc($view_query)){

        $user_id = $row['id'];
        $studentName = $row['studentName']; // Make sure this matches the echo statement
        $studentNum = $row['studentNum'];
        $request = $row['request'];
        $year_attended = $row['year_attended'];
        $course = $row['course'];
        $section = $row['section'];
        $time = $row['time'];
        $status = $row['status'];

        echo "<br><section class= 'myreq'>";
        echo "<h2>Welcome $studentName! You requested for $request.</h2>";

        if ($request == 'COR'){
            echo "<h2>Please proceed to Counter 1 if your number is called.</h2>";
        } else if ($request == 'SF10'){
            echo "<h2>Please proceed to Counter 2 if your number is called.</h2>";
        } else if ($request == 'Goodmoral'){
            echo "<h2>Please proceed to Counter 3 if your number is called.</h2>";
        } else if ($request == 'Trecord'){
            echo "<h2>Please proceed to Counter 4 if your number is called.</h2>";
        } else if ($request == 'Diploma'){
            echo "<h2>Please proceed to Counter 5 if your number is called.</h2>";
        }

        echo "<h3>You have requested on $time</h3>";
        echo "<h4>Your queue number is: 0000$user_id</h4>";
    }
    ?>
<div>
</div>
<div class="container">
    </br><button id="redirect" class="button" onclick="location.href = 'request.php';">Okay</button>
</div>
</body>
</html>