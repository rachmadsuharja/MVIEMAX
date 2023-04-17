<?php
require "../../../config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Membership</title>
    <script src="https://kit.fontawesome.com/4eb31409a6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
        .form-label {
            font-weight: 500;
            color: #dfdfdf;
        }
        .form-control, .form-control:focus, .form-select {
            background-color: #FFFDD0;
        }
    </style>
</head>
<body class="bg-dark pt-5">
    <div class="container">
    <?php
        if (isset($_POST['register'])) {
            if (memberRegister($_POST) > 0) {
                ?>
                <script>
                    alert('berhasil');
                    window.location.href = "../membership.php";
                </script>
                <?php
            } else {
                mysqli_error($con);
            }
        }
    ?>
    <div class="container w-100 h-100 p-3 d-flex justify-content-center align-items-center">
        <div class="container-fluid w-50 px-5 py-3 bg-danger rounded">
            <div class="mb-3 d-flex justify-content-center">
                <h3 style="color: #dfdfdf;">Tambah Membership</h3>
            </div>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama..." aria-label="default input example" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                    </div>
                    <div class="pass-container d-flex justify-content-between">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password..." aria-label="default input example" required>
                        </div>
                        <div class="mb-3">
                            <label for="password2" class="form-label">Konfirmasi Password</label>
                            <input class="form-control" type="password" name="password2" id="password2" placeholder="Konfirmasi password..." aria-label="default input example" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <div class="form-control">
                            <input type="radio" name="gender" value="Laki-laki" id="laki-laki">
                            <label for="laki-laki">Laki-laki</label>
                            <input type="radio" name="gender" value="Perempuan" id="perempuan">
                            <label for="perempuan">Perempuan</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" name="role" id="role" aria-label="Default select example">
                            <option value="Rookie">Rookie</option>
                            <option value="Aholic">Aholic</option>
                            <option value="Pro">Pro</option>
                        </select>
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <a href="../membership.php" class="btn btn-secondary">Kembali</a>
                        <button type="submit" name="register" id="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>