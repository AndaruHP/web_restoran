<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
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
    <title>User Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            padding-top: 80px;
            background-color: black;
            color: white;
        }

        .card {
            background-color: black;
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .history-section {
            background-color: black !important;
            color: white;
        }

        .table th,
        .table td {
            color: white;
            background-color: black !important;
        }
    </style>
</head>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../index.php">IF-330 Cafetarian</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] != 0 || $_SESSION['user_id'] != 1)) {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link navbar-btn" href="../bridge/bridge.php">Account</a>';
                    echo '</li>';
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link navbar-btn" href="../cart/cart.php">Cart</a>';
                    echo '</li>';
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link navbar-btn" href="../logout/logout.php">Logout</a>';
                    echo '</li>';
                } else {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link navbar-btn" href="../cart/cart.php">Cart</a>';
                    echo '</li>';
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

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card p-3">
                    <?php
                    $sql = "SELECT * FROM access_table WHERE id = $_SESSION[user_id]";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    echo '<h3>Nama Lengkap: ' . $row['first_name'] . ' ' . $row['last_name'] . '</h3>';
                    echo '<h5>Username: ' . $row['username'] . '</h5>';
                    if ($row['gender_type'] == 'm') {
                        echo '<h5>Jenis Kelamin: Laki-laki</h5>';
                    } else {
                        echo '<h5>Jenis Kelamin: Perempuan</h5>';
                    }
                    $birthdate = $row['birth_date'];
                    $date_elements = explode('-', $birthdate);
                    $formatted_birthdate = $date_elements[2] . ' ' . date("F", mktime(0, 0, 0, $date_elements[1], 10)) . ' ' . $date_elements[0];
                    echo '<h5>Tanggal Lahir: ' . $formatted_birthdate . '</h5>';
                    ?>
                    <div class="col">
                        <a href="../logout/logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="row">
                    <h4>History Pembelian</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_uang = 0;
                                $sql_history = "SELECT * FROM history_user WHERE id_user = $_SESSION[user_id]";
                                $result_history = mysqli_query($conn, $sql_history);

                                foreach ($result_history as $history):
                                    $total_uang += $history['total_price'];
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $history['nama_menu'] ?>
                                        </td>
                                        <td>Rp
                                            <?= number_format($history['total_price'], 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><strong>Total Hedon</strong></td>
                                    <td><strong>Rp
                                            <?= number_format($total_uang, 0, ',', '.') ?>
                                        </strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>