<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <style>
        * {
            font-family: sans-serif;
        }
        body {
            background-color: black;
        }
    </style>
</head>
<body>
<?php
require_once "../../../config.php";
session_start();
if (!isset($_SESSION['loginAdmin'])) {
    header("Location: ../login.php");
    exit;
}
$id = $_GET["id"];
if (deleteMember($id) > 0 ) {
    ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                background: '#333',
                backdrop: 'rgba(0, 0, 0, .8)',
                color: 'white',
                text: 'Berhasil menghapus data',
                showConfirmButton: false,
                timer: 1500
            });
            setTimeout(function() {
                window.location.href = "../membership.php";
            }, 1450);
        </script>
    <?php
} else {
        mysqli_error($con);
}
?>
</body>
</html>
