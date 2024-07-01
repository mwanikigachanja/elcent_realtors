<?php
session_start();
require 'config.php';
require 'functions.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $description = mysqli_real_escape_string($link, $_POST['description']);
    $price = mysqli_real_escape_string($link, $_POST['price']);
    $location = mysqli_real_escape_string($link, $_POST['location']);
    $features = mysqli_real_escape_string($link, $_POST['features']);
    $images = mysqli_real_escape_string($link, $_POST['images']);
    $status = mysqli_real_escape_string($link, $_POST['status']);
    
    $query = "INSERT INTO properties (title, description, price, location, features, images, status) 
              VALUES ('$title', '$description', '$price', '$location', '$features', '$images', '$status')";
    
    if (mysqli_query($link, $query)) {
        header('Location: manage_properties.php');
        exit;
    } else {
        $error = "Error adding property: " . mysqli_error($link);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property - Elcent Realtors</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Add New Property</h1>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="features">Features</label>
                <textarea class="form-control" id="features" name="features"></textarea>
            </div>
            <div class="form-group">
                <label for="images">Images URL</label>
                <input type="text" class="form-control" id="images" name="images">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="available">Available</option>
                    <option value="sold">Sold</option>
                    <option value="pending">Pending</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Property</button>
        </form>
    </div>
</body>
</html>
