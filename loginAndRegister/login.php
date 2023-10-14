<?php
session_start();
if (isset($_SESSION['user_login'])) {
    if ($_SESSION['role'] == 0) {
        header('location: ../admin/admin_dashboard.php');
        // exit;
    } else {
        header('location: ../user/user_dashboard.php');
        // exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#top">Restoran</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<body>
    <div class="container col-4 mt-5">
        <?php
        // cek kalo semua data sudah masuk atau belum
        if (isset($_POST['submit_login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            require_once('../database/connect.php');
            $sql = "SELECT * FROM access_table WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $user_login = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user_login) {
                if (password_verify($password, $user_login["password"])) {
                    session_start();
                    $_SESSION['user_login'] = true;
                    if ($user_login['role'] == 0) {
                        $_SESSION['role'] = 0;
                        header('location: ../bridge/bridge.php');
                        exit;
                    } else {
                        $_SESSION['role'] = 1;
                        header('location: ../bridge/bridge.php');
                        exit;
                    }
                } else {
                    echo "<div class='alert alert-danger'>Password salah</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Username tidak ditemukan</div>";
            }
        }
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <br />
            <label>Confirm that you're a human</label>
            <br />
                <?php
                require "captcha.php";
                $PHPCAP->prime();
                $PHPCAP->draw();
                ?>
                <br />
                <label>Complete the Captcha</label>
                <br />
                <input name="captcha" type="text" required>
                <div class="form-btn mt-2">
                <input type="submit" class="btn btn-primary" value="Login" name="submit_login">
            </div>
        </form>
        <div class="mt-2">
            <p>Not registered yet? <a href="register.php">Register</a></p>
            <p>Back to homepage <a href="../index.php">Homepage</a></p>
        </div>
    </div>
</body>

</html>