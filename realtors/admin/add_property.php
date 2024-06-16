<?php
include('../includes/session.php');
redirectIfNotLoggedIn();
include('../includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = $conn->real_escape_string($_POST['price']);
    $location = $conn->real_escape_string($_POST['location']);
    $features = $conn->real_escape_string($_POST['features']);

    // Handle file upload
    $images = '';
    if (!empty($_FILES['images']['name'][0])) {
        $imageNames = [];
        foreach ($_FILES['images']['name'] as $key => $name) {
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES['images']['name'][$key]);
            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $targetFile)) {
                $imageNames[] = $targetFile;
            }
        }
        $images = implode(',', $imageNames);
    }

    $query = "INSERT INTO properties (title, description, price, location, features, images) VALUES ('$title', '$description', '$price', '$location', '$features', '$images')";

    if ($conn->query($query) === TRUE) {
        echo "New property added successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Add New Property</h2>
        <form action="add_property.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="features">Features</label>
                <textarea class="form-control" id="features" name="features" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="images">Images</label>
                <input type="file" class="form-control-file" id="images" name="images[]" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Add Property</button>
        </form>
    </div>
</body>
</html>
