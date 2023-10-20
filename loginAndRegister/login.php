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
            <a class="navbar-brand" href="../index.php">Restoran</a>
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

  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        ">
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        position: absolute;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">
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
              <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Log in</h2>
        <form action="" method="post">
        <div class="col-md-6 mb-4">
                <div class="form-outline">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
    </div>
    <div class="col-md-6 mb-4">
                <div class="form-outline">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
    </div>
            <br />
            <label class="form-label">Confirm that you're a human</label>
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
                <div class="btn btn-primary btn-block mb-4">
                <input type="submit" class="btn btn-primary" value="Login" name="submit_login">
            </div>
        </form>
        <div class="mt-2">
            <p>Not registered yet? <a href="register.php">Register</a></p>
            <p>Back to homepage <a href="../index.php">Homepage</a></p>
        </div>
    </div>
    </div>
</body>

</html>