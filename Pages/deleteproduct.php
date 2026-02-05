<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}

include 'connection.php';

// Check product ID
if (!isset($_GET['id'])) {
    die("Invalid request!");
}

$id = (int)$_GET['id'];

// Fetch product first (to delete images also)
$result = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");

if (mysqli_num_rows($result) != 1) {
    die("Product not found!");
}

$product = mysqli_fetch_assoc($result);

// Delete images if exist
function deleteImage($fileName)
{
    if ($fileName && file_exists("PUploads/" . $fileName)) {
        unlink("PUploads/" . $fileName);   // delete from folder
    }
}

deleteImage($product['image']);
deleteImage($product['image2']);
deleteImage($product['image3']);
deleteImage($product['image4']);

// Delete product from DB
mysqli_query($conn, "DELETE FROM products WHERE id = $id");

// Redirect with message
header("Location: addproduct.php?msg=deleted");
exit;
