<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Feedback</title>
    <script src="https://kit.fontawesome.com/4eb31409a6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg bg-danger">
        <div class="container-fluid">
            <div class="container d-flex align-items-center">
                <h1 class="navbar-brand text-white">User Feedback</h1>
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
                <a class="nav-link text-white-50" aria-current="page" href="filmsettings.php">Film</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white-50" aria-current="page" href="role.php">Role</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white-50" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    User
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="publisher.php">Publisher</a></li>
                    <li><a class="dropdown-item" href="membership.php">Membership</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="feedback.php">Feedback</a>
                </li>
                <div class="container d-flex align-items-center justify-content-start">
                    <li class="nav-item w-100">
                        <button class="btn btn-outline-dark p-1" onclick="logout()">LOGOUT</button>
                    </li>
                </div>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container">
    <?php
        require_once "../../config.php";
        $feedback = mysqli_query($con, "SELECT * FROM feedback");
        session_start();
        if (!isset($_SESSION['loginAdmin'])) {
            header("Location: login.php");
            exit;
        }
    ?>
        <div class="tbHead w-100 d-flex justify-content-around align-items-center">
            <div class="input-group mb-3 mt-3 w-25">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-secondary text-white" id="inputGroup-sizing-default">Cari</span>
                </div>
                <input type="text" id="searchInput" onkeyup="searchFeedback()" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            </div>
            <p class="fw-bold text-white bg-primary p-1 mt-2 rounded">Jumlah : <?= mysqli_num_rows($feedback) ?></p>
        </div>
        <table id="feedbackList" class="table table-dark" style="color: #dddd;">
            <thead>
                <th class="bg-secondary text-white" width="190" scope="col">Feedback Settings</th>
                <th class="bg-secondary text-white" scope="col">Nama</th>
                <th class="bg-secondary text-white" scope="col">Email</th>
                <th class="bg-secondary text-white w-50" scope="col">Feedback</th>
            </thead>
            <?php foreach ($feedback as $row) : ?>
            <tr>
                <th>
                    <a class="btn btn-outline-primary p-1" href="feedbackSettings/update.php?id=<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-outline-danger p-1" href="feedbackSettings/delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin?')">Hapus</a>
                </th>
                <td><?= $row['nama']?></td>
                <td><?= $row['email']?></td>
                <td><?= $row['feedback']?></td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</body>
<script src="../../config.js"></script>
<script>
    function searchFeedback() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("feedbackList");
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