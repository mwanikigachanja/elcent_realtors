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
    $images = $_FILES['images']['name'];
    
    $target_dir = "../images/";
    $target_file = $target_dir . basename($images);
    move_uploaded_file($_FILES['images']['tmp_name'], $target_file);

    $query = "INSERT INTO properties (title, description, price, location, features, images) VALUES ('$title', '$description', '$price', '$location', '$features', '$images')";

    if ($conn->query($query) === TRUE) {
        echo "New property added successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>
