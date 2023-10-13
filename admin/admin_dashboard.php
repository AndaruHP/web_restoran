<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 0) {
    header('location: ../loginAndRegister/login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">

        <a href="../logout/logout.php" class="btn btn-warning">Logout</a>
        <a href="admin_insert.php" class="btn btn-dark">Tambah Menu</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Menu</th>
                    <th>Gambar Menu</th>
                    <th>Deskripsi Menu</th>
                    <th>Harga Menu</th>
                    <th>Kategori Menu</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../database/connect.php');
                $sql = "SELECT * FROM data_makanan";
                $result = mysqli_query($conn, $sql); ?>
                <?php
                foreach ($result as $row) :
                ?>
                    <tr>
                        <td><?= $row['nama_menu'] ?></td>
                        <td>
                            <img src="uploads/<?= $row['gambar_menu'] ?>" width="200">
                        </td>
                        <td><?= $row['deskripsi_menu'] ?></td>
                        <td><?= $row['harga_menu'] ?></td>
                        <td><?= $row['kategori_menu'] ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>



        <?php
        $sql_show_category = "SELECT DISTINCT kategori_menu FROM data_makanan";
        $result_show_category = mysqli_query($conn, $sql_show_category);
        echo 'semua kategori: <br>';
        while ($row_category = mysqli_fetch_assoc($result_show_category)) {
            echo $row_category['kategori_menu'] . '<br>';
        }
        ?>
    </div>
</body>

</html>