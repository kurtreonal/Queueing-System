<?php

$host = "localhost";
$user = "root";
$pass = "";
$quesys_db = "quesys_db";

$con = mysqli_connect($host, $user, $pass, $quesys_db);

if(mysqli_connect_errno()){
        echo "Failed to connect to the server: MYSQL".mysqli_connect_error();
}

//for button name=save
if (isset($_POST['save'])){
        $studentName = $_POST['studentName'];
        $studentNum = $_POST['studentNum'];
        $request = $_POST['request'];
        $year_attended = $_POST['year_attended'];
        $status = $_POST['status'];
        $course = $_POST['course'];
        $section = $_POST['section'];
        $query = mysqli_query($con, "INSERT INTO users (studentName, studentNum, request, year_attended, status, course, section) VALUES ('$studentName', '$studentNum', '$request', '$year_attended', '$status', '$course', '$section')");

        echo "<script language= 'javascript'>alert('Proceeding to Wait list'); </script>";
        echo "<script>window.location.href='popup_waiting.php'; </script>"; //gives an alert
}

//for name=savecontact for contact form
if (isset($_POST['savecontact'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $query = mysqli_query($con, "INSERT INTO contact (name, email, phone, subject_line, message)
        VALUES ('$name', '$email', '$phone', '$subject', '$message')");

        echo "<script language='javascript'>alert('Message Sent!');</script>";
        echo "<script>window.location.href='landingpage.php';</script>";
    }
    ?>