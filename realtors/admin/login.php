<?php
include('../includes/db.php');
include('../includes/session.php');
include('../includes/functions.php');

// Update login.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $admin = authenticate_admin($email, $password);
    if ($admin) {
        session_start();
        $_SESSION['user_id'] = $admin['id'];
        $_SESSION['username'] = $admin['username'];
        header("Location: index.php");
    } else {
        echo "Invalid email, password, or account not activated.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Admin Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            Not registered? <a href="register_admin.php">Register here</a>
        </form>
    </div>
</body>
</html>
