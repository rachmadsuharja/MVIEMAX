<?php
session_start();
require_once "../../config.php";

if (isset($_POST['loginMember'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($con, "SELECT * FROM membership_user WHERE email = '$email'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['loginMember'] = true;
            header("Location:dashboard.php");
            exit;
        }
    }
    $error = true;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Login Membership</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        
        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }
        
        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }
        
        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }
        
        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }
        
        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
</head>

<body class="p-5" style="background-color: #333333;">
<div class="container mt-5 d-flex justify-content-center align-items-center" style="background-color: crimson; border-radius:1em; box-shadow: 0px 4px 10px black">
    <div class="container-fluid mt-5 d-flex justify-content-evenly">
        <main class="form-signin w-50">
            <form action="" method="POST">
                <h1 class="h3 mb-3" style="color: #dfdfdf;">Login Membership</h1>
                <?php if (isset($error)) :?>
                    <div class="alert alert-danger" role="alert">
                        username/password salah!
                    </div>
                <?php endif;?>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" style="background-color: #FFFDD0; color:#291F1E" name="email" id="email" placeholder="Email" autofocus required>
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" style="background-color: #FFFDD0; color:#291F1E" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <button class="w-100 mb-3 btn btn-lg text-dark" name="loginMember" id="submit" type="submit" style="background-color:#FFAC42">Login</button>
                <a class="d-flex justify-content-center mb-3 p-1 w-25 btn btn-secondary" href="password/srcEmail.php">Lupa Password?</a>
                <div class="container mt-3 mb-5 p-0">
                <p class="text-white">Belum punya akun? <a class="mt-2 mb-2 p-1 btn btn-secondary" href="../../membership/register.php">buat akun</a></p>
                </div>
            </form>
        </main>
        <div class="img">
            <img class="mb-4" src="../../assets/img/logo.png" data-aos="zoom-in" data-aos-duration="1000" width="300" height="300">
        </div>
    </div>
</div>
</body>
<script>
    AOS.init();
</script>
</html>