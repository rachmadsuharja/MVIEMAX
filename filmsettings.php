<?php
require_once "config.php";
$film = mysqli_query($con, "SELECT * FROM list_film");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Settings</title>
    <link rel="stylesheet" href="assets/filmsettings.css">
    <script src="https://kit.fontawesome.com/4eb31409a6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <h1>Film Settings</h1>
            <a href="user/admin/dashboard.php"><i class="fa-solid fa-home"></i></a>
        </header>
        <div class="main">
            <div class="btn-bar">
                <a href="add.php">Tambah Film</a>
                <input type="search" name="search" id="search" placeholder="search film..." autofocus>
            </div>
            <div class="list-content">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th>Film Settings</th>
                        <th>Judul</th>
                        <th>Tanggal Rilis</th>
                        <th>Genre</th>
                        <th>Cover</th>
                        <th>Deskripsi</th>
                    </tr>
                    <?php foreach($film as $row): ?>
                        <tr>
                            <td>
                                <div class="editBtn">
                                    <a href="update.php?id=<?= $row['id'] ?>"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin?')"><i class="fa-solid fa-trash"></i>Hapus</a>
                                </div>
                            </td>
                            <td><?= $row['judul'] ?></td>
                            <td><?= $row['tgl_rilis'] ?></td>
                            <td><?= $row['genre'] ?></td>
                            <td><?= "<img src='assets/img/film_cover/$row[cover]' style='width:7em;height:10em;'>" ?></td> 
                            <td style="width:20em"><?= $row['film_desc'] ?></td> 
                        </tr>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>