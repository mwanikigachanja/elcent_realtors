<?php
include('config.php');
include('functions.php');

// Fetch users
$users = mysqli_query($link, "SELECT * FROM users");

if (isset($_POST['delete_user'])) {
    $id = $_POST['id'];
    mysqli_query($link, "DELETE FROM users WHERE id='$id'");
    header('Location: manage_users.php');
}

if (isset($_POST['edit_user'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    // Additional fields as per your DB structure
    mysqli_query($link, "UPDATE users SET username='$username', email='$email' WHERE id='$id'");
    header('Location: manage_users.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
    <!-- Include your CSS here -->
</head>
<body>
    <h1>Manage Users</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($users)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" name="edit_user" value="Edit">
                            <input type="submit" name="delete_user" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
