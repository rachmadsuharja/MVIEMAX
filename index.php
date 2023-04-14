<?php
require "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVIEMAX</title>
    <link rel="stylesheet" href="assets/index.css" />
    <script src="https://kit.fontawesome.com/4eb31409a6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        li .dropdown-item:hover {
            color: black;
        }
    </style>
</head>

<body class="bg-dark">
        <?php
        $film = mysqli_query($con, "SELECT * FROM list_film");
        ?>
        <nav class="navbar navbar-expand-lg bg-dark text-white position-fixed top-0 w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/img/logo.png" width="40" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color:white"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white-50" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    User
                </a>
                <ul class="dropdown-menu bg-dark">
                    <li><a class="dropdown-item text-white-50" href="membership/register.php">Membership</a></li>
                    <li><a class="dropdown-item text-white-50" href="publisher/register.php">Publisher</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-white-50" href="user/admin/login.php">Admin</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white-50" href="feedback.php">Feedback</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
        <div class="main p-5 w-100 d-flex justify-content-start">
            <div class="mainpage-container d-grid">
                <div class="title-container">
                    <h1 data-aos="zoom-in" data-aos-duration="2000">MVIEMAX</h1>
                    <p id="subtitle"></p>
                </div>
                <a href="#all-list"><i class="fa-solid fa-list"></i> List Film</a>
            </div>
        </div>
        <div id="all-list">
            <?php foreach($film as $row) :?>
                <div class="card-box">
                    <img class="coverImg" src="assets/img/film_cover/<?= $row['cover'] ?>">
                    <h1><?= $row['judul']?></h1>
                </div>
            <?php endforeach;?>
        </div>
        <div class="footer mt-5 p-1 bg-danger">
            <footer class="text-white bg-danger p-1">
                <div class="bg-dark p-1 d-flex justify-content-center">
                    <p>© 2023 Copyright - HARJA</p>
                </div>
            </footer>
        </div>
    </div>
</body>
<script src="assets/main.js"></script>
<script>
    AOS.init();
    setTimeout(function() {
        new TypeIt("#subtitle", {
            strings: "Platform Streaming & Download Film Terbaik.",
            speed: 30,
            waitUntilVisible: true,
        }).go();
    }, 2000);
</script>
</html>