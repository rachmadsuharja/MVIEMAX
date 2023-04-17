<?php
require "../config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVIEMAX | Membership</title>
    <link rel="stylesheet" href="assets/index.css" />
    <script src="https://kit.fontawesome.com/4eb31409a6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>

<body class="bg-dark">
        <?php
        $film = mysqli_query($con, "SELECT * FROM list_film LIMIT 3");
        ?>
        <nav class="navbar navbar-expand-lg bg-dark text-white position-fixed top-0 w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../assets/img/logo.png" width="40" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white">
                <li class="nav-item">
                <a class="nav-link active text-white-50" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    User
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item text-white" href="../membership/register.php">Membership</a></li>
                    <li><a class="dropdown-item text-white-50" href="../publisher/register.php">Publisher</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-white-50" href="../user/admin/login.php">Admin</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white-50" href="../feedback.php">Feedback</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
        <div class="gap mb-5">.</div>
        <div id="publisher" class="publisher mt-5">
            <div class="container bg-danger text-white p-3">
            <?php
                if (isset($_POST['register'])) {
                    if (memberRegister($_POST) > 0) {
                        ?>
                        <script>
                            alert('berhasil membuat akun');
                            window.open('../user/member/login.php');
                        </script>
                        <?php
                    }
                }
            ?>
            <div class="container bg-dark w-100 h-100 p-3 d-flex justify-content-center align-items-center">
                <div class="container-fluid w-50 p-3">
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <h3>Gabung Membership</h3>
                    </div>
                    <form action="" method="POST">
                    <div class="mb-2">
                        <label for="nama" class="form-label">Nama</label>
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama..." aria-label="default input example" autofocus required>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                    </div>
                    
                    <div class="mb-2 d-flex justify-content-between">
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password..." aria-label="default input example" required>
                        </div>
                        <div class="mb-2">
                            <label for="password2" class="form-label">Konfirmasi Password</label>
                            <input class="form-control" type="password" name="password2" id="password2" placeholder="Konfirmasi password..." aria-label="default input example" required>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="gender" class="form-label">Gender</label>
                        <div class="form-control">
                            <input type="radio" name="gender" value="Laki-laki" id="laki-laki">
                            <label for="laki-laki">Laki-laki</label>
                            <input type="radio" name="gender" value="Perempuan" id="perempuan">
                            <label for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" name="role" id="role" aria-label="Default select example">
                            <option value="Rookie">Rookie</option>
                            <option value="Aholic">Aholic</option>
                            <option value="Pro">Pro</option>
                        </select>
                    </div>
                    <div class="mb-2 d-flex justify-content-between">
                        <h6 class="mt-2">Sudah punya akun? <a class="btn btn-primary px-1 py-0" href="../user/member/login.php">Login</a></h6>
                        <button type="submit" name="register" id="register" class="btn btn-danger mt-2 p-1">Buat Akun</button>
                    </div>
                    </form>
                </div>
            </div>
            </div>
        </div>