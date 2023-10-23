<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    if ($_SESSION['role'] == 0) {
        header('location: ../admin/admin_dashboard.php');
    } else {
        header('location: ../loginAndRegister/login.php');
    }
    exit;
}
echo 'kamu adalah user <br>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <a href="../logout/logout.php" class="btn btn-warning">Logout</a>
</body>

</html>