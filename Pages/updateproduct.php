<?php
session_start();

// If admin is not logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}

include 'connection.php';

$msg = "";

// Check product ID
if (!isset($_GET['id'])) {
    die("Product ID missing!");
}

$id = (int)$_GET['id'];

// Fetch existing product
$query = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) !== 1) {
    die("Product not found!");
}

$product = mysqli_fetch_assoc($result);

// Handle update request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = trim($_POST['name']);
    $price = $_POST['price'];
    $description = trim($_POST['description']);

    // IMAGE UPLOAD FUNCTION
    function updateImage($fieldName, $oldImage)
    {
        if (!empty($_FILES[$fieldName]['name'])) {
            $file = $_FILES[$fieldName]['name'];
            $tmp  = $_FILES[$fieldName]['tmp_name'];
            $path = "PUploads/" . basename($file);

            if (move_uploaded_file($tmp, $path)) {
                return $file;
            }
        }
        return $oldImage; // keep old image if no new upload
    }

    // Update images
    $image  = updateImage("image",  $product['image']);
    $image2 = updateImage("image2", $product['image2']);
    $image3 = updateImage("image3", $product['image3']);
    $image4 = updateImage("image4", $product['image4']);

    // Update query
    $stmt = $conn->prepare(
        "UPDATE products SET name=?, price=?, description=?, image=?, image2=?, image3=?, image4=? WHERE id=?"
    );
    $stmt->bind_param("sdsssssi", $name, $price, $description, $image, $image2, $image3, $image4, $id);

    if ($stmt->execute()) {
        $msg = "Product updated successfully!";
        // refresh product data
        $product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id=$id"));
    } else {
        $msg = "Database error!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Product | Admin</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f4ea;
            font-family: 'Segoe UI', sans-serif;
        }

        .form-container {
            max-width: 650px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .preview-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #d5c4a5;
            margin-bottom: 10px;
        }

        .btn-brown {
            background-color: #9e5e40;
            color: #fff;
        }

        .btn-brown:hover {
            background-color: #3D5229;
        }
    </style>
</head>

<body>

    <div class="form-container">

        <h4 class="text-center mb-4" style="color:#3D5229;">Update Product</h4>

        <?php if ($msg): ?>
            <div class="alert alert-info"><?= $msg ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">

            <label class="form-label">Product Name</label>
            <input type="text" name="name" value="<?= $product['name']; ?>" class="form-control mb-3" required>

            <label class="form-label">Price (INR)</label>
            <input type="number" name="price" value="<?= $product['price']; ?>" class="form-control mb-3" required>

            <label class="form-label">Description</label>
            <textarea name="description" rows="3"
                class="form-control mb-3"><?= $product['description']; ?></textarea>

            <!-- IMAGE 1 -->
            <label class="form-label">Main Image</label><br>
            <img src="PUploads/<?= $product['image']; ?>" class="preview-img"><br>
            <input type="file" name="image" class="form-control mb-3">

            <!-- IMAGE 2 -->
            <label class="form-label">Extra Image 1</label><br>
            <?php if ($product['image2']) { ?>
                <img src="PUploads/<?= $product['image2']; ?>" class="preview-img"><br>
            <?php } ?>
            <input type="file" name="image2" class="form-control mb-3">

            <!-- IMAGE 3 -->
            <label class="form-label">Extra Image 2</label><br>
            <?php if ($product['image3']) { ?>
                <img src="PUploads/<?= $product['image3']; ?>" class="preview-img"><br>
            <?php } ?>
            <input type="file" name="image3" class="form-control mb-3">

            <!-- IMAGE 4 -->
            <label class="form-label">Extra Image 3</label><br>
            <?php if ($product['image4']) { ?>
                <img src="PUploads/<?= $product['image4']; ?>" class="preview-img"><br>
            <?php } ?>
            <input type="file" name="image4" class="form-control mb-3">

            <button type="submit" class="btn btn-brown w-100">Update Product</button>

        </form>
    </div>

</body>

</html>