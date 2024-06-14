<?php
session_start();
include_once '../db_connect.php';
include_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email exists and fetch admin data
    $stmt = $mysqli->prepare("SELECT id, password, is_active FROM admin WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin && password_verify($password, $admin['password'])) {
        if ($admin['is_active'] == 1) {
            // Set session variables
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['logged_in'] = true;
            header('Location: index.php');
            exit();
        } else {
            echo "Your account is not activated.";
        }
    } else {
        echo "Invalid email or password.";
    }
}
?>

<!-- HTML Form for login -->
<form method="post" action="login.php">
    <input type="email" name="email" required placeholder="Email">
    <input type="password" name="password" required placeholder="Password">
    <button type="submit">Login</button>
</form>
