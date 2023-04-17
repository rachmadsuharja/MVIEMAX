<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "Berhasil Logout",
            width: "25em",
            showConfirmButton: false
        });
        setTimeout( () => {
            window.location.assign('index.php');
        }, 2000);
    </script>
</body>
</html>