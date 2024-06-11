<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('includes/db.php');

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $query = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($query) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>
