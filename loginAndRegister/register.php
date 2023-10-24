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
    <title>Register Page</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
            bottom: -330px;
        }

        form {
            height: 820px;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 60%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
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
                display: none;
                /* Hide the background shapes on small screens */
            }

            form {
                width: 90%;
                padding: 20px;
            }

            form h3 {
                font-size: 20px;
            }

            label {
                font-size: 12px;
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
        IF-330 Cafetarian
        </a>

    </div>
</nav>

<body>

    <?php
    // cek kalo semua data sudah masuk atau belum
    if (isset($_POST['submit_register'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $birth_date = $_POST['birth_date'];
        $gender_type = $_POST['gender_type'];
        $username = $_POST['username'];
        $passwordBefore = $_POST['password'];
        $password = password_hash($passwordBefore, PASSWORD_DEFAULT);

        // alert bakalan keluar kalo ada yang belum diisi atau tidak sesuai dengan format
        $error_message = array();
        if (empty($first_name) or empty($last_name) or empty($birth_date) or empty($gender_type) or empty($username) or empty($passwordBefore)) {
            array_push($error_message, "Semua data harus diisi");
        }

        require_once('../database/connect.php');
        // cek apakah username sudah ada atau belum
        $sql = "SELECT * FROM access_table WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
            array_push($error_message, "Username sudah ada");
        }

        // munculin alert
        if (count($error_message) > 0) {
            // ini kalo ada yang error
            foreach ($error_message as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        } else {
            $sql = "INSERT INTO access_table (first_name, last_name, gender_type, birth_date, username, password, role)
                VALUES ('$first_name', '$last_name', '$gender_type', '$birth_date', '$username', '$password', 1)";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<div class='alert alert-success'>Register berhasil</div>";
            } else {
                echo "<div class='alert alert-danger'>Register gagal</div>";
            }
        }
    }
    ?>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="" method="post">
        <h3>Register</h3>
        <div class="form-group">
            <label for="first_name">Nama Depan</label>
            <input type="text" class="form-control" name="first_name">
        </div>
        <div class="form-group">
            <label for="last_name">Nama Belakang</label>
            <input type="text" class="form-control" name="last_name">
        </div>
        <div class="form-group">
            <label for="gender_type">Gender</label>
            <select name="gender_type" class="form-control">
                <option value="m">Male</option>
                <option value="f">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="birth_date">Tanggal Lahir</label>
            <input type="date" class="form-control" name="birth_date">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-btn mt-2">
            <input type="submit" class="btn btn-primary" value="Register" name="submit_register">
        </div>
        <div class="mt-2">
            <p>Already registered? <a href="login.php">Login</a></p>
            <p>Back to homepage <a href="../index.php">Homepage</a></p>
        </div>
    </form>

    </div>
    </div>
    </div>
</body>

</html>