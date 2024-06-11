<?php
include('includes/session.php');
redirectIfNotLoggedIn();
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $property_id = $conn->real_escape_string($_POST['property_id']);
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO reservations (user_id, property_id) VALUES ('$user_id', '$property_id')";
    if ($conn->query($query) === TRUE) {
        // Send confirmation email
        $user_result = $conn->query("SELECT email FROM users WHERE id = '$user_id'");
        $user = $user_result->fetch_assoc();
        $email = $user['email'];
        $subject = "Property Reservation Confirmation";
        $message = "Thank you for reserving a property with Elcent Realtors. Your reservation is being processed.";
        mail($email, $subject, $message);
        echo "Property reserved successfully. A confirmation email has been sent to $email.";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>
