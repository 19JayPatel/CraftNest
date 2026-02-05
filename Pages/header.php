<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CraftNest</title>

    <!-- Fonts & CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../CSS/Main.css">

    <style>
        .navbar {
            padding: 8px 0 !important;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 700;
            color: #8B4513 !important;
        }

        .desktop-menu {
            display: none;
        }

        @media (min-width: 992px) {
            .desktop-menu {
                display: block;
            }

            .mobile-toggle {
                display: none;
            }
        }

        .mobile-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.25s ease, visibility 0.25s ease;
            z-index: 1900;
        }

        .mobile-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 280px;
            height: 100vh;
            background: #fff;
            padding-top: 72px;
            transition: right 0.35s ease;
            box-shadow: -4px 0 18px rgba(0, 0, 0, 0.18);
            z-index: 2000;
            overflow-y: auto;
        }

        .mobile-menu.show {
            right: 0;
        }

        .mobile-menu .close-btn {
            position: absolute;
            top: 14px;
            right: 14px;
            font-size: 30px;
            color: #8B4513;
            background: #fff;
            border-radius: 50%;
            padding: 6px 10px;
            cursor: pointer;
            border: 1px solid rgba(0, 0, 0, 0.05);
            z-index: 2100;
        }

        .mobile-menu a {
            display: block;
            padding: 14px 20px;
            border-bottom: 1px solid #f0efe9;
            color: #3D5229;
            font-size: 16px;
            text-decoration: none;
        }

        .mobile-menu a:hover {
            background: #f7f4ee;
        }

        .navbar .navbar-toggler {
            border: none;
            background: transparent;
            color: #8B4513;
        }

        .user-badge {
            width: 35px;
            height: 35px;
            background: #9e5e40;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 18px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-light bg-white shadow-sm fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="../Pages/index.php">CraftNest</a>

            <!-- Desktop Menu -->
            <div class="desktop-menu d-none d-lg-block">
                <ul class="navbar-nav d-flex flex-row gap-4" style="list-style:none;margin:0;padding:0;">

                    <li><a class="nav-link" href="../Pages/index.php">Home</a></li>
                    <li><a class="nav-link" href="../Pages/product.php">Products</a></li>
                    <li><a class="nav-link" href="../Pages/aboutus.php">About Us</a></li>
                    <li><a class="nav-link" href="../Pages/contctus.php">Contact Us</a></li>
                    <li><a class="nav-link" href="../Pages/cart.php">Cart</a></li>

                    <?php if (!isset($_SESSION['username'])): ?>

                        <!-- SHOW LOGIN + SIGNUP WHEN USER NOT LOGGED IN -->
                        <li class="nav-item">
                            <a class="nav-link" href="../Pages/login.php">
                                <i class="fas fa-sign-in-alt me-1"></i> Login
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../Pages/signup.php">
                                <i class="fas fa-user-plus me-1"></i> Signup
                            </a>
                        </li>

                    <?php else: ?>

                        <!-- SHOW USER ICON + LOGOUT WHEN LOGGED IN -->
                        <li class="nav-item ms-3">
                            <div class="user-badge"><?= strtoupper($_SESSION['username'][0]); ?></div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../Pages/logout.php">
                                <i class="fas fa-sign-out-alt me-1"></i> Logout
                            </a>
                        </li>

                    <?php endif; ?>
                </ul>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-toggle navbar-toggler d-lg-none" onclick="openMobileMenu()">
                <i class="fas fa-bars fa-lg"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Overlay -->
    <div id="mobileOverlay" class="mobile-overlay" onclick="closeMobileMenu()"></div>

    <!-- Mobile Slide Menu -->
    <nav id="mobileMenu" class="mobile-menu d-lg-none">

        <button class="close-btn" onclick="closeMobileMenu()">&times;</button>

        <!-- Main Links -->
        <a href="../Pages/index.php">Home</a>
        <a href="../Pages/product.php">Products</a>
        <a href="../Pages/aboutus.php">About Us</a>
        <a href="../Pages/contctus.php">Contact Us</a>
        <a href="../Pages/cart.php">Cart</a>

        <div style="padding:14px 20px; border-top:1px solid #f0efe9;">

            <?php if (!isset($_SESSION['username'])): ?>

                <!-- SHOW LOGIN/SIGNUP -->
                <a href="../Pages/login.php" style="padding:8px 0;">Login</a>
                <a href="../Pages/signup.php" style="padding:8px 0;">Signup</a>

            <?php else: ?>

                <!-- SHOW USER + LOGOUT -->
                <span style="font-weight:bold; color:#3D5229; padding:8px 0; display:block;">
                    Logged in as <?= strtoupper($_SESSION['username'][0]); ?>
                </span>
                <a href="../Pages/logout.php" style="padding:8px 0;">Logout</a>

            <?php endif; ?>

        </div>
    </nav>

    <script>
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileOverlay = document.getElementById('mobileOverlay');

        function openMobileMenu() {
            mobileMenu.classList.add('show');
            mobileOverlay.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            mobileMenu.classList.remove('show');
            mobileOverlay.classList.remove('show');
            document.body.style.overflow = '';
        }

        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape") closeMobileMenu();
        });
    </script>

</body>

</html>