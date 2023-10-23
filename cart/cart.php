<?php
session_start();

include('../database/connect.php');

// User ID from the session
$user_id = $_SESSION['user_id'];

// Create an SQL query that joins the two tables
$sql = "SELECT dm.*, ct.quantity FROM data_makanan dm
        LEFT JOIN cart_table ct ON dm.id_menu = ct.product_id
        WHERE ct.user_id = $user_id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Fetch the data
$cart = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Loop through the combined data
$totalprice = 0;
foreach ($cart as $item) {
    if ($item['quantity'] > 0) {
        echo "<img src='../admin/uploads/" . $item['gambar_menu'] . "' width='200' height='150' style='object-fit: cover;'> <br>";
        // echo "Product ID: " . $item['id_menu'] . "<br>";
        echo "Product Name: " . $item['nama_menu'] . "<br>";
        $productprice = $item['harga_menu'] * $item['quantity'];
        echo "Product Price: Rp " . number_format($productprice, 0, ',', '.') . "<br>";
        $totalprice += $productprice;
        // Add more details as needed
        echo "<br>";
        echo "<form method='post' action='update_quantity.php'>";
        echo "<input type='hidden' name='product_id' value='" . $item['id_menu'] . "'>";
        echo "<input type='hidden' name='new_quantity' value='" . ($item['quantity'] + 1) . "'>";
        echo "<input type='submit' name='add' value='+'>";
        echo "</form>";
        echo "Quantity: " . $item['quantity'] . "<br>";
        echo "<form method='post' action='update_quantity.php'>";
        echo "<input type='hidden' name='product_id' value='" . $item['id_menu'] . "'>";
        echo "<input type='hidden' name='new_quantity' value='" . ($item['quantity'] - 1) . "'>";
        echo "<input type='submit' name='subtract' value='-'>";
        echo "</form>";
    }
}

echo "Total Price: Rp " . number_format($totalprice, 0, ',', '.') . "<br>";

if (isset($_POST['checkout'])) {
    $sql = "DELETE FROM cart_table WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    header('Location: ../index.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <form action="" method="post">
        <input type="submit" name="checkout" value="Checkout">
    </form>
    <button class="btn btn-danger"><a href="../index.php">Hompepage</a></button>
</body>

</html>