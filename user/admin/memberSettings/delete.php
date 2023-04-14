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
            window.location.href = '../membership.php';
        </script>
    <?php
} else {
    die('error');
}
