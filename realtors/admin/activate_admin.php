<?php
include('../includes/functions.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['token'])) {
    $token = htmlspecialchars($_GET['token']);

    if (activate_admin($token)) {
        echo "Your account has been activated. You can now log in.";
    } else {
        echo "Invalid token or account already activated.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activate Admin</title>
</head>
<body>
    <h2>Activate Admin</h2>
    <p>Activation status will be displayed here.</p>
    <p>Proceed to <a href="login.php">Login</a></p>
</body>
</html>
