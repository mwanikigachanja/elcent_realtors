<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if fields are empty
    if (empty($username) || empty($password)) {
        $error = "Username or Password is invalid";
    } else {
        // Prepare and bind
        $stmt = $link->prepare("SELECT id, username, password FROM admins WHERE username = ?");
        $stmt->bind_param("s", $username);

        // Execute statement
        $stmt->execute();
        $stmt->store_result();

        // Check if username exists
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $username, $hashed_password);
            $stmt->fetch();
            // Verify password
            if (password_verify($password, $hashed_password)) {
                // Set session variables
                $_SESSION['login_user'] = $username;
                header("location: index.php");
            } else {
                $error = "Password is invalid";
            }
        } else {
            $error = "No account found with that username";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <form action="" method="post">
        <label>Username:</label>
        <input type="text" name="username"><br>
        <label>Password:</label>
        <input type="password" name="password"><br>
        <input type="submit" value="Login">
        <span><?php echo isset($error) ? $error : ''; ?></span>
    </form>
</body>
</html>
