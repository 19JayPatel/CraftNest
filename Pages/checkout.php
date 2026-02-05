<?php
include 'connection.php';
include 'header.php';

// Redirect if user not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = (int)$_SESSION['user_id'];

// Fetch cart data
$cartQuery = mysqli_query($conn, "
    SELECT c.id AS cart_id, c.quantity, 
           p.id AS product_id, p.name, p.price, p.image 
    FROM cart c
    JOIN products p ON c.product_id = p.id
    WHERE c.user_id = $user_id
");

if (mysqli_num_rows($cartQuery) == 0) {
    echo "<h3 class='text-center mt-5 text-danger'>Your cart is empty!</h3>";
    include 'footer.php';
    exit;
}

// Calculate totals
$grand_total = 0;
$items = [];
while ($row = mysqli_fetch_assoc($cartQuery)) {
    $row['subtotal'] = $row['price'] * $row['quantity'];
    $grand_total += $row['subtotal'];
    $items[] = $row;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Checkout | CraftNest</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f4ea;
        }

        .checkout-box {
            background: white;
            padding: 25px;
            border-radius: 16px;
            border: 1px solid #e6d8c3;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.10);
        }

        .checkout-title {
            color: #3D5229;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .order-summary {
            background: #fff7ec;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #e6d8c3;
        }

        .btn-order {
            background-color: #9e5e40 !important;
            color: white !important;
            border-radius: 10px;
            padding: 12px;
            font-size: 18px;
            width: 100%;
        }

        .btn-order:hover {
            background-color: #704b1d;
            color: white;
        }

        .summary-img {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }
    </style>
</head>

<body style="margin-top:120px;">

    <div class="container py-4">

        <h2 class="text-center checkout-title">Checkout</h2>

        <div class="row g-4">

            <!-- Billing Form -->
            <div class="col-md-7">
                <div class="checkout-box">

                    <h4 class="mb-3">Billing Details</h4>

                    <form method="POST" action="place_order.php">

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="fullname" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control"
                                value="<?= $_SESSION['email'] ?? '' ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mobile Number</label>
                            <input type="text" name="mobile" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="3" required></textarea>
                        </div>

                        <input type="hidden" name="total_amount" value="<?= $grand_total; ?>">

                        <button type="submit" class="btn btn-order mt-3">Place Order</button>

                    </form>

                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-md-5">
                <div class="order-summary">

                    <h4 class="mb-3">Order Summary</h4>

                    <?php foreach ($items as $product): ?>
                        <div class="d-flex align-items-center mb-3">
                            <img src="../Pages/PUploads/<?= $product['image']; ?>" class="summary-img me-3">
                            <div>
                                <strong><?= $product['name']; ?></strong><br>
                                Qty: <?= $product['quantity']; ?>
                            </div>
                            <div class="ms-auto">
                                ₹<?= number_format($product['subtotal'], 2); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <hr>
                    <div class="d-flex justify-content-between">
                        <strong>Total Amount:</strong>
                        <strong>₹<?= number_format($grand_total, 2); ?></strong>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <?php include 'footer.php'; ?>

</body>

</html>