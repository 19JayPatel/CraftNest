<?php
include 'connection.php';

$query = "
    SELECT o.id, o.fullname, o.email, o.mobile, o.address, 
           o.total_amount, o.order_date,
           u.username
    FROM orders o
    LEFT JOIN users u ON o.user_id = u.id
    ORDER BY o.id DESC
";

$orders = mysqli_query($conn, $query);

if (!$orders) {
    die("<div class='alert alert-danger'>SQL ERROR: " . mysqli_error($conn) . "</div>");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Orders</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="margin-top:120px;">
    <div class="container">
        <h2 class="mb-4">Manage Orders</h2>

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Username</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Total Amount (₹)</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($orders)) { ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['username']; ?></td>
                        <td><?= $row['fullname']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['mobile']; ?></td>
                        <td><?= $row['address']; ?></td>
                        <td>₹<?= number_format($row['total_amount'], 2); ?></td>
                        <td><?= $row['order_date']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>