<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: ../loginAndRegister/login.php');
    exit;
}

include('../database/connect.php');
$user_id = $_SESSION['user_id'];


if (isset($_POST['checkout'])) {
    $sql = "SELECT dm.*, ct.quantity FROM data_makanan dm LEFT JOIN cart_table ct ON dm.id_menu = ct.product_id WHERE ct.user_id = $user_id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    $cart = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($cart as $item) {
        if ($item['quantity'] > 0) {
            $menuName = $item['nama_menu'];
            $quantity = $item['quantity'];
            $productPrice = $item['harga_menu'] * $quantity;

            $insertHistoryQuery = "INSERT INTO history_user (id_user, nama_menu, quantity, total_price) VALUES ('$user_id', '$menuName', '$quantity', '$productPrice')";
            $insertHistoryResult = mysqli_query($conn, $insertHistoryQuery);

            if (!$insertHistoryResult) {
                die("Error: " . mysqli_error($conn));
            }
        }
    }
    $deleteCartQuery = "DELETE FROM cart_table WHERE user_id = $user_id";
    $deleteCartResult = mysqli_query($conn, $deleteCartQuery);

    if (!$deleteCartResult) {
        die("Error: " . mysqli_error($conn));
    }

    header('Location: ../index.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        #menu {
            padding-top: 80px;
            /* Adjust the value as needed */
        }

        .card-body {
            background-color: black;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }


        /* Adjust the button color */
        .card-body .btn {
            color: white;
        }

        .custom-card {
            border: none;
            /* Remove the border */
            padding: 0;
            /* Remove padding if needed */
            margin: 0;
            /* Remove margin if needed */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../index.php">
                Cafetarian
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <?php
                    if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] != 0 || $_SESSION['user_id'] != 1)) {
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link navbar-btn" href="../bridge/bridge.php">Account</a>';
                        echo '</li>';
                        echo '<li class="nav-item">';
                        echo '</li>';
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link navbar-btn" href="../cart/cart.php">Cart</a>';
                        echo '</li>';
                        echo '<a class="nav-link navbar-btn" href="../logout/logout.php">Logout</a>';
                        echo '</li>';
                    } else {
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link navbar-btn" href="../loginAndRegister/login.php">Login</a>';
                        echo '</li>';
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link navbar-btn" href="../loginAndRegister/register.php">Register</a>';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <section id="menu" class="menu section-bg mb-5">
        <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="400">
            <div class="row menu-container" data-aos="fade-up" data-aos-offset="200">
                <?php
                // Create an SQL query that joins the two tables
                $sql = "SELECT dm.*, ct.quantity FROM data_makanan dm LEFT JOIN cart_table ct ON dm.id_menu = ct.product_id WHERE ct.user_id = $user_id";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die("Error: " . mysqli_error($conn));
                }

                // Fetch the data
                $cart = mysqli_fetch_all($result, MYSQLI_ASSOC);

                // Initialize totalprice
                $totalprice = 0;

                foreach ($cart as $item) :
                    if ($item['quantity'] > 0) :
                ?>
                        <div class="col-lg-6 menu-item filter-<?= str_replace(' ', '', $item['kategori_menu']) ?>">
                            <div class="img-container">
                                <img src='../admin/uploads/<?= $item['gambar_menu'] ?>' class="menu-img">
                            </div>
                            <div class="menu-content">
                                <a class="menu-title">Product Name:
                                    <?= $item['nama_menu'] ?>
                                </a>
                                <span> Product Price: Rp
                                    <?= number_format($item['harga_menu'] * $item['quantity'], 0, ',', '.') ?>
                                </span>
                            </div>

                            <div class="row">
                                <div class="col button-container">
                                    <form method='post' action='update_quantity.php'>
                                        <input type='hidden' name='product_id' value='<?= $item['id_menu'] ?>'>
                                        <input type='hidden' name='new_quantity' value='<?= ($item['quantity'] - 1) ?>'>
                                        <input type='submit' class="btn" name='subtract' value='-'>
                                    </form>
                                </div>
                                <div class="col quantity menu-content">
                                    <span>Quantity:
                                        <?= $item['quantity'] ?>
                                    </span>
                                </div>
                                <div class="col button-container">
                                    <form method='post' action='update_quantity.php'>
                                        <input type='hidden' name='product_id' value='<?= $item['id_menu'] ?>'>
                                        <input type='hidden' name='new_quantity' value='<?= ($item['quantity'] + 1) ?>'>
                                        <input type='submit' class="btn" name='add' value='+'>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php
                        $productprice = $item['harga_menu'] * $item['quantity'];
                        $totalprice += $productprice;
                    endif;
                endforeach;
                ?>
            </div>
        </div>
    </section>

    <div class="card mx-auto col-lg-6 custom-card">
        <div class="card">
            <div class="card-body text-center">
                <div class="col-md-9">
                    <h4>Total Price: Rp
                        <?= number_format($totalprice, 0, ',', '.') ?>
                    </h4>
                </div>
                <div class="col-md-3 button-container">
                    <form action="" method="post">
                        <input type="submit" name="checkout" value="Checkout" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


</body>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>


<script>
    function scrollToSection(sectionId) {
        var targetSection = document.querySelector(sectionId);

        if (targetSection) {
            targetSection.scrollIntoView({
                behavior: 'smooth'
            });
        }
    }
</script>

</html>