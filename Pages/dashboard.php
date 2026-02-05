<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel | CraftNest</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../CSS/dashboard.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-2 sidebar d-flex flex-column p-0">
                <h4 class="text-center py-3">CraftNest Admin</h4>
                <a href="../Pages/dashboard.php" class="active"><i class="fas fa-home me-2"></i>Dashboard</a>
                <a href="../Pages/addproduct.php"><i class="fas fa-box me-2"></i>Products</a>
                <a href="../Pages/manageuser.php"><i class="fas fa-user me-2"></i>Users</a>
                <a href="../Pages/manageorder.php"><i class="fas fa-receipt me-2"></i>Orders</a>
                <a href="../Pages/logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
            </div>

            <!-- Main content -->
            <div class="col-md-10 p-0">

                <!-- Top Bar -->
                <div class="topbar d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Dashboard Overview</h5>
                    <span>Welcome, Admin</span>
                </div>

                <div class="container py-4">

                    <!-- ========== STAT CARDS ========== -->
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card p-4 shadow-sm dash-card">
                                <h5><i class="fas fa-box text-warning me-2"></i>Total Products</h5>
                                <p class="mb-0 fs-4">124</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card p-4 shadow-sm dash-card">
                                <h5><i class="fas fa-users text-success me-2"></i>Total Users</h5>
                                <p class="mb-0 fs-4">58</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card p-4 shadow-sm dash-card">
                                <h5><i class="fas fa-shopping-cart text-primary me-2"></i>Total Orders</h5>
                                <p class="mb-0 fs-4">76</p>
                            </div>
                        </div>
                    </div>

                    <!-- ========== RECENT PRODUCTS SECTION ========== -->
                    <div class="mt-5">
                        <h4 class="section-title">Recent Added Products</h4>
                        <div class="row g-3">

                            <!-- Sample Product Card -->
                            <div class="col-md-4">
                                <div class="recent-card shadow-sm p-3">
                                    <img src="../Images/Clayflowerpote.png" class="recent-img">
                                    <h6 class="mt-2">Clay Flower Pot</h6>
                                    <p class="text-muted small mb-1">Price: ₹799</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="recent-card shadow-sm p-3">
                                    <img src="../Images/DecorativeBajot.jpg" class="recent-img">
                                    <h6 class="mt-2">Decorative Bajot</h6>
                                    <p class="text-muted small mb-1">Price: ₹1599</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="recent-card shadow-sm p-3">
                                    <img src="../Images/mukhwasdani.png" class="recent-img">
                                    <h6 class="mt-2">Mukhwas Dani</h6>
                                    <p class="text-muted small mb-1">Price: ₹549</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- ========== QUICK ACTIONS SECTION ========== -->
                    <div class="mt-5">
                        <h4 class="section-title">Quick Actions</h4>

                        <div class="row g-3">

                            <div class="col-md-4">
                                <div class="quick-card shadow-sm p-4 text-center">
                                    <i class="fas fa-plus-circle fa-2x text-success mb-2"></i>
                                    <h6>Add New Product</h6>
                                    <a href="addproduct.php" class="btn btn-sm btn-brown mt-2">Add Product</a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="quick-card shadow-sm p-4 text-center">
                                    <i class="fas fa-users-cog fa-2x text-primary mb-2"></i>
                                    <h6>Manage Users</h6>
                                    <a href="../Pages/manageuser.php" class="btn btn-sm btn-brown mt-2">Manage</a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="quick-card shadow-sm p-4 text-center">
                                    <i class="fas fa-shopping-bag fa-2x text-warning mb-2"></i>
                                    <h6>View Orders</h6>
                                    <a href="../Pages/manageorder.php" class="btn btn-sm btn-brown mt-2">Check Orders</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- container end -->
            </div>
            <!-- end main -->
        </div>
    </div>

</body>

</html>