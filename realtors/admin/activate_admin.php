<?php
include('includes/functions.php');

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
    <title>Activate Admin</title>
</head>
<body>
    <h2>Activate Admin</h2>
    <p>Activation status will be displayed here.</p>
</body>
</html>
