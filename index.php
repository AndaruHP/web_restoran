<?php
session_start();
include('database/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran</title>
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>


<body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                Restoran
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="cart/cart.php" class="nav-link navbar-btn">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-btn" href="loginAndRegister/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-btn" href="loginAndRegister/register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="title-container" data-aos="fade-up" data-aos-duration="1000">
        <h1 data-aos="fade-up" data-aos-duration="1000">Restaurant Name</h1>
        <p data-aos="fade-up" data-aos-duration="1000">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eaque
            suscipit tenetur sed itaque minima officiis quis amet quam provident! Sunt, <br> laudantium quae. Voluptates
            facilis harum non ad quaerat modi veniam?</p>
        <div class="button-container">
            <button class="btn" onclick="scrollToSection('#about')">
                Get Started
            </button>
        </div>
    </div>

    <section id="about" class="about" data-aos-offset="500" data-aos-duration="1000">>
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6 order-1 o  rder-lg-2" data-aos="zoom-in" data-aos-delay="100">
                    <div class="about-img">
                        <img src="css/gambar/about.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </li>
                        <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate
                            velit.</li>
                        <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu
                            fugiat nulla pariatur.</li>
                    </ul>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste odit voluptatum voluptatibus iure!
                        Temporibus perspiciatis deleniti veniam rerum porro impedit hic dolores a asperiores consectetur
                        et eveniet, illum omnis sequi.
                    </p>
                    <div class="button-container">
                        <button class="btn" onclick="scrollToSection('#carousel')">
                            WHY US?
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="carousel" class="carousel mb-5" data-aos="fade-right" data-aos-offset="500" data-aos-duration="2000">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="css/gambar/carousel1.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="caption-content">
                            <h3>Caption 1</h3>
                            <p>Description for Image 1</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="css/gambar/carousel2.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="caption-content">
                            <h3>Caption 1</h3>
                            <p>Description for Image 1</p>
                        </div>
                    </div>

                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="css/gambar/carousel3.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="caption-content">
                            <h3>Caption 1</h3>
                            <p>Description for Image 1</p>
                        </div>
                    </div>

                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <div></div>

    <?php
    if (isset($_POST['add_to_cart'])) {
        $id_produk = $_POST['id_produk'];
        $id_user = $_POST['id_user'];

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

    <section id="menu" class="menu section-bg mb-5">
        <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="400">

            <div class="section-title" data-aos="fade-down-right" data-aos-duration="2000">
                <h2>Menu</h2>
                <p>Discover Our Tasty Menu</p>
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="menu-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-Appetizer">Appetizer</li>
                        <li data-filter=".filter-MainCourse">Main Course</li>
                        <li data-filter=".filter-SideDish">Side Dish</li>
                        <li data-filter=".filter-Beverages">Beverages</li>
                        <li data-filter=".filter-Dessert">Dessert</li>
                    </ul>
                </div>
            </div>

            <div class="row menu-container" data-aos="fade-up" data-aos-offset="200">

                <?php
                $sql = "SELECT * FROM data_makanan";
                $result = mysqli_query($conn, $sql);
                foreach ($result as $key): ?>
                    <div class="col-lg-6 menu-item filter-<?= str_replace(' ', '', $key['kategori_menu']) ?>">
                        <!-- tolong ini biar bentuknya menyesuaikan card, bisa dipencet yang akan muncul deskripsi, bisa di close -->
                        <div class="img-container">
                            <img src="admin/uploads/<?= $key['gambar_menu'] ?>" class="menu-img"
                                alt="<?= $key['gambar_menu'] ?>">
                        </div>
                        <div class="menu-content">
                            <a class="menu-title">
                                <?= $key['nama_menu'] ?>
                            </a>
                            <span>Rp.
                                <?= $key['harga_menu'] ?>
                            </span>
                        </div>
                        <div class="menu-ingredients">
                            <?= $key['deskripsi_menu'] ?>
                        </div>
                        <form action="" method="post">
                            <div class="button-container">
                                <button class="btn cart-button" type="submit" name="add_to_cart">add to cart</button>
                                <input type="hidden" name="id_produk" value="<?= $key['id_menu'] ?>">
                                <!-- <input type="hidden" name="id_user" value="<?= $_SESSION['user_id'] ?>"> -->
                            </div>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>





        </div>
    </section><!-- End Menu Section -->




    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>Restoran</h3>
                            <p>

                            </p>

                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>

                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Email</h4>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span></span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
            </div>
        </div>

    </footer><!-- End Footer -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


    <script>
        $(document).ready(function () {
            // Initialize Isotope
            $('.menu-container').isotope({
                itemSelector: '.menu-item',
                layoutMode: 'fitRows'
            });

            // Filter items on button click
            $('#menu-flters li').on('click', function () {
                $('#menu-flters li').removeClass('filter-active');
                $(this).addClass('filter-active');
                var selector = $(this).data('filter');
                $('.menu-container').isotope({ filter: selector });
            });
        });

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