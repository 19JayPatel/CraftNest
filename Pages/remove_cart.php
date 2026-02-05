<?php
session_start();
require 'connection.php';

if (!isset($_GET['id'])) {
    header('Location: cart.php');
    exit;
}

$id = (int) $_GET['id'];

// optionally verify that this cart row belongs to the logged-in user
if (isset($_SESSION['user_id'])) {
    $user_id = (int) $_SESSION['user_id'];
    // delete only if owned by user
    $stmt = $conn->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $id, $user_id);
    $stmt->execute();
    $stmt->close();
} else {
    // no session — redirect to login
    header('Location: login.php');
    exit;
}

header('Location: cart.php');
exit;
