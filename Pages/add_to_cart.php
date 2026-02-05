<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['cart_error'] = "Please login to add items to cart!";
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];
$price = $_POST['price'];
$qty = 1;

// Check if product already exists in cart
$check = $conn->prepare("SELECT id, quantity FROM cart WHERE user_id=? AND product_id=?");
$check->bind_param("ii", $user_id, $product_id);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    // Increase quantity
    $row = $result->fetch_assoc();
    $newQty = $row['quantity'] + 1;

    $update = $conn->prepare("UPDATE cart SET quantity=? WHERE id=?");
    $update->bind_param("ii", $newQty, $row['id']);
    $update->execute();
} else {
    // Insert new cart item
    $insert = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    $insert->bind_param("iiid", $user_id, $product_id, $qty, $price);
    $insert->execute();
}

$_SESSION['cart_success'] = "Item added to cart!";
header("Location: product.php");
exit;
