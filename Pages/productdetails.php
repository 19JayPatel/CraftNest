<?php

include 'connection.php';
include 'header.php';

// Check if product ID exists
if (!isset($_GET['id'])) {
    echo "<h3 class='text-center mt-5 text-danger'>No product selected!</h3>";
    exit;
}

$id = $_GET['id'];

// Fetch product from database
$query = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "<h3 class='text-center mt-5 text-danger'>Product not found!</h3>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $row['name']; ?> | CraftNest</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/Main.css">
    <link rel="stylesheet" href="../CSS/product.css">
    <style>
        .product-image-card {
            background: #fff;
            border: 1px solid #e6d8c3;
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-image-card img {
            max-height: 350px;
            width: 100%;
            object-fit: contain;
            border-radius: 12px;
        }

        .product-details-card {
            background: #fff;
            border: 1px solid #e6d8c3;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        }

        .product-details-card h2 {
            color: #3D5229;
            font-weight: 700;
        }

        .product-details-card p {
            color: #444;
            font-size: 1rem;
        }

        .price-box {
            background: #f7efe2;
            border-left: 6px solid #a17432;
            padding: 10px 15px;
            margin: 15px 0;
            border-radius: 12px;
        }

        .price-box h4 {
            color: #9e5e40;
            margin: 0;
        }

        .btn-buy {
            background-color: #9e5e40 !important;
            color: #fff !important;
            border-radius: 8px;
            padding: 10px 20px;
            transition: none !important;
        }

        .btn-buy:hover {
            background-color: #9e5e40 !important;
            color: #fff !important;
        }

        .details-section-title {
            font-weight: bold;
            color: #3D5229;
            margin-top: 25px;
        }

        /* PRODUCT DETAILS PAGE TITLE */
        .product-title-heading {
            font-size: 2.2rem;
            font-weight: 700;
            color: #3D5229;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .heading-divider {
            width: 120px;
            height: 4px;
            background: #a17432;
            margin: 10px auto 0;
            border-radius: 2px;
        }

        /* SIMILAR PRODUCTS TITLE */
        .similar-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #3D5229;
        }

        .heading-divider-small {
            width: 90px;
            height: 3px;
            background: #a17432;
            margin: 8px auto;
            border-radius: 2px;
        }

        /* SIMILAR PRODUCTS CARD */
        .similar-card {
            border: 1px solid #e6d8c3;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .similar-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .similar-card img {
            height: 180px;
            object-fit: cover;
            width: 100%;
        }

        .similar-card .card-body h6 {
            font-weight: 600;
            color: #3D5229;
        }

        .similar-card .card-body p {
            color: #9e5e40;
            font-weight: bold;
        }

        .similar-card .btn {
            border-color: #a17432;
            color: #a17432;
            border-radius: 6px;
        }

        .similar-card .btn:hover {
            background: #a17432;
            color: #fff;
        }

        #productSlider img {
            max-height: 350px;
            object-fit: contain;
            border-radius: 12px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(60%) sepia(20%) saturate(500%) hue-rotate(20deg);
        }
    </style>
</head>

