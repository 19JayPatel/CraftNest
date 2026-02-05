<?php

session_start();
include 'connection.php';
include 'header.php';

// Pagination setup
$limit = 8; // products per page

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $limit;

// Count total products
$totalResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM products");
$totalRow = mysqli_fetch_assoc($totalResult);
$totalProducts = $totalRow['total'];

$totalPages = ceil($totalProducts / $limit);

// Fetch products for this page
$query = "SELECT * FROM products LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);
?>

<?php if (isset($_SESSION['cart_success'])): ?>
    <div class="alert alert-success"><?= $_SESSION['cart_success']; ?></div>
    <?php unset($_SESSION['cart_success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['cart_error'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['cart_error']; ?></div>
    <?php unset($_SESSION['cart_error']); ?>
<?php endif; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CraftNest | Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../CSS/Main.css">
    <link rel="stylesheet" href="../CSS/product.css">

    <style>
        /* PERFECT SQUARE PAGINATION */
        .pagination {
            gap: 10px;
            /* space between squares */
        }

        .pagination .page-item .page-link {
            width: 42px;
            /* square width */
            height: 42px;
            /* square height */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            border-radius: 8px;

            color: #9e5e40;
            border: 1px solid #d5c4a5;
            font-weight: 600;
            background: #fff;
            font-size: 16px;
        }

        .pagination .page-item.active .page-link {
            background-color: #9e5e40;
            color: #fff;
            border-color: #9e5e40;
        }

        .pagination .page-link:hover {
            background-color: #3D5229;
            color: #fff;
            border-color: #3D5229;
        }
    </style>
</head>

<body>

    <!-- Product Page Hero Banner -->
    <section class="hero-banner d-flex align-items-center justify-content-center text-center">
        <div class="container">
            <h1 class="banner-title">Our Products</h1>
            <p class="banner-subtitle">Handcrafted with Passion • Inspired by Tradition</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container text-center">

            <div class="heading-deco">
                <svg class="deco-line" viewBox="0 0 220 20">
                    <path d="M0,10 H170" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    <path d="M170,10 C178,6 186,6 194,10 C186,14 178,14 170,10 Z" fill="currentColor" opacity=".25" />
                    <path d="M195,10 C200,6 208,6 214,10 C208,14 200,14 195,10 Z" fill="currentColor" opacity=".15" />
                </svg>

                <h2 class="mb-4 text-uppercase heading-text">Handcrafted Products</h2>

                <svg class="deco-line mirror" viewBox="0 0 220 20">
                    <path d="M0,10 H170" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    <path d="M170,10 C178,6 186,6 194,10 C186,14 178,14 170,10 Z" fill="currentColor" opacity=".25" />
                    <path d="M195,10 C200,6 208,6 214,10 C208,14 200,14 195,10 Z" fill="currentColor" opacity=".15" />
                </svg>
            </div>

            <div class="row g-4">

                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="product-card">
                                <img src="../Pages/PUploads/<?= htmlspecialchars($row['image']); ?>"
                                    alt="<?= htmlspecialchars($row['name']); ?>"
                                    class="product-img">

                                <div class="product-body text-start">
                                    <div class="product-title"><?= htmlspecialchars($row['name']); ?></div>

                                    <div class="product-price">₹<?= number_format($row['price'], 2); ?></div>

                                    <p style="font-size: 14px;">
                                        <?php
                                        $short = substr($row['description'], 0, 50);
                                        echo htmlspecialchars($short) . '...';
                                        ?>
                                    </p>

                                    <a href="productdetails.php?id=<?= $row['id']; ?>"
                                        class="btn btn-sm btn-outline-brown me-2">View</a>

                                    <form action="add_to_cart.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="product_id" value="<?= $row['id']; ?>">
                                        <input type="hidden" name="price" value="<?= $row['price']; ?>">
                                        <button type="submit" class="btn btn-sm btn-outline-brown">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p>No products found.</p>";
                }
                ?>

            </div>

            <!-- PAGINATION -->
            <nav aria-label="Page navigation example" class="mt-4">
                <ul class="pagination justify-content-center">

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php endfor; ?>

                </ul>
            </nav>

        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>