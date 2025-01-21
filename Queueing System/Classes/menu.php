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
    <title>MenuBar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Side Menubar -->
<div class="sidebar">
        <div class="sidebar-title">CvSU Bacoor</div>
        <ul>
            <li><a href="#"><i class="home-icon"></i>Users Details</a></li>
            <li><a href="#"><i class="admin-icon"></i>Admin Details</a></li>
            <li><a href="#"><i class="monitor-icon"></i>Queue Monitor</a></li>
        </ul>
    </div>

    <!-- Top Navbar -->
    <div class="navbar">
        <div class="navbar-title">CvSU Bacoor</div>
        <div class="search-bar">
            <input type="text" placeholder="What are you looking for?">
            <button>Search</button>
        </div>
        <div class="logout-icon">
            <a href="#"><i class="logout"></i></a>
        </div>
    </div>
</body>
</html>