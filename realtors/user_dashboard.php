<?php
include('includes/session.php');
redirectIfNotLoggedIn();
include('includes/db.php');

$user_id = $_SESSION['user_id'];
$reservations = $conn->query("SELECT r.*, p.title FROM reservations r JOIN properties p ON r.property_id = p.id WHERE r.user_id = '$user_id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">My Reservations</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Property</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($reservation = $reservations->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($reservation['title']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['status']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['created_at']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
