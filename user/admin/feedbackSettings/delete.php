<?php
require_once "../../../config.php";
session_start();
if (!isset($_SESSION['loginAdmin'])) {
    header("Location: ../login.php");
    exit;
}
$id = $_GET["id"];
if (deleteFeedback($id) > 0 ) {
    ?>
        <script>
            window.location.href = '../feedback.php';
        </script>
    <?php
} else {
    die('error');
}
