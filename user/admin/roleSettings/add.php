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
    <title>Tambah Role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<style>
    ul li {
        list-style: none;
    }
</style>
<body>
<div class="container">
    <a href="../role.php" class="btn btn-success p-1 m-2">Kembali</a>
</div>
<div class="container w-100 h-100 p-3 d-flex justify-content-center align-items-center">
        <div class="container-fluid w-50 p-3">
            <div class="mb-3 d-flex justify-content-center">
                <h3>Tambah Role</h3>
            </div>
        <?php
            if (isset($_POST['submit'])) {
                if (addRole($_POST) > 0) {
                    ?>
                    <script>
                        alert('berhasil');
                        window.location.href = "../role.php";
                    </script>
                    <?php
                } else {
                    die('gagal menambahkan film');
                }
            }
        ?>
        
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Role</label>
                    <input class="form-control" type="text" name="nama" id="nama" placeholder="nama role..." aria-label="default input example" required>
                </div>
                <div class="mb-3">
                    <label for="fitur" class="form-label">Fitur</label>
                    <div class="form-control">
                        <ul>
                            <li>
                                <input type="checkbox" name="fitur[0]" value="4K Quality" id="hdquality">
                                <label for="hdquality">4K Quality</label>
                            </li>
                            <li>
                                <input type="checkbox" name="fitur[1]" value="Download" id="downloadfitur">
                                <label for="downloadfitur">Download Film</label>
                            </li>
                            <li>
                                <input type="checkbox" name="fitur[2]" value="Badge" id="badge">
                                <label for="badge">Badge Khusus</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" placeholder="harga role..." required>
                </div>
                <div class="mb-3">
                    <label for="role_limit" class="form-label">Limit</label>
                    <input type="range" name="role_limit" class="form-range" id="role_limit" required min="1" max="12" oninput="this.nextElementSibling.value = this.value">
                    <output></output>
                </div>
                <div class="mb-3">
                    <button type="submit" class="form-button btn btn-danger" name="submit">Buat</button>
                </div>
            </form>
    </div>
</body>
</html>