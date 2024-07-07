<?php
session_start();
require 'config.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $image = NULL;
    $testimonial = mysqli_real_escape_string($link, $_POST['testimonial']);

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = 'images/';
        $target_file = $target_dir . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check === false) {
            $error = "File is not an image.";
        } else {
            // Check file size (optional, example: 5MB limit)
            if ($_FILES['image']['size'] > 5000000) {
                $error = "Sorry, your file is too large.";
            } else {
                // Allow certain file formats (optional)
                $allowed_types = array("jpg", "jpeg", "png", "gif");
                if (!in_array($imageFileType, $allowed_types)) {
                    $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                } else {
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                        $image = $target_file;
                    } else {
                        $error = "Sorry, there was an error uploading your file.";
                    }
                }
            }
        }
    }

    if (empty($error)) {
        $query = "INSERT INTO testimonials (name, image, testimonial) 
                  VALUES ('$name', ?, '$testimonial')";
        
        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, 's', $image);
        
        if (mysqli_stmt_execute($stmt)) {
            header('Location: manage_testimonials.php');
            exit;
        } else {
            $error = "Error adding testimonial: " . mysqli_error($link);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Testimonial - Elcent Realtors</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Add New Testimonial</h1>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="testimonial">Testimonial</label>
                <textarea class="form-control" id="testimonial" name="testimonial" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Testimonial</button>
        </form>
    </div>
</body>
</html>
