<?php
require_once "captcha.php";

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

if (isset($_POST['submit_login'])) { 
    $PHPCAP = new Captcha(); // Inisialisasi objek Captcha
    $username = $_POST['username'];
    $password = $_POST['password'];
    require_once('../database/connect.php'); // Pastikan file connect.php ada

    // SQL Injection
    $sql = "SELECT * FROM access_table WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_login = $result->fetch_assoc();
    $user_id = $user_login['id'];

    if (!$user_login) {
        echo "<div class='alert alert-danger'>Username tidak ditemukan</div>";
    } else {
        // Verifikasi password
        if (password_verify($password, $user_login["password"])) {
            // Verifikasi captcha
            $captchaInput = $_POST['captcha'];
            if (!$PHPCAP->verify($captchaInput)) {
                echo "<div class='alert alert-danger'>Captcha tidak sesuai</div>";
            } else {
                // Captcha benar, set session dan arahkan ke halaman berikutnya
                $_SESSION['user_login'] = true;
                if ($user_login['role'] == 0) {
                    $_SESSION['role'] = 0;
                    $_SESSION['user_id'] = $user_id;
                    header('location: ../bridge/bridge.php');
                    exit;
                } else {
                    $_SESSION['role'] = 1;
                    $_SESSION['user_id'] = $user_id;
                    header('location: ../bridge/bridge.php');
                    exit;
                }
            }
        } else {
            echo "<div class='alert alert-danger'>Password salah</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
       <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
   <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #080710;
        }

        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }

        .shape:first-child {
            background: linear-gradient(#1845ad,
                    #23a2f6);
            left: -80px;
            top: -140px;
        }

        .shape:last-child {
            background: linear-gradient(to right,
                    #ff512f,
                    #f09819);
            right: -70px;
            bottom: -150px;
        }

form{
    height: 670px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}

        form * {
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 30px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            font-size: 16px;
            font-weight: 500;
        }

        input {
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        ::placeholder {
            color: #e5e5e5;
        }

        button {
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }

        option {
            color: #080710;
        }

        p {
            margin-top: 15px;
            font-size: 14px;
        }
/* Reset some properties for smaller screens */
@media (max-width: 600px) {
    .background {
        width: 80%;
        height: auto;
        position: static;
        transform: none;
        left: 0;
        top: 0;
    }

    .background .shape {
        display12px;
    }

    input {
        height: 30px;
    }

    button {
        font-size: 14px;
        padding: 10px 0;
    }
    form {
        height: 630px;
    }
}

    </style>
</head>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../index.php">
            Restoran
        </a>

    </div>
</nav>

<body>
<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
                <form action="" method="post">
                    <h3>Log in</h3>
                    <div class="form-outline">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-outline">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirm that you're a human</label>
                    </div>
                    <div class="form-group">
                        <?php
                        $PHPCAP->prime();
                        $PHPCAP->draw();
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Complete the Captcha</label>
                    </div>
                    <div class="form-group col-4">
                        <input type="text" name="captcha" class="form-control" required>
                    </div>
                    <div class="form-btn mt-2">
                        <input type="submit" class="btn btn-primary" value="Login" name="submit_login">
                    </div>
                    <p>Not registered yet? <a href="register.php">Register</a></p>
                    <p>Back to homepage <a href="../index.php">Homepage</a></p>
                </form>

            </div>
        </div>
    </div>
</body>

</html>