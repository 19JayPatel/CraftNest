<?php
session_start();
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | CraftNest</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/Main.css">

    <style>
        body {
            background-color: #f5f5dc;
            font-family: 'Lora', serif;
        }

        .login-wrapper {
            max-width: 900px;
            margin: 140px auto;
            display: flex;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.12);
            overflow: hidden;
            border: 1px solid #e6d8c3;
        }

        /* Left section - image or text */
        .login-left {
            width: 45%;
            background-image: url('../Images/banner3.png');
            background-size: cover;
            background-position: center;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 26px;
            font-weight: 700;
            text-align: center;
        }

        .login-right {
            width: 55%;
            padding: 40px;
        }

        .login-title {
            font-size: 28px;
            font-weight: 700;
            color: #3D5229;
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 12px;
            border: 1px solid #d7cbb3;
            padding: 10px 14px;
        }

        .form-control:focus {
            border-color: #9e5e40;
            box-shadow: 0 0 8px rgba(158, 94, 64, 0.35);
        }

        .btn-login {
            width: 100%;
            background-color: #9e5e40 !important;
            color: #fff !important;
            border-radius: 12px;
            padding: 10px;
            font-size: 17px;
        }

        .btn-login:hover {
            background-color: #704b1d !important;
            color: #fff !important;
        }

        .login-right a {
            color: #9e5e40;
            font-weight: 600;
        }

        .login-right a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media(max-width: 768px) {
            .login-wrapper {
                flex-direction: column;
            }

            .login-left,
            .login-right {
                width: 100%;
            }

            .login-left {
                height: 200px;
            }
        }
    </style>
</head>

<body>

    <div class="login-wrapper">

        <!-- Left image/text block -->
        <div class="login-left">
            Welcome Back to CraftNest
        </div>

        <!-- Right side login form -->
        <div class="login-right">

            <h2 class="login-title">Hello, </h2>

            <!-- PHP error message -->
            <?php if (isset($_SESSION['login_error'])): ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['login_error'];
                    unset($_SESSION['login_error']); ?>
                </div>
            <?php endif; ?>

            <!-- JS Error -->
            <p id="jsErrorMessage" style="color:red;"></p>

            <form method="POST" action="login_process.php" onsubmit="return validateSignin();">

                <div class="mb-3">
                    <label>Email Address</label>
                    <input type="text" id="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-login">Login</button>

                <p class="mt-3 text-center">
                    Don't have an account? <a href="signup.php">Sign Up</a>
                </p>
            </form>

        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="../login.js"></script>

</body>

</html>