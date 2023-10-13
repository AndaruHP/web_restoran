<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 0) {
    header('location: ../loginAndRegister/login.php');
    exit;
}
require_once('../database/connect.php');

if (isset($_POST['insert_button'])) {
    $nama_menu = $_POST['nama_menu'];
    $foto_menu = $_FILES['foto_menu']['name'];
    $deskripsi_menu = $_POST['deskripsi_menu'];
    $harga_menu = $_POST['harga_menu'];
    $kategori_menu = $_POST['kategori_menu'];
    $uploads_dir = 'uploads/';

    // Check if a file was uploaded
    if ($_FILES['foto_menu']['error'] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($_FILES['foto_menu']['tmp_name'], $uploads_dir . $foto_menu)) {
            $sql = "INSERT INTO data_makanan (nama_menu, gambar_menu, deskripsi_menu, harga_menu, kategori_menu) VALUES ('$nama_menu', '$foto_menu', '$deskripsi_menu', '$harga_menu', '$kategori_menu')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header('location: admin_dashboard.php');
            } else {
                echo 'Error: ' . mysqli_error($conn);
            }
        } else {
            echo 'Error moving the uploaded file';
        }
    } else {
        echo 'File upload error: ' . $_FILES['foto_menu']['error'];
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama_menu">Nama Menu:</label>
                <input type="text" name="nama_menu">
            </li>
            <li>
                <label for="gambar_menu">Gambar Menu:</label>
                <input type="file" name="foto_menu">
            </li>
            <li>
                <label for="deskripsi_menu">Deskripsi Menu:</label>
                <input type="text" name="deskripsi_menu">
            </li>
            <li>
                <label for="harga_menu">Harga Menu:</label>
                <input type="number" name="harga_menu">
            </li>
            <li>
                <label for="kategori_menu">Kategori Menu:</label>
                <input type="text" name="kategori_menu">
            </li>
            <li>
                <button type="submit" name="insert_button">Insert Data</button>
            </li>
        </ul>
    </form>
</body>

</html>