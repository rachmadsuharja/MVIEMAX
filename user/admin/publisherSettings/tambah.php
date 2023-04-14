<?php
require "../../../config.php";
session_start();
if (!isset($_SESSION['loginAdmin'])) {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Publisher</title>
    <script src="https://kit.fontawesome.com/4eb31409a6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <?php
        if (isset($_POST['submit'])) {
            if (publisherRegister($_POST) > 0) {
                ?>
                <script>
                    alert('berhasil');
                    window.location.href = "../publisher.php";
                </script>
                <?php
            } else {
                mysqli_error($con);
            }
        }
    ?>
    <div class="container w-100 h-100 p-3 d-flex justify-content-center align-items-center">
        <div class="container-fluid w-50 p-3">
            <div class="mb-3 d-flex justify-content-center">
                <h3>Tambah Publisher</h3>
            </div>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control" type="text" name="username" id="username" placeholder="Username..." aria-label="default input example" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password..." aria-label="default input example" required>
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Konfirmasi Password</label>
                        <input class="form-control" type="password" name="password2" id="password2" placeholder="Konfirmasi Password..." aria-label="default input example" required>
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">No. Telpon</label>
                        <input class="form-control" type="number" name="telp" id="telp" placeholder="Telpon..." aria-label="default input example" required>
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Alamat..." id="alamat" name="alamat" style="height: 100px; resize:none;" required></textarea>
                            <label for="alamat">Alamat</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" id="submit" class="btn btn-danger">Buat Akun</button>
                    </div>
                </form>
        </div>
    </div>
</div>
</body>
</html>