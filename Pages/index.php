<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CraftNest</title>
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../CSS/Main.css">
</head>

<body>

    <?php
    include 'header.php';
    ?>
    <!-- Hero Banner -->
    <!-- Hero Section with Image Slider -->
    <section class="hero p-0">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <img src="../Images/slider2.png" class="d-block w-100" alt="Craft Slide 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="fw-bold">Handcrafted with Love</h1>
                        <p>Explore beautiful handmade items from local artisans.</p>
                        <a href="#" class="btn btn-lg custom-btn">Shop Now</a>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img src="../Images/slider3.png" class="d-block w-100" alt="Craft Slide 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="fw-bold">Artisan Woodwork</h1>
                        <p>Unique wooden pieces made with precision and care.</p>
                        <a href="#" class="btn btn-lg custom-btn">Browse Collection</a>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img src="../Images/slider1.png" class="d-block w-100" alt="Craft Slide 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="fw-bold">Jewelry That Tells a Story</h1>
                        <p>Wear your personality with handmade jewelry pieces.</p>
                        <a href="#" class="btn btn-lg custom-btn">Discover More</a>
                    </div>
                </div>

            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="mb-2 text-center" style="color:#556B2F!important">Browse Categories</h2>
            <div class="text-center mb-5" style="color:#556B2F">
                <svg viewBox="0 0 720 40" width="100%" height="40" style="max-width:720px">
                    <!-- left line -->
                    <path d="M10 20 H300" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    <!-- center diamond motif -->
                    <g transform="translate(360,20)">
                        <rect x="-18" y="-8" width="36" height="16" fill="none" stroke="currentColor" stroke-width="2" transform="rotate(45)" />
                        <rect x="-10" y="-5" width="20" height="10" fill="currentColor" opacity=".2" transform="rotate(45)" />
                        <!-- tiny side diamonds -->
                        <rect x="-42" y="-5" width="10" height="10" fill="none" stroke="currentColor" stroke-width="2" transform="rotate(45)" />
                        <rect x="32" y="-5" width="10" height="10" fill="none" stroke="currentColor" stroke-width="2" transform="rotate(45)" />
                    </g>
                    <!-- right line -->
                    <path d="M420 20 H710" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card category-card">
                        <img src="../Images/Pottery.png" class="card-img-top" alt="Pottery">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #556B2F !important">Pottery</h5>
                            <a href="#" class="btn border-fill-btn">Explore</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card category-card">
                        <img src="../Images/Jewelry.png" class="card-img-top" alt="Jewelry">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #556B2F !important">Jewelry</h5>
                            <a href="#" class="btn border-fill-btn">Explore</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card category-card">
                        <img src="../Images/woodwork.png" class="card-img-top" alt="Woodwork">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #556B2F !important">Woodwork</h5>
                            <a href="#" class="btn border-fill-btn">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section with Font Awesome Icons -->
    <section class="py-5 bg-beige">

        <div class="container text-center">
            <h2 class="text-center mb-2" style="color: #3D5229;">Why Shop With Us</h2>
            <div class="text-center mb-5">
                <svg viewBox="0 0 300 20" width="180" height="20" xmlns="http://www.w3.org/2000/svg">
                    <!-- Decorative artisan underline -->
                    <path d="M5 15 Q50 0, 95 15 T185 15 T275 15"
                        fill="none"
                        stroke="#3D5229"
                        stroke-width="2"
                        stroke-linecap="round" />
                    <!-- Small dots for handcrafted feel -->
                    <circle cx="5" cy="15" r="2" fill="#3D5229" />
                    <circle cx="275" cy="15" r="2" fill="#3D5229" />
                </svg>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 feature-card h-100 shadow-sm">
                        <i class="fas fa-leaf fa-3x text-success mb-3"></i>
                        <h5>Eco-Friendly</h5>
                        <p>Crafted using sustainable materials that are safe for the planet.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 feature-card h-100 shadow-sm">
                        <i class="fas fa-hand-sparkles fa-3x text-warning mb-3"></i>
                        <h5>100% Handmade</h5>
                        <p>Each product is carefully handcrafted by skilled local artisans.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 feature-card h-100 shadow-sm">
                        <i class="fas fa-truck fa-3x text-primary mb-3"></i>
                        <h5>Nationwide Delivery</h5>
                        <p>Fast and secure delivery service available all across the country.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 feature-card h-100 shadow-sm">
                        <i class="fas fa-gift fa-3x text-danger mb-3"></i>
                        <h5>Unique Gifts</h5>
                        <p>Perfect one-of-a-kind gifts for every occasion and celebration.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 feature-card h-100 shadow-sm">
                        <i class="fas fa-award fa-3x text-info mb-3"></i>
                        <h5>Premium Quality</h5>
                        <p>Only the best materials and craftsmanship go into our items.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 feature-card h-100 shadow-sm">
                        <i class="fas fa-people-carry fa-3x text-secondary mb-3"></i>
                        <h5>Community Support</h5>
                        <p>Every purchase supports local artists and empowers small businesses.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Best Sellers Section -->
    <section class="py-5" style="background-color: #F5F5DC;">
        <div class="container">
            <h2 class="text-center mb-3 text-success">Best Sellers</h2>

            <!-- Floral divider -->
            <svg class="d-block mx-auto mb-5" viewBox="0 0 720 80" width="100%" height="80" aria-hidden="true" style="max-width:720px;color:currentColor">
                <!-- vines (use currentColor) -->
                <path d="M10,40 C90,10 150,10 210,40 S330,70 390,40 S510,10 570,40 S630,70 710,40"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                <!-- left leaves -->
                <path d="M145,36 q10,-10 28,-6 q-8,14 -26,18 z" fill="currentColor" opacity=".18" />
                <path d="M255,44 q12,10 28,6 q-8,-14 -26,-18 z" fill="currentColor" opacity=".18" />
                <!-- right leaves -->
                <path d="M465,36 q-12,-10 -28,-6 q8,14 26,18 z" fill="currentColor" opacity=".18" />
                <path d="M575,44 q-12,10 -28,6 q8,-14 26,-18 z" fill="currentColor" opacity=".18" />

                <!-- center flower -->
                <g transform="translate(360,40)">
                    <!-- petals -->
                    <g fill="currentColor" opacity=".22">
                        <path d="M0,-18 C6,-18 10,-12 10,-6 C10,0 6,6 0,6 C-6,6 -10,0 -10,-6 C-10,-12 -6,-18 0,-18 Z" transform="rotate(0)" />
                        <path d="M0,-18 C6,-18 10,-12 10,-6 C10,0 6,6 0,6 C-6,6 -10,0 -10,-6 C-10,-12 -6,-18 0,-18 Z" transform="rotate(45)" />
                        <path d="M0,-18 C6,-18 10,-12 10,-6 C10,0 6,6 0,6 C-6,6 -10,0 -10,-6 C-10,-12 -6,-18 0,-18 Z" transform="rotate(90)" />
                        <path d="M0,-18 C6,-18 10,-12 10,-6 C10,0 6,6 0,6 C-6,6 -10,0 -10,-6 C-10,-12 -6,-18 0,-18 Z" transform="rotate(135)" />
                        <path d="M0,-18 C6,-18 10,-12 10,-6 C10,0 6,6 0,6 C-6,6 -10,0 -10,-6 C-10,-12 -6,-18 0,-18 Z" transform="rotate(180)" />
                        <path d="M0,-18 C6,-18 10,-12 10,-6 C10,0 6,6 0,6 C-6,6 -10,0 -10,-6 C-10,-12 -6,-18 0,-18 Z" transform="rotate(225)" />
                        <path d="M0,-18 C6,-18 10,-12 10,-6 C10,0 6,6 0,6 C-6,6 -10,0 -10,-6 C-10,-12 -6,-18 0,-18 Z" transform="rotate(270)" />
                        <path d="M0,-18 C6,-18 10,-12 10,-6 C10,0 6,6 0,6 C-6,6 -10,0 -10,-6 C-10,-12 -6,-18 0,-18 Z" transform="rotate(315)" />
                    </g>
                    <!-- center -->
                    <circle r="6" fill="currentColor" />
                    <!-- tiny ring -->
                    <circle r="11" fill="none" stroke="currentColor" stroke-width="1" opacity=".5" />
                </g>

                <!-- thin underline to finish -->
                <path d="M220,58 H500" stroke="currentColor" stroke-width="1" opacity=".35" />
            </svg>


            <div class="row g-4">

                <!-- Product Card -->
                <div class="col-md-3">
                    <div class="best-seller-card">
                        <div class="image-wrapper">
                            <img src="../Images/Clayflowerpote.png" alt="Bamboo Storage Basket">
                        </div>
                        <div class="info p-3 text-center">
                            <h6 class="fw-bold text-dark">Clay Flower Pot</h6>
                            <p class="text-muted small mb-1">Beautifully handcrafted pot made with eco-friendly clay.
                            </p>
                            <p class="text-success fw-bold mb-2">₹799</p>
                            <a href="#" class="btn btn-sm border-fill-btn">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="best-seller-card">
                        <div class="image-wrapper">
                            <img src="../Images/BeadedBracelet.png" alt="Bamboo Storage Basket">
                        </div>
                        <div class="info p-3 text-center">
                            <h6 class="fw-bold text-dark">Beaded Bracelet</h6>
                            <p class="text-muted small mb-1">Unique boho bracelet made with love and creativity.</p>
                            <p class="text-success fw-bold mb-2">₹149</p>
                            <a href="#" class="btn btn-sm border-fill-btn">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="best-seller-card">
                        <div class="image-wrapper">
                            <img src="../Images/WoodenServingTray.png" alt="Bamboo Storage Basket">
                        </div>
                        <div class="info p-3 text-center">
                            <h6 class="fw-bold text-dark">Wooden Serving Tray</h6>
                            <p class="text-muted small mb-1">Hand-polished tray ideal for gifting and <br> decor.</p>
                            <p class="text-success fw-bold mb-2">₹299</p>
                            <a href="#" class="btn btn-sm border-fill-btn">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="best-seller-card">
                        <div class="image-wrapper">
                            <img src="../Images/NaturalFiberFloorMat.png" alt="Bamboo Storage Basket">
                        </div>
                        <div class="info p-3 text-center">
                            <h6 class="fw-bold text-dark">Natural Fiber Floor Mat</h6>
                            <p class="text-muted small mb-1">Eco-conscious style to your home with our Natural Fiber
                                Floor Mat.
                            </p>
                            <p class="text-success fw-bold mb-2">₹349</p>
                            <a href="#" class="btn btn-sm border-fill-btn">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="best-seller-card">
                        <div class="image-wrapper">
                            <img src="../Images/stonkankavati.jpg" alt="Bamboo Storage Basket">
                        </div>
                        <div class="info p-3 text-center">
                            <h6 class="fw-bold text-dark">Handmade Kankavati</h6>
                            <p class="text-muted small mb-1">Ideal for wedding occasions.
                            </p>
                            <p class="text-success fw-bold mb-2">₹299</p>
                            <a href="#" class="btn btn-sm border-fill-btn">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="best-seller-card">
                        <div class="image-wrapper">
                            <img src="../Images/DecorativeBajot.jpg" alt="Bamboo Storage Basket">
                        </div>
                        <div class="info p-3 text-center">
                            <h6 class="fw-bold text-dark">Decorative Bajot</h6>
                            <p class="text-muted small mb-1">Decorative Bajot with unique handwork.
                            </p>
                            <p class="text-success fw-bold mb-2">₹799</p>
                            <a href="#" class="btn btn-sm border-fill-btn">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="best-seller-card">
                        <div class="image-wrapper">
                            <img src="../Images/KarwachauthPuja.jpg" alt="Bamboo Storage Basket">
                        </div>
                        <div class="info p-3 text-center">
                            <h6 class="fw-bold text-dark">Karwachauth Puja Set</h6>
                            <p class="text-muted small mb-1">Enhances Karwachauth puja and decor.
                            </p>
                            <p class="text-success fw-bold mb-2">₹1999</p>
                            <a href="#" class="btn btn-sm border-fill-btn">Add to Cart</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="best-seller-card">
                        <div class="image-wrapper">
                            <img src="../Images/HandicraftsBullockCart.jpg" alt="Bamboo Storage Basket">
                        </div>
                        <div class="info p-3 text-center">
                            <h6 class="fw-bold text-dark">Handicrafts Bullock Cart</h6>
                            <p class="text-muted small mb-1">Enhances your wedding decoration.
                            </p>
                            <p class="text-success fw-bold mb-2">₹999</p>
                            <a href="#" class="btn btn-sm border-fill-btn">Add to Cart</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Our Latest Collections - Slider Style -->
    <section class="py-5 latest-collections bg-beige">
        <div class="container text-center">
            <div class="section-title">
                <h2>Our Latest Collections</h2>
                <img src="../Images/1751088.svg" alt="" class="divider-icon">
            </div>

            <p class="mb-5">Discover our newest handcrafted treasures, made with love and passion.</p>

            <!-- Swiper Slider -->
            <div class="swiper myCollectionSlider">
                <div class="swiper-wrapper">

                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="artisan-slide">
                            <div class="img-wrap">
                                <img src="../Images/The Pooja Thali.jpg" alt="The Pooja Thali">
                            </div>
                            <h5>The Pooja Thali</h5>
                            <p>Elegant traditional plate crafted by skilled artisans.</p>
                            <a href="#" class="btn border-fill-btn btn-sm">Shop Now</a>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="artisan-slide">
                            <div class="img-wrap">
                                <img src="../Images/TheGaja.png" alt="The Gaja">
                            </div>
                            <h5>The Gaja</h5>
                            <p>Timeless wooden art for your home and office.</p>
                            <a href="#" class="btn border-fill-btn btn-sm">Shop Now</a>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide">
                        <div class="artisan-slide">
                            <div class="img-wrap">
                                <img src="../Images/LordGaneshFigurine.png" alt="Lord Ganesh Figurine">
                            </div>
                            <h5>Lord Ganesh Figurine</h5>
                            <p>Beautiful Marble Handcrafted Lord Ganesh Figurine.</p>
                            <a href="#" class="btn border-fill-btn btn-sm">Shop Now</a>
                        </div>
                    </div>

                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="artisan-slide">
                            <div class="img-wrap">
                                <img src="../Images/IMG_20191206_163905.jpg" alt="The Pooja Thali">
                            </div>
                            <h5>The Pooja Thali</h5>
                            <p>Elegant traditional plate crafted by skilled artisans.</p>
                            <a href="#" class="btn border-fill-btn btn-sm">Shop Now</a>
                        </div>
                    </div>

                </div>

                <!-- Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5 bg-beige">
        <div class="container text-center">
            <h2 class="mb-5 text-success">What Our Customers Say</h2>

            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <div class="testimonial-card mx-auto">
                            <p>“Absolutely love the quality! The handmade tray I received was even better than I
                                expected.”</p>
                            <h6>– Priya Shah</h6>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="testimonial-card mx-auto">
                            <p>“Fast delivery and beautiful craftsmanship. The perfect gift for my friend's wedding.”
                            </p>
                            <h6>– Ramesh Patel</h6>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="testimonial-card mx-auto">
                            <p>“I'm so happy I found this shop. Supporting local artisans feels great!”</p>
                            <h6>– Aarti Desai</h6>
                        </div>
                    </div>

                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- Newsletter Signup -->
    <section class="py-5 text-white newsletter">
        <div class="container text-center text-white">
            <h2 class="mb-4">Stay Updated</h2>
            <p class="mb-4">Subscribe to our newsletter for the latest in handmade trends and exclusive offers.</p>
            <form class="row justify-content-center">
                <div class="col-md-6">
                    <input type="email" class="form-control form-control-lg mb-3" placeholder="Enter your email" required>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-subscribe">Subscribe</button>
                </div>
            </form>
        </div>
    </section>

    <?php
    include 'footer.php';
    ?>

    </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Main.js"></script>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".myCollectionSlider", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                }
            }
        });
    </script>


</body>

</html>