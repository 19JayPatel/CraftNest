<?php
include 'header.php';

if (!isset($_SESSION['order_success'])) {
    header("Location: index.php");
    exit;
}

$message = $_SESSION['order_success'];
unset($_SESSION['order_success']);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Order Successful</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<body style="margin-top:120px;">
    <div class="container text-center">
        <h2 class="text-success mb-3">🎉 Order Successful!</h2>
        <p class="lead"><?= $message ?></p>

        <a href="product.php" class="btn btn-success mt-3">Continue Shopping</a>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>