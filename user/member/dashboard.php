<?php
require_once "../../config.php";
session_start();
if (!isset($_SESSION['loginMember'])) {
    header("Location: login.php");
    exit;
}
$user = query("SELECT * FROM membership_user");
$fq = mysqli_query($con, "SELECT * FROM list_film");
$film = mysqli_num_rows($fq);
$popFilm = mysqli_query($con, "SELECT * FROM list_film LIMIT 3");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership | Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://kit.fontawesome.com/4eb31409a6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/dash-card.css">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-danger">
        <div class="container-fluid">
            <div class="container d-flex align-items-center">
                <h1 class="navbar-brand text-white">Membership</h1>
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
        <div class="main-content">
            <h2 class="d-flex justify-content-center text-white">Film Terpopuler</h2>
        </div>
        <hr style="border: 1.5px solid #555555">
        <div class="container">
        <div id="all-list">
            <?php foreach($popFilm as $row) :?>
                <div class="card-box">
                    <img class="coverImg" src="../../assets/img/film_cover/<?= $row['cover'] ?>">
                    <h1><?= $row['judul']?></h1>
                </div>
            <?php endforeach;?>
        </div>
        </div>
    </div>
</body>
<script src="../../config.js"></script>
</html>