<?php
include('../includes/session.php');
redirectIfNotLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Admin Dashboard</h2>
        <div class="row">
            <div class="col-md-4">
                <a href="manage_properties.php" class="btn btn-primary btn-block">Manage Properties</a>
            </div>
            <div class="col-md-4">
                <a href="manage_testimonials.php" class="btn btn-primary btn-block">Manage Testimonials</a>
            </div>
            <div class="col-md-4">
                <a href="logout.php" class="btn btn-danger btn-block">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
