<?php
session_start();
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup | CraftNest</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/Main.css">

    <style>
        body {
            background-color: #f5f5dc;
            font-family: 'Lora', serif;
        }

        .signup-container {
            max-width: 450px;
            margin: 120px auto;
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.12);
            border: 1px solid #e6d8c3;
        }

        .signup-title {
            text-align: center;
            font-size: 26px;
            font-weight: 700;
            color: #3D5229;
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 12px;
            border: 1px solid #d7cbb3;
            padding: 10px 14px;
        }

        .form-control:focus {
            border-color: #9e5e40;
            box-shadow: 0 0 8px rgba(158, 94, 64, 0.3);
        }

        .btn-signup {
            background-color: #9e5e40 !important;
            color: #fff !important;
            border-radius: 12px;
            padding: 10px;
            font-size: 16px;
            border: none;
        }

        .btn-signup:hover {
            background-color: #704b1d !important;
            color: #fff !important;
        }
    </style>
</head>

<body>

    <div class="signup-container">

        <!-- Display server-side PHP messages -->
        <?php if (isset($_SESSION['signup_error'])): ?>
            <div class="alert alert-danger"><?= $_SESSION['signup_error'];
                                            unset($_SESSION['signup_error']); ?></div>
        <?php endif; ?>

        <?php if (isset($_SESSION['signup_success'])): ?>
            <div class="alert alert-success"><?= $_SESSION['signup_success'];
                                                unset($_SESSION['signup_success']); ?></div>
        <?php endif; ?>

        <!-- JS validation error -->
        <p id="jsErrorMessage" style="color:red;"></p>

        <h2 class="signup-title">Create Your Account</h2>

        <form method="POST" action="signup_process.php" enctype="multipart/form-data" onsubmit="return validateForm();">

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="text" id="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control">
            </div>

            <button type="submit" class="btn btn-signup w-100">Sign Up</button>

            <p class="text-center mt-3">
                Already have an account?
                <a href="login.php" style="color:#9e5e40;">Login</a>
            </p>
        </form>
    </div>

    <?php include 'footer.php'; ?>

    <script src="../signup.js"></script>
</body>

</html>