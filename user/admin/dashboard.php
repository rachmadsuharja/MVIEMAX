<?php
require_once "../../config.php";
session_start();
if (!isset($_SESSION['loginAdmin'])) {
    header("Location: login.php");
    exit;
}
$user = "SELECT username FROM administrator";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
    <script src="https://kit.fontawesome.com/4eb31409a6.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4eb31409a6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-danger">
        <div class="container-fluid">
            <div class="container d-flex align-items-center">
                <h1 class="navbar-brand text-white">Dashboard</h1>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white-50" aria-current="page" href="filmsettings.php">Film</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white-50" aria-current="page" href="role.php">Role</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white-50" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    User
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="publisher.php">Publisher</a></li>
                    <li><a class="dropdown-item" href="membership.php">Membership</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white-50" aria-current="page" href="feedback.php">Feedback</a>
                </li>
                <div class="container d-flex align-items-center justify-content-start">
                    <li class="nav-item w-100">
                        <a href="logout.php" class="btn btn-outline-dark p-1">LOGOUT</a>
                    </li>
                </div>
            </ul>
            </div>
        </div>
    </nav>
    <div class="main w-100 h-100 p-3">
        <div class="greeting">
            <h2 class="text-white">Selamat Datang<h2>
        </div>
        <div class="main-content">
            <a href="../../index.php" target="_blank" class="btn btn-danger">Lihat Website</a>
        </div>
    </div>
</body>

</html>