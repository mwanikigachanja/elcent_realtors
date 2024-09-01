<?php
session_start();
require 'config.php';


if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $content = mysqli_real_escape_string($link, $_POST['content']);
    $excerpt = mysqli_real_escape_string($link, $_POST['excerpt']);
    $images = null;
    $author = mysqli_real_escape_string($link, $_POST['author']);
    $status = mysqli_real_escape_string($link, $_POST['status']);


     // Handle image upload
     if (isset($_FILES['images']) && $_FILES['images']['error'] == 0) {
        $target_dir = '../images/';
        $target_file = $target_dir . basename($_FILES['images']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES['images']['tmp_name']);
        if ($check !== false) {
            // Check file size (optional, example: 5MB limit)
            if ($_FILES['images']['size'] <= 5000000) {
                // Allow certain file formats (optional)
                $allowed_types = array("jpg", "jpeg", "png", "gif");
                if (in_array($imageFileType, $allowed_types)) {
                    if (move_uploaded_file($_FILES['images']['tmp_name'], $target_file)) {
                        // Sanitize the file path for database insertion
                        $image = mysqli_real_escape_string($link, $target_file);
                    } else {
                        $error = "Sorry, there was an error uploading your file.";
                    }
                } else {
                    $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                }
            } else {
                $error = "Sorry, your file is too large.";
            }
        } else {
            $error = "File is not an image.";
        }
    }
    
    $query = "INSERT INTO blogs (title, content, excerpt, image, author, status) 
              VALUES ('$title', '$content', '$excerpt','$images','$author', '$status')";
    
    if (mysqli_query($link, $query)) {
        header('Location: manage_blogs.php');
        exit;
    } else {
        $error = "Error adding blog: " . mysqli_error($link);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog - Elcent Realtors</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Add New Blog</h1>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" required></textarea>
            </div>
            <div>
                <label for="excerpt">Excerpt</label>
                <textarea class="form-control" id="excerpt" name="excerpt" required></textarea>
            </div>
            <div class="form-group">
                                <label for="images">Images</label>
                                <input type="file" class="form-control" id="images" name="images">
                            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add Blog</button>
        </form>
    </div>
</body>
</html>
