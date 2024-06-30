<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

// Fetch data for dashboard
$property_count = mysqli_query($link, "SELECT COUNT(*) AS count FROM properties")->fetch_assoc()['count'];
$testimonial_count = mysqli_query($link, "SELECT COUNT(*) AS count FROM testimonials")->fetch_assoc()['count'];
$blog_count = mysqli_query($link, "SELECT COUNT(*) AS count FROM blogs")->fetch_assoc()['count'];
$user_count = mysqli_query($link, "SELECT COUNT(*) AS count FROM users")->fetch_assoc()['count'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Elcent Realtors</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Elcent Realtors </div>
            <div class="list-group list-group-flush">
                <a href="index.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                <a href="properties.php" class="list-group-item list-group-item-action bg-light">Manage Properties</a>
                <a href="testimonials.php" class="list-group-item list-group-item-action bg-light">Manage Testimonials</a>
                <a href="blogs.php" class="list-group-item list-group-item-action bg-light">Manage Blogs</a>
                <a href="users.php" class="list-group-item list-group-item-action bg-light">Manage Users</a>
                <a href="logout.php" class="list-group-item list-group-item-action bg-light">Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>

            <div class="container-fluid">
                <h1 class="mt-4">Admin Dashboard</h1>
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="m-r-20 align-self-center"><i class="fas fa-home fa-2x text-primary"></i></div>
                                    <div class="align-self-center">
                                        <h6 class="text-muted m-t-10 m-b-0">Properties</h6>
                                        <h2 class="m-t-0"><?php echo $property_count; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="m-r-20 align-self-center"><i class="fas fa-comment fa-2x text-primary"></i></div>
                                    <div class="align-self-center">
                                        <h6 class="text-muted m-t-10 m-b-0">Testimonials</h6>
                                        <h2 class="m-t-0"><?php echo $testimonial_count; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="m-r-20 align-self-center"><i class="fas fa-newspaper fa-2x text-primary"></i></div>
                                    <div class="align-self-center">
                                        <h6 class="text-muted m-t-10 m-b-0">Blogs</h6>
                                        <h2 class="m-t-0"><?php echo $blog_count; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div class="m-r-20 align-self-center"><i class="fas fa-users fa-2x text-primary"></i></div>
                                    <div class="align-self-center">
                                        <h6 class="text-muted m-t-10 m-b-0">Users</h6>
                                        <h2 class="m-t-0"><?php echo $user_count; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add more content here for forms to add properties, testimonials, blogs, etc. -->
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>
