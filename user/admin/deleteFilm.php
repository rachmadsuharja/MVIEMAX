<?php
require "../../config.php";
$id = $_GET["id"];
session_start();
if (!isset($_SESSION['loginAdmin'])) {
    header("Location: login.php");
    exit;
}
if (delete($id) > 0 ) {
    ?>
            <script>
                window.location.href = 'filmsettings.php';
            </script>
        <?php
} else {
    die('error');
}
