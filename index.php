<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran</title>
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    </style>
</head>

<body>

    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#top">Restoran</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
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

    <div class="title-container">
        <h1>Restaurant Name</h1>
        <p>Your Slogan Here</p>
    </div>

    <div class="container mt-5">
        <?php
            // include('path-to-menu_data.php'); // Include the menu data file

            // // Loop through the menu items and generate HTML for each
            // foreach ($menuItems as $menuItem) {
            //     echo '<div class="menu-item">';
                
            //     // Image div
            //     echo '<div class="menu-image">';
            //     echo '<img src="' . $menuItem['image'] . '" alt="' . $menuItem['name'] . '">';
            //     echo '</div>';
                
            //     // Price div
            //     echo '<div class="menu-price">';
            //     echo '<p>Price: ' . $menuItem['price'] . '</p>';
            //     echo '</div>';
                
            //     // Content div
            //     echo '<div class="menu-content">';
            //     echo '<h2>' . $menuItem['name'] . '</h2>';
            //     echo '<p>' . $menuItem['content'] . '</p>';
            //     echo '</div>';
                
            //     echo '</div>'; // Close the menu-item div
            // }
        ?>
    </div>


</html>
