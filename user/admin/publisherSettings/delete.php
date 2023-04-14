<?php
require_once "../../../config.php";
session_start();
if (!isset($_SESSION['loginAdmin'])) {
    header("Location: ../login.php");
    exit;
}
$id = $_GET["id"];
if (deletePublisher($id) > 0 ) {
    ?>
        <script>
            window.location.href = '../publisher.php';
        </script>
    <?php
} else {
    die('error');
}
