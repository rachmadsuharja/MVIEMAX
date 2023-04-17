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
    <title>Update Feedback</title>
    <script src="https://kit.fontawesome.com/4eb31409a6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
        .form-label {
            font-weight: 500;
            color: #dfdfdf;
        }
        .form-control, .form-control:focus {
            background-color: #FFFDD0;
        }
        .form-floating>.form-control-plaintext~label::after, .form-floating>.form-control:focus~label::after, .form-floating>.form-control:not(:placeholder-shown)~label::after, .form-floating>.form-select~label::after {
            position: absolute;
            inset: 1rem 0.375rem;
            z-index: -1;
            height: 1.5em;
            content: "";
            background-color: #FFFDD0;
            border-radius: var(--bs-border-radius);
        }
    </style>
</head>
<body class="bg-dark mt-5">
    <div class="container">
    <?php
        $id = $_GET['id'];
        $feedback = query("SELECT * FROM feedback WHERE id = $id");
        if (isset($_POST['submit'])) {
            if (updateFeedback($_POST) > 0) {
                ?>
                <script>
                    alert('berhasil');
                    window.location.href = "../feedback.php";
                </script>
                <?php
            } else {
                die('gagal menambahkan film');
            }
        }
    ?>
    <div class="container w-100 h-100 p-3 d-flex justify-content-center align-items-center">
        <div class="container-fluid w-50 px-5 py-3 bg-danger rounded">
            <div class="mb-3 d-flex justify-content-center">
                <h3 style="color: #dfdfdf;">Update Feedback</h3>
            </div>
        <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input class="form-control" type="text" name="nama" value="<?= $feedback['nama'] ?>" id="nama" placeholder="Nama..." aria-label="default input example" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $feedback['email']?>" id="email" placeholder="name@name.com" required>
            </div>
            <div class="mb-3">
            <div class="form-floating mt-4">
                <textarea class="form-control" placeholder="Feedback" id="feedback" name="feedback" style="height: 100px" required><?= $feedback['feedback'] ?></textarea>
                <label for="floatingTextarea2">Feedback</label>
            </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <a href="../feedback.php" class="btn btn-secondary">Kembali</a>
                <button type="submit" name="submit" id="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</body>
</html>