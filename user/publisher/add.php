<?php
require_once "../../config.php";
session_start();
if (!isset($_SESSION['loginPublisher'])) {
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
    <title>Publisher | Tambah Film</title>
    <script src="https://kit.fontawesome.com/4eb31409a6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
        .checkbox-container {
            display: grid;
            grid-template-columns: auto auto auto auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_POST['submit'])) {
            if (add($_POST) > 0) {
                ?>
                <script>
                    alert('berhasil');
                    window.location.href = "film.php";
                </script>
                <?php
            }
        }
        ?>
        <div class="container">
            <a href="film.php" class="btn btn-success m-1">Kembali</a>
        </div>
        <div class="container w-100 h-100 p-3 d-flex justify-content-center align-items-center">
        <div class="container-fluid w-50 p-3">
            <div class="mb-3 d-flex justify-content-center">
                <h3>Tambah Film</h3>
            </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input class="form-control" type="text" name="judul" id="judul" placeholder="Judul..." aria-label="default input example" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Rilis</label>
                        <input class="form-control" type="date" name="tanggal" id="tanggal" aria-label="default input example" required>
                    </div>
                    <div class="mb-3">
                        <label for="genre">Genre</label>
                        <div class="checkbox-container">
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[0]" value="Action" id="action">
                                    <label for="action">Action</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[1]" value="Adventure" id="adventure">
                                    <label for="adventure">Adventure</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[2]" value="Fantasy" id="fantasy">
                                    <label for="fantasy">Fantasy</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[3]" value="Sci-Fi" id="scifi">
                                    <label for="scifi">Sci-Fi</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[4]" value="Comedy" id="comedy">
                                    <label for="comedy">Comedy</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[5]" value="Romance" id="romance">
                                    <label for="romance">Romance</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[6]" value="Drama" id="drama">
                                    <label for="drama">Drama</label>
                                </div>
                                <div class="checkbox-grid">
                                    <input type="checkbox" name="genre[7]" value="Horror" id="horror">
                                    <label for="horror">Horror</label>
                                </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="imgCover" class="form-label">Cover</label>
                        <input class="form-control" name="imgCover" type="file" id="imgCover" required>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Deskripsi..." id="filmDesc" name="deskripsi" style="height: 100px; resize:none;" required></textarea>
                        <label for="filmDesc">Deskripsi</label>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-danger mt-3" type="submit" name="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    let clearBtn = document.querySelector(".clear-btn");
    clearBtn.addEventListener("click", () => {
        document.querySelector("addMovies").reset();
    })
</script>
</html>