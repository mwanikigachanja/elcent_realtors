<?php
session_start();
require 'config.php';

// Check if user is logged in
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit;
}

// Fetch data for dashboard
$properties_count = $link->query("SELECT COUNT(*) FROM properties")->fetch_row()[0];
$users_count = $link->query("SELECT COUNT(*) FROM users")->fetch_row()[0];
$testimonials_count = $link->query("SELECT COUNT(*) FROM testimonials")->fetch_row()[0];
$blogs_count = $link->query("SELECT COUNT(*) FROM blogs")->fetch_row()[0];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="path/to/bootstrap.css">
    <style>
        .dashboard {
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container dashboard">
        <h1>Welcome, <?php echo $_SESSION['login_user']; ?></h1>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Properties</h5>
                        <p class="card-text"><?php echo $properties_count; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text"><?php echo $users_count; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Testimonials</h5>
                        <p class="card-text"><?php echo $testimonials_count; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Blogs</h5>
                        <p class="card-text"><?php echo $blogs_count; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <h2>Manage Content</h2>
        <div class="row">
            <div class="col-md-6">
                <a href="manage_properties.php" class="btn btn-primary btn-block">Manage Properties</a>
            </div>
            <div class="col-md-6">
                <a href="manage_users.php" class="btn btn-primary btn-block">Manage Users</a>
            </div>
            <div class="col-md-6">
                <a href="manage_testimonials.php" class="btn btn-primary btn-block">Manage Testimonials</a>
            </div>
            <div class="col-md-6">
                <a href="manage_blogs.php" class="btn btn-primary btn-block">Manage Blogs</a>
            </div>
        </div>
    </div>

    <script src="path/to/jquery.js"></script>
    <script src="path/to/bootstrap.js"></script>
</body>
</html>
