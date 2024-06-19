<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    if (empty($email)) {
        $error = "Please enter your email address.";
    } else {
        // Check if the email exists in the database
        $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Generate a unique token
            $token = bin2hex(random_bytes(50));

            // Store the token in the database
            $stmt = $conn->prepare("UPDATE admins SET reset_token = ?, reset_token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?");
            $stmt->bind_param("ss", $token, $email);
            if ($stmt->execute()) {
                // Send the email
                $reset_link = "https://yourdomain.com/reset_password.php?token=" . $token;
                $subject = "Password Reset Request";
                $message = "Click on the following link to reset your password: " . $reset_link;
                $headers = "From: no-reply@yourdomain.com\r\n";
                if (mail($email, $subject, $message, $headers)) {
                    $success = "A password reset link has been sent to your email address.";
                } else {
                    $error = "Failed to send the email. Please try again.";
                }
            } else {
                $error = "Failed to generate the reset link. Please try again.";
            }
        } else {
            $error = "No account found with that email address.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <form action="forgot_password.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
