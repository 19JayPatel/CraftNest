<?php
include 'connection.php';
include 'header.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    echo "<h3 class='text-center mt-5 text-danger'>Please login to view your cart.</h3>";
    include 'footer.php';
    exit;
}

$user_id = (int) $_SESSION['user_id'];

// Fetch cart items (including product id)
$sql = "
    SELECT c.id AS cart_id, c.quantity, c.price AS cart_price, 
           p.id AS product_id, p.name, p.price AS product_price, p.image 
    FROM cart c
    JOIN products p ON c.product_id = p.id
    WHERE c.user_id = $user_id
";
$q = mysqli_query($conn, $sql);

if ($q === false) {
    // Query failed — show error for debugging (remove on production)
    echo "<div class='container mt-5'><div class='alert alert-danger'>Database error: " . mysqli_error($conn) . "</div></div>";
    include 'footer.php';
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Your Cart | CraftNest</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f4ea;
        }

        .cart-table {
            background: white;
            padding: 20px;
            border-radius: 14px;
            border: 1px solid #e6d8c3;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.10);
        }

        .cart-img {
            width: 70px;
            height: 70px;
            object-fit: contain;
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 5px;
            background: #fff;
        }

        .btn-remove {
            background-color: #9e5e40 !important;
            color: #fff !important;
            border-radius: 8px;
            padding: 6px 14px;
            font-size: 14px;
            border: none;
        }

        .btn-remove:hover {
            background-color: #704b1d !important;
            color: #fff !important;
        }

        .total-box {
            background: #fff7ec;
            border: 1px solid #e6d8c3;
            padding: 15px;
            border-radius: 12px;
            font-size: 18px;
            font-weight: bold;
            text-align: right;
            color: #3D5229;
        }

        .btn-checkout {
            background-color: #9e5e40 !important;
            color: #fff !important;
            border-radius: 10px;
            padding: 12px 25px;
            font-size: 18px;
            font-weight: bold;
            margin-top: 25px;
        }

        .btn-checkout:hover {
            background-color: #704b1d !important;
            color: #fff !important;
        }

        /* Responsive table for mobile */
        @media (max-width: 768px) {
            .cart-table table thead {
                display: none;
            }

            .cart-table table tbody tr {
                display: block;
                margin-bottom: 18px;
                border: 1px solid #e6d8c3;
                padding: 10px;
                border-radius: 12px;
            }

            .cart-table table td {
                display: flex;
                justify-content: space-between;
                padding: 8px 5px;
                font-size: 15px;
            }

            .cart-table table td img {
                width: 60px;
                height: 60px;
            }
        }
    </style>
</head>

<body style="margin-top:120px;">
    <div class="container">
        <h2 class="text-center mb-4">Your Cart</h2>

        <div class="cart-table table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Image</th>
                        <th>Price (₹)</th>
                        <th>Quantity</th>
                        <th>Subtotal (₹)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $grand_total = 0.00;

                    if (mysqli_num_rows($q) > 0) {
                        while ($item = mysqli_fetch_assoc($q)) {

                            // prefer price stored in cart if exists, otherwise use product price
                            $price = isset($item['cart_price']) && $item['cart_price'] > 0 ? (float)$item['cart_price'] : (float)$item['product_price'];
                            $quantity = (int)$item['quantity'];
                            $subtotal = $price * $quantity;
                            $grand_total += $subtotal;
                    ?>
                            <tr data-cart-id="<?= (int)$item['cart_id']; ?>">
                                <td><?= htmlspecialchars($item['name']); ?></td>

                                <td>
                                    <img src="../Pages/PUploads/<?= htmlspecialchars($item['image']); ?>" class="cart-img" alt="">
                                </td>

                                <td class="price-cell"><?= number_format($price, 2); ?></td>

                                <td>
                                    <select class="form-select quantity-select" data-cart-id="<?= (int)$item['cart_id']; ?>">
                                        <?php for ($i = 1; $i <= 10; $i++): ?>
                                            <option value="<?= $i; ?>" <?= ($i === $quantity) ? 'selected' : ''; ?>>
                                                <?= $i; ?>
                                            </option>
                                        <?php endfor; ?>
                                    </select>
                                </td>

                                <td class="subtotal-cell">₹<?= number_format($subtotal, 2); ?></td>

                                <td>
                                    <a href="remove_cart.php?id=<?= (int)$item['cart_id']; ?>" class="btn btn-remove"
                                        onclick="return confirm('Remove this item?');">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                    <?php
                        } // end while
                    } else {
                        echo "<tr><td colspan='6' class='text-center text-danger'>Your cart is empty!</td></tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>

        <!-- Grand total section -->
        <div class="mt-3">
            <div class="total-box">
                Grand Total: <span id="grandTotal">₹<?= number_format($grand_total, 2); ?></span>
            </div>
            <!-- Checkout Button -->
            <div class="text-end">
                <a href="checkout.php" class="btn btn-checkout">Proceed to Checkout</a>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        // Attach change listeners to quantity selects
        document.querySelectorAll('.quantity-select').forEach(select => {
            select.addEventListener('change', function() {
                const cartId = this.getAttribute('data-cart-id');
                const qty = this.value;

                // simple validation
                const qInt = parseInt(qty);
                if (isNaN(qInt) || qInt < 1 || qInt > 10) return;

                // POST via fetch
                fetch('update_cart.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: `cart_id=${encodeURIComponent(cartId)}&quantity=${encodeURIComponent(qInt)}`
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            // update subtotal for this row
                            const row = document.querySelector('tr[data-cart-id="' + cartId + '"]');
                            row.querySelector('.subtotal-cell').textContent = '₹' + data.subtotal;
                            // update grand total
                            document.getElementById('grandTotal').textContent = '₹' + data.total;
                        } else {
                            alert(data.message || 'Could not update cart.');
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alert('Network error.');
                    });
            });
        });
    </script>
</body>

</html>