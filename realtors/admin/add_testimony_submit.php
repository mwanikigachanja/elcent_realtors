<?php
include('../includes/session.php');
redirectIfNotLoggedIn();
include('../includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_name = $conn->real_escape_string($_POST['client_name']);
    $message = $conn->real_escape_string($_POST['message']);

    $query = "INSERT INTO testimonials (client_name, message) VALUES ('$client_name', '$message')";

    if ($conn->query($query) === TRUE) {
        echo "New testimonial added successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>
