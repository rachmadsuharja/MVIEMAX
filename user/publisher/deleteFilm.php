<?php
require "../../config.php";
$id = $_GET["id"];
session_start();
if (!isset($_SESSION['loginPublisher'])) {
    header("Location: login.php");
    exit;
}
if (delete($id) > 0 ) {
    ?>
            <script>
                window.location.href = 'film.php';
            </script>
        <?php
} else {
    die('error');
}
