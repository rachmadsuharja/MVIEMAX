<?php
require_once "../../../config.php";
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
    <title>Update Membership</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
        .form-label {
            font-weight: 500;
            color: #dfdfdf;
        }
        .form-control, .form-select, .form-control:focus {
            background-color: #FFFDD0;
        }
    </style>
</head>
<body class="bg-dark pt-5">
    <div class="container">
    <?php
        $id = $_GET['id'];
        $member = query("SELECT * FROM membership_user WHERE id = $id");
        if (isset($_POST['submit'])) {
            if (updateMember($_POST) > 0) {
                ?>
                <script>
                    alert('berhasil');
                    window.location.href = "../membership.php";
                </script>
                <?php
            } else {
                die('gagal : ' . mysqli_error($con));
            }
        }
    ?>
    <div class="container w-100 h-100 p-3 d-flex justify-content-center align-items-center">
        <div class="container-fluid w-50 px-5 py-3 bg-danger rounded">
            <div class="mb-3 d-flex justify-content-center">
                <h3 style="color: #dfdfdf;">Update Membership</h3>
            </div>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input class="form-control" type="text" name="nama" value="<?= $member['nama'] ?>" id="nama" placeholder="Nama..." aria-label="default input example" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?= $member['email'] ?>" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <div class="form-control">
                    <input type="radio" name="gender" value="Laki-laki"  <?= $member['gender'] == 'Laki-laki' ? 'checked' : '' ?> id="laki-laki">
                    <label for="laki-laki">Laki-laki</label>
                    <input type="radio" name="gender" value="Perempuan"  <?= $member['gender'] == 'Perempuan' ? 'checked' : '' ?> id="perempuan">
                    <label for="perempuan">Perempuan</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <?php $role = $member['role'] ?>
                <select class="form-select" name="role" id="role" aria-label="Default select example">
                    <option <?= ($role == 'Rookie') ? "selected" : ""?>>Rookie</option>
                    <option <?= ($role == 'Aholic') ? "selected" : ""?>>Aholic</option>
                    <option <?= ($role == 'Pro') ? "selected" : ""?>>Pro</option>
                </select>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <a href="../membership.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" name="submit" id="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</body>
</html>