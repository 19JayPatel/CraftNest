<?php
session_start();

// Redirect if admin not logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}

include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Users | Admin</title>

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/all.css">

    <style>
        body {
            background-color: #f8f4ea;
            font-family: 'Lora', serif;
        }

        .table-container {
            background: #fff;
            padding: 25px;
            border-radius: 14px;
            margin-top: 120px;
            border: 1px solid #e6d8c3;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.12);
        }

        .btn-delete {
            background-color: #9e5e40 !important;
            color: white !important;
            border-radius: 8px;
            padding: 6px 12px;
            font-size: 14px;
            border: none;
        }

        .btn-delete:hover {
            background-color: #704b1d !important;
            color: #fff !important;
        }

        h2 {
            color: #3D5229;
            font-weight: 700;
        }

        table th {
            background: #f0ebe2;
            color: #3D5229;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="table-container">
            <h2 class="mb-4">Manage Users</h2>

            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Joined On</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");

                    if (mysqli_num_rows($result) > 0) {
                        while ($user = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td><?= $user['id']; ?></td>
                                <td><?= htmlspecialchars($user['username']); ?></td>
                                <td><?= htmlspecialchars($user['email']); ?></td>
                                <td><?= $user['created_at']; ?></td>

                                <td>
                                    <a href="delete_user.php?id=<?= $user['id']; ?>"
                                        class="btn btn-delete"
                                        onclick="return confirm('Are you sure you want to delete this user?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center text-danger'>No users found!</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>