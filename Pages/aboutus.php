<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>About Us | CraftNest</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../CSS/Main.css">

    <style>
        body {
            background: #f8f4ea;
            font-family: 'Lora', serif;
        }

        /* Hero Banner */
        .about-hero {
            background: url('../Images/banner3.png') center/cover no-repeat;
            padding: 110px 20px;
            text-align: center;
            color: white;
            position: relative;
        }

        .about-hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
        }

        .about-hero h1 {
            position: relative;
            z-index: 2;
            font-size: 48px;
            font-weight: 700;
        }

        .about-hero p {
            position: relative;
            z-index: 2;
            font-size: 18px;
        }

        /* Section card */
        .about-card {
            background: white;
            padding: 30px;
            border-radius: 16px;
            border: 1px solid #e6d8c3;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            margin-bottom: 40px;
        }

        .icon-box {
            width: 70px;
            height: 70px;
            background: #fff3ea;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9e5e40;
            font-size: 28px;
            margin-bottom: 15px;
        }

        /* Team */
        .artisan-card {
            text-align: center;
            padding: 20px;
            background: #fff;
            border-radius: 14px;
            border: 1px solid #e6d8c3;
            box-shadow: 0 5px 14px rgba(0, 0, 0, 0.1);
        }

        .artisan-card img {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #9e5e40;
        }

        .artisan-card h5 {
            color: #3D5229;
            margin-top: 15px;
            font-weight: 700;
        }

        .artisan-card p {
            color: #7a6a50;
        }
    </style>
</head>

<body style="margin-top:100px;">

    <!-- HERO SECTION -->
    <section class="about-hero">
        <h1>About CraftNest</h1>
        <p>Where Tradition Meets Creativity</p>
    </section>


    <div class="container py-5">

        <!-- Who We Are -->
        <div class="about-card">
            <h2 style="color:#3D5229; font-weight:700;">Who We Are</h2>
            <p class="mt-3">
                CraftNest is a home for beautifully handcrafted products created by talented Indian artisans.
                We believe every craft carries a story, emotion, and centuries of tradition. Our mission is
                to bring these unique creations to your home and support the livelihoods of skilled craftsmen.
            </p>
        </div>

        <!-- Mission & Vision -->
        <div class="row g-4">
            <div class="col-md-6">
                <div class="about-card">
                    <div class="icon-box"><i class="fas fa-bullseye"></i></div>
                    <h4 style="color:#3D5229; font-weight:600;">Our Mission</h4>
                    <p class="mt-2">
                        To promote authentic handmade products while empowering artisans
                        through fair trade and sustainable opportunities.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="about-card">
                    <div class="icon-box"><i class="fas fa-eye"></i></div>
                    <h4 style="color:#3D5229; font-weight:600;">Our Vision</h4>
                    <p class="mt-2">
                        To become India’s most loved handcrafted marketplace,
                        connecting artisans with customers through culture-rich creations.
                    </p>
                </div>
            </div>
        </div>

        <!-- Why Choose Us -->
        <div class="about-card mt-4">
            <h2 style="color:#3D5229; font-weight:700;">Why Choose CraftNest?</h2>

            <div class="row text-center mt-4">
                <div class="col-6 col-md-3">
                    <div class="icon-box"><i class="fas fa-hand-sparkles"></i></div>
                    <p>100% Handmade</p>
                </div>

                <div class="col-6 col-md-3">
                    <div class="icon-box"><i class="fas fa-leaf"></i></div>
                    <p>Eco-Friendly Products</p>
                </div>

                <div class="col-6 col-md-3">
                    <div class="icon-box"><i class="fas fa-users"></i></div>
                    <p>Supporting Local Artisans</p>
                </div>

                <div class="col-6 col-md-3">
                    <div class="icon-box"><i class="fas fa-award"></i></div>
                    <p>Premium Quality</p>
                </div>
            </div>
        </div>

        <!-- Meet Our Artisans -->
        <h2 class="text-center mt-5 mb-3" style="color:#3D5229; font-weight:700;">Meet Our Artisans</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="artisan-card">
                    <img src="../Images/reviewer-1.jpg" alt="Artisan">
                    <h5>Ramesh Kumar</h5>
                    <p>Clay & Terracotta Artist</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="artisan-card">
                    <img src="../Images/reviewer-2.jpg" alt="Artisan">
                    <h5>Anjali Mehta</h5>
                    <p>Bead & Jewelry Designer</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="artisan-card">
                    <img src="../Images/reviewer-3.jpg" alt="Artisan">
                    <h5>Rema Sharma</h5>
                    <p>Wood Carving Specialist</p>
                </div>
            </div>
        </div>

    </div>

    <?php include 'footer.php'; ?>

</body>

</html>