<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

// Include database connection
include_once '../includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage_properties.php">
                                Manage Properties
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage_reservations.php">
                                Manage Reservations
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage_testimonials.php">
                                Manage Testimonials
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage_users.php">
                                Manage Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>

                <!-- Dashboard widgets -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <div class="card-title">Total Properties</div>
                                <h2 class="card-text">10</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <div class="card-title">Reservations</div>
                                <h2 class="card-text">5</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body">
                                <div class="card-title">Testimonials</div>
                                <h2 class="card-text">8</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-body">
                                <div class="card-title">Users</div>
                                <h2 class="card-text">20</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Analytics and Other Contents -->
                <div class="row">
                    <div class="col-md-12">
                        <h2>Analytics</h2>
                        <p>Display various analytics here, such as user activity, property views, etc.</p>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
