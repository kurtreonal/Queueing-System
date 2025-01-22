<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="keywords" content="CvSU Form Request, CvSU File Request">
    <meta name="description" content="CVSU Request Form It’s our business to know your business.">
    <meta name="author" content="navigation designer (Pascua) - Group RedRivon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Assets/cvsulogo.png" type="image/x-icon">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  	<script src="https://kit.fontawesome.com/4aa19b73e3.js" crossorigin="anonymous"></script>
  	<link href="../Styles/dashboard.css" rel="stylesheet">
</head>
<body>
<?php include '../Classes/connection.php'; ?>
 	<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color: #96968e;">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="adminPage.php" style="color: black;">CvSU Bacoor</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="container-fluid" action="./search.php" method="GET">
      <div class="input-group">
        <input class="form-control form-control-dark w-75" type="text" placeholder="WHAT ARE YOU LOOKING FOR?" aria-label="Search" name="search" required style="background-color: #c4c3bf !important;!i;!;">
        <input type="submit" name="submit" value="Search" class="btn btn-outline-dark text-white"/>
      </div>
    </form>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="logout.php" onclick="return confirm('Are you sure you would like to Sign out?')">
          <img src="../Assets/icon-logout40.png" alt="broken icon img">
        </a>
      </div>
    </div>
    </header>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-5">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="../Classes/adminPage.php">
                <span><i class="fa-solid fa-house-user fa-xl" style="margin-right: 20%;"></i></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="users_table.php">
                <span><i class="fa-solid fa-users fa-xl" style="margin-right: 20%;"></i></span>
                Data
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="messages.php">
                <span><i class="fa-solid fa-layer-group fa-xl" style="margin-right: 20%;"></i></span>
                Messages
              </a>
            </li>
          </ul>
        </div>
      </nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>