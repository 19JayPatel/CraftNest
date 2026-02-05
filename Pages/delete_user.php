<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: adminlogin.php");
    exit;
}

include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM users WHERE id = $id");
}

header("Location: manageuser.php");
exit;
?>
