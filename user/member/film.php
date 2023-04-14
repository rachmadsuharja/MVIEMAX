<?php
session_start();
if (!isset($_SESSION['loginMember'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership | Film</title>
    <script src="https://kit.fontawesome.com/4eb31409a6.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4eb31409a6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-danger">
        <div class="container-fluid">
            <div class="container d-flex align-items-center">
                <h1 class="navbar-brand text-white">Dashboard</h1>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link text-white-50" aria-current="page" href="dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="film.php">Film</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white-50" aria-current="page" href="#">Settings</a>
                </li>
                <div class="container d-flex align-items-center justify-content-start">
                    <li class="nav-item w-100">
                        <a href="logout.php" class="btn btn-outline-dark p-1">LOGOUT</a>
                    </li>
                </div>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php
        require_once "../../config.php";
        $film = mysqli_query($con, "SELECT * FROM list_film");
        ?>
        <div class="input-group mb-3 mt-3 w-25">
            <div class="input-group-prepend">
                <span class="input-group-text bg-secondary text-white" id="inputGroup-sizing-default">Cari</span>
            </div>
            <input type="text" id="searchInput" onkeyup="searchFilm()" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>
        <table id="filmList" class="table table-dark mt-3" style="color: #dddd;">
            <thead>
                <th class="bg-secondary text-white" scope="col">Judul</th>
                <th class="bg-secondary text-white" scope="col">Tanggal Rilis</th>
                <th class="bg-secondary text-white" scope="col">Genre</th>
                <th class="bg-secondary text-white" scope="col">Cover</th>
                <th class="bg-secondary text-white" scope="col">Deskripsi</th>
            </thead>
                    <?php foreach($film as $row): ?>
                        <tr>
                            <td><?= $row['judul'] ?></td>
                            <td><?= date('d/m/Y', strtotime($row['tgl_rilis'])) ?></td>
                            <td><?= $row['genre'] ?></td>
                            <td><?= "<img src='../../assets/img/film_cover/$row[cover]' style='width:7em;height:10em;'>" ?></td> 
                            <td style="width:20em"><?= $row['film_desc'] ?></td> 
                        </tr>
                    <?php endforeach;?>
        </table>
    </div>
</body>
<script>
    function searchFilm() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("filmList");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
    }
</script>
</html>