<?php
include('../includes/session.php');
redirectIfNotLoggedIn();
include('../includes/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Testimonials</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Manage Testimonials</h2>
        <a href="add_testimonial.php" class="btn btn-success mb-3">Add New Testimonial</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM testimonials");
                while ($testimonial = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($testimonial['client_name']); ?></td>
                        <td><?php echo htmlspecialchars($testimonial['message']); ?></td>
                        <td>
                            <a href="edit_testimonial.php?id=<?php echo $testimonial['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete_testimonial.php?id=<?php echo $testimonial['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this testimonial?');">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
