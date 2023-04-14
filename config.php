<?php
$con = mysqli_connect("localhost","root","","pkld1_crud");

if (mysqli_connect_errno()) {
    die('koneksi gagal : ' + mysqli_connect_error());
}

function query($query) {
    global $con;
    $result = mysqli_query($con, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows = $row;
    }
    return $rows;
}

function upload() {
    $namaFile = $_FILES['imgCover']['name'];
    $ukuranFile = $_FILES['imgCover']['size'];
    $error = $_FILES['imgCover']['error'];
    $tmpName = $_FILES['imgCover']['tmp_name'];

    if ($error === 4) {
        ?>
        <script>
            alert('Pilih gambar terlebih dahulu!');
        </script>
        <?php
        return false;
    }

    $ekstensiGambarValid = ['jpg','jpeg','png','webp'];
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        ?>
        <script>
            alert('Gambar tidak Valid');
        </script>
        <?php
        return false;
    }
    if ($ukuranFile > 10000000) {
        ?>
        <script>
            alert('Ukuran gambar terlalu besar \n Minimum 10MB');
        </script>
        <?php
        return false;
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .=  '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../../assets/img/film_cover/' . $namaFileBaru);
    return $namaFileBaru;
}

function add($data) {
    global $con;
    $namaFilm = htmlspecialchars($data["judul"]);
    $tglRilis = date('d F Y', strtotime($data["tanggal"]));
    $genre = implode(', ', $data['genre']);
    $imgCover = upload();
    if (!$imgCover) {
        return false;
    }
    $desk = htmlspecialchars($data['deskripsi']);
    
    $result = mysqli_query($con, "SELECT judul FROM list_film WHERE judul = '$namaFilm'");
    if (mysqli_fetch_assoc($result)) {
        ?>
        <script>
            alert('Film sudah terdaftar!');
        </script>
        <?php
        return false;
    }

    $query = "INSERT INTO list_film VALUES ('', '$namaFilm', '$tglRilis', '$genre', '$imgCover', '$desk')";
    mysqli_query($con, $query);
    if (mysqli_affected_rows($con) < 0) {
        echo mysqli_error($con);
    }
    return mysqli_affected_rows($con);
}

function delete($id) {
    global $con;
    $id = $_GET['id'];
    $q = mysqli_query($con, "SELECT * FROM list_film WHERE id='$id'");
    $data = mysqli_fetch_assoc($q);
    $img = $data['cover'];
    if (file_exists("../../assets/img/film_cover/$img")) {
        unlink("../../assets/img/film_cover/$img");
    }
    mysqli_query($con, "DELETE FROM list_film WHERE id= $id");
    return mysqli_affected_rows($con);
}

function update($data) {
    global $con;
    $id = $data['id'];
    $namaFilm = htmlspecialchars($data["judul"]);
    $tglRilis = date('d F Y', strtotime($data["tanggal"]));
    $genre = implode(", ", $data['genre']);
    $prevCover = $data['prevCover'];
    $desk = htmlspecialchars($data['deskripsi']);
    
    if ($_FILES['imgCover']['error'] === 4) {
        $imgCover = $prevCover;
    } else {
        $imgCover = upload();
        $q = mysqli_query($con, "SELECT cover FROM list_film WHERE id = $id");
        $img = mysqli_fetch_assoc($q);
        $pImg = $img['cover'];
        if (file_exists("../../assets/img/film_cover/$pImg")) {
            unlink("../../assets/img/film_cover/$pImg");
        }
    }

    $query = "UPDATE `list_film` SET 
        `judul`='$namaFilm',
        `tgl_rilis`='$tglRilis',
        `genre` ='$genre',
        `cover` = '$imgCover',
        `film_desc`='$desk' WHERE `id` = $id";
    if (mysqli_query($con, $query)) {
        return true;
    }
    else {
        return false;
    }
}


