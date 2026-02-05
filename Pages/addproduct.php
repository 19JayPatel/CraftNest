<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}

include 'connection.php';
$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = trim($_POST['name']);
    $price = $_POST['price'];
    $description = trim($_POST['description']);

    function uploadImage($fileInputName)
    {
        if (!empty($_FILES[$fileInputName]['name'])) {
            $fileName = $_FILES[$fileInputName]['name'];
            $tmpName  = $_FILES[$fileInputName]['tmp_name'];
            $path = "PUploads/" . basename($fileName);

            if (move_uploaded_file($tmpName, $path)) {
                return $fileName;
            }
        }
        return "";
    }

    $image  = uploadImage("image");
    $image2 = uploadImage("image2");
    $image3 = uploadImage("image3");
    $image4 = uploadImage("image4");

    $stmt = $conn->prepare(
        "INSERT INTO products (name, price, description, image, image2, image3, image4)
         VALUES (?, ?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param("sdsssss", $name, $price, $description, $image, $image2, $image3, $image4);

    if ($stmt->execute()) {
        $msg = "Product added successfully!";
    } else {
        $msg = "Database error: " . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Product | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f4ea;
            font-family: 'Segoe UI', sans-serif;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            font-weight: 500;
            color: #3D5229;
        }

        .btn-brown {
            background-color: #9e5e40;
            color: #fff;
        }

        .btn-brown:hover {
            background-color: #3D5229;
        }

        table img {
            border: 1px solid #d5c4a5;
            background: #fff;
        }

        .table thead th {
            text-align: center;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h4 class="mb-4 text-center" style="color:#3D5229;">Add New Product</h4>

        <?php if ($msg): ?>
            <div class="alert alert-info"><?= $msg ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price (INR)</label>
                <input type="number" name="price" step="0.01" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="3" class="form-control"></textarea>
            </div>

            <!-- MULTIPLE IMAGES -->
            <div class="mb-3">
                <label class="form-label">Main Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Extra Image 1</label>
                <input type="file" name="image2" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Extra Image 2</label>
                <input type="file" name="image3" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Extra Image 3</label>
                <input type="file" name="image4" class="form-control">
            </div>

            <button type="submit" class="btn btn-brown w-100">Add Product</button>
        </form>
    </div>

    <!-- SHOW ALL PRODUCTS IN TABLE FORMAT -->
    <div class="container mt-5 mb-5">
        <h4 class="text-center mb-4" style="color:#3D5229;">All Products</h4>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead style="background:#3D5229; color:white;">
                    <tr>
                        <th width="80">Image</th>
                        <th>Name</th>
                        <th width="120">Price</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $products = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
                    while ($p = mysqli_fetch_assoc($products)) {
                    ?>
                        <tr>
                            <td>
                                <img src="PUploads/<?= $p['image']; ?>"
                                    style="width:60px; height:60px; object-fit:cover; border-radius:6px;">
                            </td>

                            <td><?= htmlspecialchars($p['name']); ?></td>

                            <td>₹<?= number_format($p['price'], 2); ?></td>

                            <td>
                                <a href="updateproduct.php?id=<?= $p['id']; ?>"
                                    class="btn btn-sm btn-warning">Update</a>

                                <a href="deleteproduct.php?id=<?= $p['id']; ?>"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this product?');">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>


</body>

</html>