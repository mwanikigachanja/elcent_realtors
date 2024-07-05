<?php
session_start();
require 'config.php';


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Collect and sanitize input data
    $id = intval($_POST['id']);
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $price = floatval($_POST['price']);
    $location = htmlspecialchars($_POST['location']);
    $features = htmlspecialchars($_POST['features']);
    $status = htmlspecialchars($_POST['status']);

    // Update the property in the database
    $sql = "UPDATE properties SET title=?, description=?, price=?, location=?, features=?, status=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsssi", $title, $description, $price, $location, $features, $status, $id);

    if ($stmt->execute()) {
        echo "Property updated successfully.";
    } else {
        echo "Error updating property: " . $conn->error;
    }
    $stmt->close();
} else {
    // Fetch the property data to be edited
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM properties WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $property = $result->fetch_assoc();
        } else {
            echo "Property not found.";
            exit;
        }
        $stmt->close();
    } else {
        echo "Invalid request.";
        exit;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Property</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Use your actual stylesheet path -->
</head>
<body>
    <h2>Edit Property</h2>
    <form action="edit_property.php" method="post">
        <input type="hidden" name="id" value="<?php echo $property['id']; ?>">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $property['title']; ?>" required><br>
        <label for="description">Description:</label>
        <textarea name="description" required><?php echo $property['description']; ?></textarea><br>
        <label for="price">Price:</label>
        <input type="number" step="0.01" name="price" value="<?php echo $property['price']; ?>" required><br>
        <label for="location">Location:</label>
        <input type="text" name="location" value="<?php echo $property['location']; ?>" required><br>
        <label for="features">Features:</label>
        <textarea name="features"><?php echo $property['features']; ?></textarea><br>
        <label for="status">Status:</label>
        <select name="status">
            <option value="available" <?php echo ($property['status'] == 'available') ? 'selected' : ''; ?>>Available</option>
            <option value="sold" <?php echo ($property['status'] == 'sold') ? 'selected' : ''; ?>>Sold</option>
        </select><br>
        <input type="submit" value="Update Property">
    </form>
</body>
</html>
