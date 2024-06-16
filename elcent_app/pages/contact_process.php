<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Process the contact form submission (e.g., send an email, save to database, etc.)
  // For this example, we'll just redirect to a thank you page

  header("Location: /pages/thank_you.php");
}
?>
