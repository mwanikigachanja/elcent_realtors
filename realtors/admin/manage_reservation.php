<?php
include('config.php');
include('functions.php');

// Fetch reservations
$reservations = mysqli_query($link, "SELECT * FROM reservations");

if (isset($_POST['delete_reservation'])) {
    $id = $_POST['id'];
    mysqli_query($link, "DELETE FROM reservations WHERE id='$id'");
    header('Location: manage_reservations.php');
}

if (isset($_POST['edit_reservation'])) {
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $property_id = $_POST['property_id'];
    $status = $_POST['status'];
    // Additional fields as per your DB structure
    mysqli_query($link, "UPDATE reservations SET user_id='$user_id', property_id='$property_id', status='$status' WHERE id='$id'");
    header('Location: manage_reservations.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Reservations</title>
    <!-- Include your CSS here -->
</head>
<body>
    <h1>Manage Reservations</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Property ID</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($reservations)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['property_id']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" name="edit_reservation" value="Edit">
                            <input type="submit" name="delete_reservation" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
