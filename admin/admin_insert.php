<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 0) {
    header('location: ../user/user_dashboard.php');
    exit;
}

require_once('../database/connect.php');

$errorAlert = false;
$error_message = "";

if (isset($_POST['insert_button'])) {
    $nama_menu = $_POST['nama_menu'];
    $foto_menu = $_FILES['foto_menu']['name'];
    $deskripsi_menu = $_POST['deskripsi_menu'];
    $harga_menu = $_POST['harga_menu'];
    $kategori_menu = $_POST['kategori_menu'];
    $uploads_dir = 'uploads/';


    if (empty($nama_menu) || empty($foto_menu) || empty($deskripsi_menu) || empty($harga_menu) || empty($kategori_menu)) {
        $errorAlert = true;
        $error_message = "Semua data harus diisi";
    } else {
        move_uploaded_file($_FILES['foto_menu']['tmp_name'], $uploads_dir . $foto_menu);

        $sql = "INSERT INTO data_makanan (nama_menu, gambar_menu, deskripsi_menu, harga_menu, kategori_menu) VALUES ('$nama_menu', '$foto_menu', '$deskripsi_menu', '$harga_menu', '$kategori_menu')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('location: admin_dashboard.php');
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}

// notes
// Apa yang belum?
// 1. Input foto diubah menjadi nama unik, sehingga jika ada foto yang sama, tidak akan terjadi error atau overwrite
// 2. Batasan ukuran foto
// 3. Batasan tipe file foto
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3 col-4">
        <h3>Tambah Data</h3>
        <?php
        if ($errorAlert) :
        ?>
            <div class="alert alert-danger">
                <?= $error_message ?>
            </div>
        <?php
        endif;
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_menu">Nama Menu:</label>
                <input type="text" class="form-control" name="nama_menu">
            </div>
            <div class="form-group">
                <label for="foto_menu">Gambar Menu:</label>
                <input type="file" class="form-control" name="foto_menu">
            </div>
            <div class="form-group">
                <label for="deskripsi_menu">Deskripsi Menu:</label>
                <textarea class="form-control" name="deskripsi_menu" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="harga_menu">Harga Menu:</label>
                <input type="number" class="form-control" name="harga_menu">
            </div>
            <div class="form-group">
                <label for="kategori_menu">Kategori Menu:</label>
                <input type="text" class="form-control" name="kategori_menu">
            </div>
            <button type="submit" class="btn btn-primary mt-2" name="insert_button">Insert Data</button>
        </form>
        <a href="admin_dashboard.php" class="btn btn-secondary">Cancel</a>
    </div>
</body>

</html>