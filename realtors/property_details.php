<?php
session_start();
require 'admin/config.php';

if (!isset($_GET['id'])) {
    header('Location: properties.php');
    exit;
}

$id = mysqli_real_escape_string($link, $_GET['id']);
$query = "SELECT * FROM properties WHERE id = '$id'";
$result = mysqli_query($link, $query);
$property = mysqli_fetch_assoc($result);

if (!$property) {
    header('Location: properties.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details - Elcent Realtors</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <img src="<?php echo $property['image']; ?>" class="img-fluid" alt="<?php echo $property['title']; ?>">
                <h1 class="mt-4"><?php echo $property['title']; ?></h1>
                <p class="text-muted"><?php echo $property['location']; ?></p>
                <p><?php echo nl2br($property['description']); ?></p>
                <p><strong>Price:</strong> <?php echo $property['price']; ?></p>
                <p><strong>Features:</strong> <?php echo nl2br($property['features']); ?></p>
            </div>
            <div class="col-md-4">
                <h3>Contact Us</h3>
                <p>Email: elcentrealtors@gmail.com</p>
                <p>Phone: +254 717 388544</p>
                <p>Office: Ebby Towers, 2nd Floor Room D5, Kenyatta Avenue, Kitale</p>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
