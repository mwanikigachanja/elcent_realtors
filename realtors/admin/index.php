<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

// Get counts for the dashboard
$result = mysqli_query($link, "SELECT COUNT(*) as count FROM properties");
$property_count = mysqli_fetch_assoc($result)['count'];

$result = mysqli_query($link, "SELECT COUNT(*) as count FROM testimonials");
$testimonial_count = mysqli_fetch_assoc($result)['count'];

$result = mysqli_query($link, "SELECT COUNT(*) as count FROM blogs");
$blog_count = mysqli_fetch_assoc($result)['count'];

$result = mysqli_query($link, "SELECT COUNT(*) as count FROM users");
$user_count = mysqli_fetch_assoc($result)['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span class="ion-ios-speedometer"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage_properties.php">
                                <span class="ion-ios-home"></span>
                                Manage Properties
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage_testimonials.php">
                                <span class="ion-ios-people"></span>
                                Manage Testimonials
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage_blogs.php">
                                <span class="ion-ios-paper"></span>
                                Manage Blogs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manage_users.php">
                                <span class="ion-ios-person"></span>
                                Manage Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <span class="ion-ios-log-out"></span>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">Properties</div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $property_count; ?></h5>
                                <p class="card-text">Total Properties</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">Testimonials</div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $testimonial_count; ?></h5>
                                <p class="card-text">Total Testimonials</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-header">Blogs</div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $blog_count; ?></h5>
                                <p class="card-text">Total Blogs</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-header">Users</div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $user_count; ?></h5>
                                <p class="card-text">Total Users</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add more detailed analytics and management sections here -->
                <!-- Example: Recent Properties, Latest Testimonials, etc. -->
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