<body style="margin-top:120px;">

    <div class="text-center mb-5">
        <h2 class="product-title-heading">Product Details</h2>
        <div class="heading-divider"></div>
    </div>

    <div class="container">
        <div class="row g-4">

            <!-- LEFT SIDE IMAGE -->
            <div class="col-md-5">
                <div id="productSlider" class="carousel slide product-image-card" data-bs-ride="carousel">

                    <!-- SLIDES -->
                    <div class="carousel-inner">

                        <?php if ($row['image']) { ?>
                            <div class="carousel-item active">
                                <img src="../Pages/PUploads/<?= $row['image']; ?>" class="d-block w-100">
                            </div>
                        <?php } ?>

                        <?php if ($row['image2']) { ?>
                            <div class="carousel-item">
                                <img src="../Pages/PUploads/<?= $row['image2']; ?>" class="d-block w-100">
                            </div>
                        <?php } ?>

                        <?php if ($row['image3']) { ?>
                            <div class="carousel-item">
                                <img src="../Pages/PUploads/<?= $row['image3']; ?>" class="d-block w-100">
                            </div>
                        <?php } ?>

                        <?php if ($row['image4']) { ?>
                            <div class="carousel-item">
                                <img src="../Pages/PUploads/<?= $row['image4']; ?>" class="d-block w-100">
                            </div>
                        <?php } ?>

                    </div>

                    <!-- CONTROLS -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#productSlider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#productSlider" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>

                </div>
            </div>

            <!-- RIGHT SIDE DETAILS -->
            <div class="col-md-7">
                <div class="product-details-card">

                    <h2><?= $row['name']; ?></h2>
                    <p class="text-muted">Handcrafted Product</p>

                    <!-- Price -->
                    <div class="price-box">
                        <h4>₹<?= number_format($row['price'], 2); ?></h4>
                    </div>

                    <p><b>Description: </b>
                        <br>
                        <?= nl2br($row['description']); ?>
                    </p>

                    <!-- Add to cart -->
                    <div class="mt-4 d-flex gap-3">
                        <input type="number" value="1" min="1" class="form-control" style="width:80px;">
                        <form action="add_to_cart.php" method="POST">
                            <input type="hidden" name="product_id" value="<?= $row['id']; ?>">
                            <input type="hidden" name="price" value="<?= $row['price']; ?>">
                            <button class="btn btn-buy">Add to Cart</button>
                        </form>
                    </div>

                    <!-- Extra info -->
                    <div class="mt-4">
                        <p class="details-section-title">Why You'll Love This</p>
                        <ul style="color:#444;">
                            <li>100% Handmade</li>
                            <li>Eco-friendly material</li>
                            <li>Premium artisan quality</li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>

        <!-- Customer Love -->
        <section class="py-5 bg-beige text-center">
            <div class="container">
                <!-- Decorative Heading (Customers) -->
                <div class="heading-deco-alt">
                    <svg class="wave-line" viewBox="0 0 180 20" aria-hidden="true">
                        <path d="M0 10 Q30 0, 60 10 T120 10 T180 10"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>

                    <div class="icon-wrap">
                        <i class="fas fa-heart"></i>
                    </div>

                    <svg class="wave-line mirror" viewBox="0 0 180 20" aria-hidden="true">
                        <path d="M0 10 Q30 0, 60 10 T120 10 T180 10"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>

                <h2 class="mb-4 text-uppercase customer-heading">Our Customers Love Us</h2>

                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <blockquote class="blockquote">
                                <p>"Absolutely stunning! The quality is unmatched."</p>
                                <footer class="blockquote-footer">Priya Shah</footer>
                            </blockquote>
                        </div>
                        <div class="carousel-item">
                            <blockquote class="blockquote">
                                <p>"Beautiful craftsmanship. A piece to treasure forever."</p>
                                <footer class="blockquote-footer">Rahul Mehta</footer>
                            </blockquote>
                        </div>
                        <div class="carousel-item">
                            <blockquote class="blockquote">
                                <p>"Fast delivery and the product exceeded my expectations."</p>
                                <footer class="blockquote-footer">Anjali Verma</footer>
                            </blockquote>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Similar Products (Simple) -->
        <div class="mt-5">

            <div class="text-center my-4">
                <h3 class="similar-title">Similar Products</h3>
                <div class="heading-divider-small"></div>
            </div>

            <div class="row g-3">

                <?php
                // Fetch 4 random products except current product
                $similar = mysqli_query(
                    $conn,
                    "SELECT * FROM products WHERE id != $id ORDER BY RAND() LIMIT 4"
                );

                while ($sim = mysqli_fetch_assoc($similar)) {
                ?>
                    <div class="col-6 col-md-3">
                        <div class="similar-card">
                            <img src="../Pages/PUploads/<?= $sim['image']; ?>" class="card-img-top">
                            <div class="card-body text-center">
                                <h6><?= $sim['name']; ?></h6>
                                <p class="text-success">₹<?= $sim['price']; ?></p>
                                <a href="productdetails.php?id=<?= $sim['id']; ?>" class="btn btn-sm btn-outline-brown">View</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    </div>

    <?php include 'footer.php'; ?>

</body>

</html>