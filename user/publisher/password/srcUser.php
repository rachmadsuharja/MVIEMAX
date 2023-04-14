<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Membership | Cari Akun</title>
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
    <!-- Custom styles for this template -->
    <link href="../../../assets/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <main class="form-signin w-100 m-auto">
            <?php
            require_once "../../../config.php";
            if(!isset($username['username'])) {
                $username = '';
            }
            if (isset($_POST['gantiPW'])) {
                $username = $_POST['username'];
                $result = mysqli_query($con, "SELECT username FROM film_publisher WHERE `username` = '$username'");
                if (mysqli_num_rows($result) > 0) {
                    $user = mysqli_fetch_assoc($result);
                    $username = $user['username'];
                    $password = mysqli_real_escape_string($con, $_POST["password"]);
                    $password2 = mysqli_real_escape_string($con, $_POST["password2"]);
                    if ($password !== $password2) {
                        ?>
                        <script>
                            alert('Password tidak sama');
                        </script>
                        <?php
                        return false;
                    }
                    
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $query = "UPDATE `film_publisher` SET 
                        `password` = '$password' WHERE `username` = '$username'";
                    if (mysqli_query($con, $query)) {
                            if (mysqli_affected_rows($con) > 0) {
                                header("Location:destroy.php");
                            } else {
                                echo mysqli_error($con);
                            }
                        } else {
                            echo mysqli_error($con);
                    }
                } else {
                    ?>
                    <script>
                        alert('User tidak terdaftar!');
                    </script>
                    <?php
                }
            }
            ?>
        <form action="" method="POST">
            <h1 class="h3 mb-3 fw-normal">Ganti Password</h1>
            <div class="form-floating mb-2">
                <input type="text" class="form-control" name="username" id="userName" placeholder="Username" autofocus required>
                <label for="userName">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                <label for="password">Password Baru</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password2" id="password" placeholder="Password" required>
                <label for="password">Konfirmasi Password Baru</label>
            </div>
            <button class="w-100 btn btn-lg btn-danger" name="gantiPW" id="submit" type="submit">Ganti</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
        </form>
    </main>
</body>

</html>