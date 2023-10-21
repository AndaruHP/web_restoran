<?php
session_start();
include('database/connect.php');
var_dump($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran</title>
    <!-- <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/index.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    </style>
</head>

<body>

    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#index.php">
                Restoran
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="cart/cart.php" class="nav-link">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="loginAndRegister/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="loginAndRegister/register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Mau eksperimen dulu -->
    <!--
    <div class="title-container" data-aos="fade-up" data-aos-duration="1000">
        <h1 data-aos="fade-up" data-aos-duration="1000">Restaurant Name</h1>
        <p data-aos="fade-up" data-aos-duration="1000">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eaque suscipit tenetur sed itaque minima officiis quis amet quam provident! Sunt, <br> laudantium quae. Voluptates facilis harum non ad quaerat modi veniam?</p>
        <div class="button-container">
          <button class="btn">
            Get Started
          </button>
    </div>
    -->
    <?php
    if (isset($_POST['add_to_cart'])) {
        $id_produk = $_POST['id_produk'];
        $id_user = $_POST['id_user'];

        // Periksa apakah produk sudah ada di keranjang
        $check_query = "SELECT * FROM cart_table WHERE product_id = '$id_produk' AND user_id = '$id_user'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            // Produk sudah ada di keranjang, tingkatkan jumlahnya
            $update_query = "UPDATE cart_table SET quantity = quantity + 1 WHERE product_id = '$id_produk' AND user_id = '$id_user'";
            $update_result = mysqli_query($conn, $update_query);

            // if ($update_result) {
            //     echo "<script>alert('Jumlah produk dalam keranjang berhasil diperbarui')</script>";
            // } else {
            //     echo "<script>alert('Gagal memperbarui jumlah produk dalam keranjang')</script>";
            // }
        } else {
            // Produk belum ada di keranjang, tambahkan dengan jumlah awal 1
            $insert_query = "INSERT INTO cart_table (product_id, user_id, quantity) VALUES ('$id_produk', '$id_user', 1)";
            $insert_result = mysqli_query($conn, $insert_query);

            // if ($insert_result) {
            //     echo "<script>alert('Produk berhasil ditambahkan ke keranjang')</script>";
            // } else {
            //     echo "<script>alert('Gagal menambahkan produk ke keranjang')</script>";
            // }
        }
    }

    ?>

    <div class="container col-8 mt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            $sql = "SELECT * FROM data_makanan";
            $result = mysqli_query($conn, $sql);
            foreach ($result as $key) : ?>
                <div class="col">
                    <div class="card h-100">
                        <!-- tolong ini biar bentuknya menyesuaikan card, bisa dipencet yang akan muncul deskripsi, bisa di close -->
                        <div class="img-container">
                            <img src="admin/uploads/<?= $key['gambar_menu'] ?>" class="card-img-top" alt="<?= $key['gambar_menu'] ?>">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $key['nama_menu'] ?></h5>
                        </div>
                        <form action="" method="post">
                            <button class="btn btn-primary" type="submit" name="add_to_cart">Tambah</button>
                            <input type="hidden" name="id_produk" value="<?= $key['id_menu'] ?>">
                            <input type="hidden" name="id_user" value="<?= $_SESSION['user_id'] ?>">
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script> -->


</html>