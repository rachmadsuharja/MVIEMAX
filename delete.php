<?php
require "config.php";
$id = $_GET["id"];

if (delete($id) > 0 ) {
    ?>
            <script>
                window.location.href = 'filmsettings.php';
            </script>
        <?php
} else {
    die('error');
}
