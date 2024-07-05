<?php
session_start();
require 'config.php';


if (!isset($_SESSION['loggedin'])) {
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
    <h1>Manage Properties</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPropertyModal">
            Add Property
        </button>
    <!-- Modal -->
        <div class="modal fade" id="addPropertyModal" tabindex="-1" role="dialog" aria-labelledby="addPropertyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPropertyModalLabel">Add New Property</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addPropertyForm" method="POST" action="add_property.php">
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
                                <input type="number" class="form-control" id="price" name="price" required>
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
                                <label for="images">Images</label>
                                <input type="file" class="form-control" id="images" name="images">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Property</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
