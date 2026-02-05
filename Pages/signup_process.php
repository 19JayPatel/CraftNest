<?php
session_start();
include 'connection.php'; // DB connection

// Only run on POST request
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: signup.php");
    exit;
}

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$confirm_password = trim($_POST['confirm_password']);

$error = "";
$success = "";

// =========================
// 1) Password Match Check
// =========================
if ($password !== $confirm_password) {
    $error = "Passwords do not match!";
}

// =========================
// 2) Duplicate Email Check
// =========================
if ($error === "") {
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $error = "This email is already registered!";
    }
    $check->close();
}

// =========================
// 4) Insert User If No Errors
// =========================
if ($error === "") {

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        $success = "Signup successful! You can now login.";
    } else {
        $error = "Something went wrong, please try again.";
    }

    $stmt->close();
}

$conn->close();

// =========================
// Save Messages in Session
// =========================

$_SESSION['signup_error'] = $error;
$_SESSION['signup_success'] = $success;

// Redirect back to signup page
header("Location: signup.php");
exit;
