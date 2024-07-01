<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include('config.php');

// Fetch snapshot data
$total_properties_query = "SELECT COUNT(*) as count FROM properties";
$total_properties_result = mysqli_query($link, $total_properties_query);
$total_properties = mysqli_fetch_assoc($total_properties_result)['count'];

$total_sold_properties_query = "SELECT COUNT(*) as count FROM properties WHERE status = 'sold'";
$total_sold_properties_result = mysqli_query($link, $total_sold_properties_query);
$total_sold_properties = mysqli_fetch_assoc($total_sold_properties_result)['count'];

$total_reservations_query = "SELECT COUNT(*) as count FROM reservations";
$total_reservations_result = mysqli_query($link, $total_reservations_query);
$total_reservations = mysqli_fetch_assoc($total_reservations_result)['count'];

$total_testimonials_query = "SELECT COUNT(*) as count FROM testimonials";
$total_testimonials_result = mysqli_query($link, $total_testimonials_query);
$total_testimonials = mysqli_fetch_assoc($total_testimonials_result)['count'];

$total_blogs_query = "SELECT COUNT(*) as count FROM blogs";
$total_blogs_result = mysqli_query($link, $total_blogs_query);
$total_blogs = mysqli_fetch_assoc($total_blogs_result)['count'];

$total_users_query = "SELECT COUNT(*) as count FROM users";
$total_users_result = mysqli_query($link, $total_users_query);
$total_users = mysqli_fetch_assoc($total_users_result)['count'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Elcent Realtors Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="mb-4">Admin Dashboard</h1>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-header">Total Properties</div>
                    <div class="card-body">
                        <h5><?php echo $total_properties; ?></h5>
                        <a href="manage_properties.php" class="btn btn-primary btn-block">Manage Properties</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-header">Total Sold Properties</div>
                    <div class="card-body">
                        <h5><?php echo $total_sold_properties; ?></h5>
                        <a href="manage_properties.php" class="btn btn-primary btn-block">Manage Properties</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-header">Total Reservations</div>
                    <div class="card-body">
                        <h5><?php echo $total_reservations; ?></h5>
                        <a href="manage_reservations.php" class="btn btn-primary btn-block">Manage Reservations</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-header">Total Testimonials</div>
                    <div class="card-body">
                        <h5><?php echo $total_testimonials; ?></h5>
                        <a href="manage_testimonials.php" class="btn btn-primary btn-block">Manage Testimonials</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-header">Total Blogs</div>
                    <div class="card-body">
                        <h5><?php echo $total_blogs; ?></h5>
                        <a href="manage_blogs.php" class="btn btn-primary btn-block">Manage Blogs</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-header">Total Users</div>
                    <div class="card-body">
                        <h5><?php echo $total_users; ?></h5>
                        <a href="manage_users.php" class="btn btn-primary btn-block">Manage Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">Analytics</div>
                    <div class="card-body">
                        <a href="analytics.php" class="btn btn-primary btn-block">View Analytics</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
