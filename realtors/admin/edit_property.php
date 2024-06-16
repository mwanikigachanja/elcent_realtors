<?php
include('../includes/session.php');
redirectIfNotLoggedIn();
include('../includes/db.php');

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $result = $conn->query("SELECT * FROM properties WHERE id = '$id'");
    $property = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = $conn->real_escape_string($_POST['price']);
    $location = $conn->real_escape_string($_POST['location']);
    $features = $conn->real_escape_string($_POST['features']);

    $query = "UPDATE properties SET title='$title', description='$description', price='$price', location='$location', features='$features' WHERE id='$id'";

    if ($conn->query($query) === TRUE) {
        echo "Property updated successfully";
    } else {
        echo "Error updating property: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Property</h2>
        <form action="edit_property.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($property['title']); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="5" required><?php echo htmlspecialchars($property['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($property['price']); ?>" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo htmlspecialchars($property['location']); ?>" required>
            </div>
            <div class="form-group">
                <label for="features">Features</label>
                <textarea class="form-control" id="features" name="features" rows="5"><?php echo htmlspecialchars($property['features']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Property</button>
        </form>
    </div>
</body>
</html>