function memberRegister($data) {
    global $con;
    $nama = htmlspecialchars($data['nama']);
    $gender = $data['gender'];
    $email = strtolower($data['email']);
    $password = mysqli_real_escape_string($con, $data["password"]);
    $password2 = mysqli_real_escape_string($con, $data["password2"]);
    $role = $data['role'];

    $result = mysqli_query($con, "SELECT email FROM membership_user WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        ?>
        <script>
            alert('Email sudah terdaftar!');
        </script>
        <?php
        return false;
    }

    if ($password !== $password2) {
        ?>
        <script>
            alert('Password tidak sama');
        </script>
        <?php
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($con, "INSERT INTO membership_user VALUES('', '$nama', '$gender', '$email', '$password', '$role')");
    return mysqli_affected_rows($con);

}

function deleteMember($id) {
    global $con;
    mysqli_query($con, "DELETE FROM membership_user WHERE id= $id");
    return mysqli_affected_rows($con);

}
function updateMember($data) {
    global $con;
    $id = $data['id'];
    $nama = htmlspecialchars($data["nama"]);
    $gender = htmlspecialchars($data['gender']);
    $email = htmlspecialchars($data["email"]);
    $role = $data['role'];

    $query = "UPDATE `membership_user` SET 
        `nama` = '$nama',
        `gender` = '$gender',
        `email`='$email',
        `role` = '$role' WHERE `id` = $id";
    if (mysqli_query($con, $query)) {
        return true;
    }
    else {
        return false;
    }
}

function addRole($data) {
    global $con;
    $nama = htmlspecialchars($data["nama"]);
    $fitur = implode(", ", $data['fitur']);
    $harga = htmlspecialchars($data['harga']);
    $limit = $data['role_limit'];
    $query = "INSERT INTO membership_role VALUES ('', '$nama', '$fitur', '$harga', '$limit')";
    mysqli_query($con, $query);
    if (mysqli_affected_rows($con) < 0) {
        echo mysqli_error($con);
    }
    return mysqli_affected_rows($con);
}
function deleteRole($id) {
    global $con;
    mysqli_query($con, "DELETE FROM membership_role WHERE id= $id");
    return mysqli_affected_rows($con);

}
function updateRole($data) {
    global $con;
    $id = $data['id'];
    $nama = htmlspecialchars($data["nama"]);
    $fitur = implode(", ", $data['fitur']);
    $harga = htmlspecialchars($data['harga']);
    $limit = $data['role_limit'];
    $query = "UPDATE `membership_role` SET 
        `nama`='$nama',
        `fitur`='$fitur',
        `harga` ='$harga',
        `role_limit` = '$limit' WHERE `id` = $id";
    if (mysqli_query($con, $query)) {
        return true;
    }
    else {
        return false;
    }
}

function publisherRegister($data) {
    global $con;
    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($con, $data["password"]);
    $password2 = mysqli_real_escape_string($con, $data["password2"]);
    $telp = $data['telp'];
    $alamat = htmlspecialchars($data['alamat']);

    $result = mysqli_query($con, "SELECT username FROM film_publisher WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        ?>
        <script>
            alert('Username sudah terdaftar!');
        </script>
        <?php
        return false;
    }
    $result = mysqli_query($con, "SELECT telp FROM film_publisher WHERE telp = '$telp'");
    if (mysqli_fetch_assoc($result)) {
        ?>
        <script>
            alert('Nomor telpon sudah terdaftar!');
        </script>
        <?php
        return false;
    }

    if ($password !== $password2) {
        ?>
        <script>
            alert('Password tidak sama');
        </script>
        <?php
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $q = "INSERT INTO film_publisher VALUES ('','$username','$password','$telp','$alamat')";
    mysqli_query($con, $q);
    return mysqli_affected_rows($con);

}
function deletePublisher($id) {
    global $con;
    mysqli_query($con, "DELETE FROM film_publisher WHERE id= $id");
    return mysqli_affected_rows($con);

}
function updatePublisher($data) {
    global $con;
    $id = $data['id'];
    $username = htmlspecialchars($data["username"]);
    $telp = htmlspecialchars( $data['telp']);
    $alamat = htmlspecialchars($data['alamat']);
    $query = "UPDATE `film_publisher` SET 
        `username`='$username',
        `telp` = '$telp',
        `alamat` = '$alamat' WHERE `id` = $id";
    if (mysqli_query($con, $query)) {
        return true;
    }
    else {
        return false;
    }
}

function addFeedback($data) {
    global $con;
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $feedback = htmlspecialchars($data['feedback']);
    $result = mysqli_query($con, "SELECT nama FROM feedback WHERE nama = '$nama'");
    if (mysqli_fetch_assoc($result)) {
        ?>
        <script>
            alert('Anda sudah memberi ulasan!');
        </script>
        <?php
        return false;
    }
    $result = mysqli_query($con, "SELECT email FROM feedback WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        ?>
        <script>
            alert('Email ini sudah memberi ulasan!');
        </script>
        <?php
        return false;
    }

    $query = "INSERT INTO feedback VALUES ('', '$nama', '$email','$feedback')";
    mysqli_query($con, $query);
    if (mysqli_affected_rows($con) < 0) {
        echo mysqli_error($con);
    }
    return mysqli_affected_rows($con);
}
function deleteFeedback($id) {
    global $con;
    mysqli_query($con, "DELETE FROM feedback WHERE id= $id");
    return mysqli_affected_rows($con);

}
function updateFeedback($data) {
    global $con;
    $id = $data['id'];
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $feedback = htmlspecialchars($data['feedback']);

    $query = "UPDATE `feedback` SET 
        `nama` = '$nama',
        `email` = '$email',
        `feedback` = '$feedback' WHERE `id` = $id";
    if (mysqli_query($con, $query)) {
        return true;
    }
    else {
        return false;
    }
}
