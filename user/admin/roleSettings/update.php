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
    <title>Update Role</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<style>
    li {
        list-style: none;
    }
    .form-label {
        font-weight: 500;
        color: #dfdfdf;
    }
    .form-control, .form-control:focus {
        background-color: #FFFDD0;
    }

</style>
<body class="bg-dark p-5">
<div class="container w-100 h-100 p-3 d-flex justify-content-center align-items-center">
        <div class="container-fluid w-50 px-5 py-3 rounded" style="background-color: crimson;">
            <div class="mb-3 d-flex justify-content-center">
                <h3 style="color: #dfdfdf;">Update Role</h3>
            </div>
    <?php
        $id = $_GET['id'];
        $role = query("SELECT * FROM membership_role WHERE id = $id");
        if (isset($_POST['submit'])) {
            if (updateRole($_POST) > 0) {
                ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        background: '#333',
                        backdrop: 'rgba(0, 0, 0, .8)',
                        color: 'white',
                        text: 'Berhasil mengubah data.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(function() {
                        window.location.href = "../role.php";
                    }, 1450);
                </script>
                <?php
            }
        }
        $fitur = $role['fitur'];
        $fiturChecked = explode(', ', $fitur);
    ?>
            <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Role</label>
                    <input class="form-control" type="text" name="nama" id="nama" value="<?= $role['nama'] ?>" placeholder="nama role..." aria-label="default input example" required>
                </div>
                <div class="mb-3">
                    <label for="fitur" class="form-label">Fitur</label>
                    <div class="form-control">
                            <li>
                                <input type="checkbox" name="fitur[0]" value="4K Quality" <?php if(in_array("4K Quality", $fiturChecked)){?>  checked='checked' <?php }?> id="hdquality">
                                <label for="hdquality">4K Quality</label>
                            </li>
                            <li>
                                <input type="checkbox" name="fitur[1]" value="Download" <?php if(in_array("Download", $fiturChecked)){?>  checked='checked' <?php }?> id="downloadfitur">
                                <label for="downloadfitur">Download Film</label>
                            </li>
                            <li>
                                <input type="checkbox" name="fitur[2]" value="Badge" <?php if(in_array("Badge", $fiturChecked)){?>  checked='checked' <?php }?> id="badge">
                                <label for="badge">Badge Khusus</label>
                            </li>
                    </div>
                </div>
                <div class="role-container d-flex justify-content-between">
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" value="<?= $role['harga'] ?>" placeholder="harga role..." required>
                    </div>
                    <div class="mb-3">
                        <label for="role_limit" class="form-label">Limit</label>
                        <div class="form-control">
                            <input type="range" name="role_limit" class="form-range" id="role_limit" value="<?= $role['role_limit'] ?>" min="1" max="12" oninput="this.nextElementSibling.value = this.value + ' Bulan'">
                            <output for="role_limit" style="width: 4em; color:#555555"><?= $role['role_limit'] ?> Bulan</output>
                        </div>
                    </div>
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <a href="../role.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="form-button btn btn-success" name="submit">Update</button>
                </div>
        </form>
    </div>
</body>
</html>