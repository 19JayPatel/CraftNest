<?php
session_start();
require 'connection.php';
header('Content-Type: application/json');

if (!isset($_POST['cart_id']) || !isset($_POST['quantity'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
    exit;
}

$cart_id = (int) $_POST['cart_id'];
$quantity = (int) $_POST['quantity'];
if ($quantity < 1) $quantity = 1;
if ($quantity > 10) $quantity = 10;

// Update cart row
$update = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
$update->bind_param("ii", $quantity, $cart_id);
$ok = $update->execute();
$update->close();

if (!$ok) {
    echo json_encode(['success' => false, 'message' => 'DB update failed']);
    exit;
}

// Recalculate the subtotal for this cart row and grand total
$calc = $conn->prepare("
    SELECT c.quantity, c.price, p.price AS product_price
    FROM cart c
    LEFT JOIN products p ON c.product_id = p.id
    WHERE c.id = ?
");
$calc->bind_param("i", $cart_id);
$calc->execute();
$res = $calc->get_result();
if ($res && $res->num_rows === 1) {
    $row = $res->fetch_assoc();
    $price = (float) ($row['price'] && $row['price'] > 0 ? $row['price'] : $row['product_price']);
    $subtotal = $price * (int)$row['quantity'];
} else {
    echo json_encode(['success' => false, 'message' => 'Row not found']);
    exit;
}
$calc->close();

// Grand total for the user
$userCalc = $conn->prepare("
    SELECT SUM((CASE WHEN c.price > 0 THEN c.price ELSE p.price END) * c.quantity) AS grand_total
    FROM cart c
    LEFT JOIN products p ON c.product_id = p.id
    WHERE c.user_id = (
        SELECT user_id FROM cart WHERE id = ?
    )
");
$userCalc->bind_param("i", $cart_id);
$userCalc->execute();
$res2 = $userCalc->get_result();
$total = 0.00;
if ($res2 && $res2->num_rows > 0) {
    $r2 = $res2->fetch_assoc();
    $total = (float) $r2['grand_total'];
}
$userCalc->close();

echo json_encode([
    'success' => true,
    'subtotal' => number_format($subtotal, 2),
    'total' => number_format($total, 2)
]);
exit;
