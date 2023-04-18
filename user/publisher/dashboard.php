<?php
require_once "../../config.php";
session_start();

if (!isset($_SESSION['loginPublisher'])) {
    header("Location: login.php");
    exit;
}
$user = query("SELECT * FROM film_publisher");
$pq = mysqli_query($con, "SELECT * FROM film_publisher");
$pub = mysqli_num_rows($pq);
$fq = mysqli_query($con, "SELECT * FROM list_film");
$film = mysqli_num_rows($fq);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publisher | Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://kit.fontawesome.com/4eb31409a6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/dash-card.css">
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
                <a class="nav-link text-white-50" aria-current="page" href="film.php">Film</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white-50" aria-current="page" href="#">Settings</a>
                </li>
                <div class="container d-flex align-items-center justify-content-start">
                    <li class="nav-item w-100">
                        <button class="btn btn-outline-dark p-1" onclick="logout()">LOGOUT</button>
                    </li>
                </div>
            </ul>
            </div>
        </div>
    </nav>
    <div class="main w-100 h-100 p-3">
        <div class="greeting">
            <h2 class="text-white">Selamat Datang</span><h2>
        </div>
        <hr style="border: 1.5px solid #555555">
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-green order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Publisher</h6>
                                <hr>
                                <div class="container d-flex justify-content-between align-items-center">
                                    <h1><?= $pub ?></h1>
                                    <i class="fa-solid fa-user-group"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-yellow order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Film</h6>
                                <hr>
                                <div class="container d-flex justify-content-between align-items-center">
                                    <h1><?= $film ?></h1>
                                    <i class="fa-solid fa-film"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr style="border: 1.5px solid #555555">
        <div class="container">
            <a href="../../index.php" target="_blank" class="btn btn-danger">Halaman Utama</a>
        </div>
    </div>
</body>
<script src="../../config.js"></script>
</html>
<!-- 
                    <div class="col-md-4 col-xl-4">
                        <div class="card bg-c-green order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Data Anda</h6>
                                <hr>
                                <div class="container d-flex justify-content-between align-items-center">
                                    <div class="container d-grid p-0 m-0">
                                        <div class="grid-container">
                                            <div class="grid fw-semibold">Nama</div>
                                            <div class="grid fw-semibold">Telp</div>
                                            <div class="grid fw-semibold">Alamat</div>
                                        </div>
                                    </div>
                                    <div class="container d-grid p-0 m-0">
                                        <div class="grid-container">
                                            <div class="grid"><?= $film ?></div>
                                            <div class="grid"><?= $film ?></div>
                                            <div class="grid"><?= $film ?></div>
                                        </div>
                                    </div>
                                    <i class="fa-solid fa-user-group"></i>
                                </div>
                            </div>
                        </div>
                    </div> -->