<?php
    include "Include/navbar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page | Admin Side | Imperial Hotel - Rajkot</title>


    <!-- CSS Files Links -->
    <link rel="icon" type="image/ico" href="Images/icon.png" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="Fonts/Poppins.css">
    <link rel="stylesheet" href="SCSS/style.css">


</head>

<body>

    <main>

        <div class="home_section">
            <div class="image">
                <img src="Images/bg4.jpg" alt="">
            </div>
            <div class="text_icon">
                <div class="text">
                    <h2>Imperial Hotel</h2>
                    <p>Rajkot</p>
                </div>
                <div class="icon">
                    <i class="bx bxl-facebook"></i>
                    <i class="bx bxl-whatsapp"></i>
                    <i class="bx bxl-instagram"></i>
                    <i class='bx bxl-linkedin'></i>
                    <i class='bx bxl-twitter'></i>
                </div>
            </div>
            <div class="dashboard-button">
                <a href="dashboard.php">
                    <i class='bx bx-grid-alt'></i>
                    <span>Dashboard</span>
                </a>
            </div>
        </div>

    </main>

    <!-- Java Scripts Files -->
    <script src="JS/jquery.min.js"></script>
    <script src="JS/sweetalert.min.js"></script>
    <script src="JS/main.js"></script>


</body>

</html>