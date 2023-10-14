<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 0) {
    header('location: ../loginAndRegister/login.php');
    exit;
}

include '../database/connect.php';
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
        <h3 class="mt-3">Semua Menu</h3>
        <table class="table table-striped">
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
                $sql = "SELECT * FROM data_makanan";
                $result = mysqli_query($conn, $sql);
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
        // untuk memperlihatkan kategori menu dan menu itemnya
        $sql_show_category = "SELECT DISTINCT kategori_menu FROM data_makanan ORDER BY kategori_menu ASC";
        $result_show_category = mysqli_query($conn, $sql_show_category);

        $menuItemsByCategory = [];

        while ($category = mysqli_fetch_assoc($result_show_category)) {
            $categoryName = $category['kategori_menu'];
            $sql_show_category_item = "SELECT nama_menu FROM data_makanan WHERE kategori_menu = '$categoryName' ORDER BY nama_menu ASC";
            $result_show_category_item = mysqli_query($conn, $sql_show_category_item);
            $menuItems = [];
            while ($menuItem = mysqli_fetch_assoc($result_show_category_item)) {
                $menuItems[] = $menuItem['nama_menu'];
            }
            $menuItemsByCategory[$categoryName] = $menuItems;
        }
        ?>

        <h3 class="mt-4">Kategori Menu</h3>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Nama Menu</th>
                            <th>Jumlah Item</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($menuItemsByCategory as $category => $menuItems) :
                        ?>
                            <tr>
                                <td><?= $category ?></td>
                                <td><?= implode(', ', $menuItems) ?></td>
                                <td><?= count($menuItems) ?></td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>