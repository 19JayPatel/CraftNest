<?php
session_start();
require 'connection.php';

$error = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Login form values
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!$conn) {   // your DB variable is $conn (not $con)
        $_SESSION['login_error'] = "Database connection error!";
        header("Location: login.php");
        exit;
    }

    // Prepare statement
    $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {

        $stmt->bind_result($id, $db_username, $db_email, $db_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $db_password)) {

            // SUCCESS
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $db_username;
            $_SESSION['email'] = $db_email;

            header("Location: index.php");
            exit();
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "Email not found!";
    }

    $stmt->close();
    $conn->close();
}

// Store error & go back to login
$_SESSION['login_error'] = $error;
header("Location: login.php");
exit();
