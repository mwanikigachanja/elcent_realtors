<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include('config.php');
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
        <a class="navbar-brand" href="#">Elcent Realtors Admin</a>
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
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Properties</div>
                    <div class="card-body">
                        <a href="manage_properties.php" class="btn btn-primary btn-block">Manage Properties</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Reservations</div>
                    <div class="card-body">
                        <a href="manage_reservations.php" class="btn btn-primary btn-block">Manage Reservations</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Testimonials</div>
                    <div class="card-body">
                        <a href="manage_testimonials.php" class="btn btn-primary btn-block">Manage Testimonials</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Blogs</div>
                    <div class="card-body">
                        <a href="manage_blogs.php" class="btn btn-primary btn-block">Manage Blogs</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <a href="manage_users.php" class="btn btn-primary btn-block">Manage Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
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
