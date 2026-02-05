<?php
session_start();
include 'connection.php';

// User must be logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Form must be submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: checkout.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$fullname = trim($_POST['fullname']);
$email = trim($_POST['email']);
$mobile = trim($_POST['mobile']);
$address = trim($_POST['address']);
$total_amount = $_POST['total_amount'];

// Fetch user cart
$cartQuery = mysqli_query($conn, "
    SELECT c.product_id, c.quantity, p.price 
    FROM cart c
    JOIN products p ON c.product_id = p.id
    WHERE c.user_id = $user_id
");

if (mysqli_num_rows($cartQuery) == 0) {
    echo "<h3 class='text-center mt-5 text-danger'>Your cart is empty!</h3>";
    exit;
}

// 1️⃣ INSERT ORDER
$stmt = $conn->prepare("
    INSERT INTO orders (user_id, fullname, email, mobile, address, total_amount)
    VALUES (?, ?, ?, ?, ?, ?)
");
$stmt->bind_param("issssd", $user_id, $fullname, $email, $mobile, $address, $total_amount);
$stmt->execute();

$order_id = $stmt->insert_id;  // Last order ID
$stmt->close();

// 2️⃣ INSERT ORDER ITEMS
$itemStmt = $conn->prepare("
    INSERT INTO order_items (order_id, product_id, quantity, price)
    VALUES (?, ?, ?, ?)
");

while ($row = mysqli_fetch_assoc($cartQuery)) {
    $product_id = $row['product_id'];
    $quantity = $row['quantity'];
    $price = $row['price'];

    $itemStmt->bind_param("iiid", $order_id, $product_id, $quantity, $price);
    $itemStmt->execute();
}

$itemStmt->close();

// 3️⃣ CLEAR CART
mysqli_query($conn, "DELETE FROM cart WHERE user_id = $user_id");

// 4️⃣ Redirect to success page
$_SESSION['order_success'] = "Your order has been placed successfully!";
header("Location: order_success.php?order_id=" . $order_id);
exit;
