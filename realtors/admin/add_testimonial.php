<?php
session_start();
require 'config.php';


if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $testimonial = mysqli_real_escape_string($link, $_POST['testimonial']);
    
    $query = "INSERT INTO testimonials (name, testimonial) 
              VALUES ('$name', '$testimonial')";
    
    if (mysqli_query($link, $query)) {
        header('Location: manage_testimonials.php');
        exit;
    } else {
        $error = "Error adding testimonial: " . mysqli_error($link);
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
            <div class="form-group">
                <label for="testimonial">Testimonial</label>
                <textarea class="form-control" id="testimonial" name="testimonial" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Testimonial</button>
        </form>
    </div>
</body>
</html>
