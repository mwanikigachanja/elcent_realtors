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
    <title>Manage Properties</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Manage Properties</h2>
        <a href="add_property.php" class="btn btn-success mb-3">Add New Property</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM properties");
                while ($property = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($property['title']); ?></td>
                        <td><?php echo htmlspecialchars($property['description']); ?></td>
                        <td><?php echo htmlspecialchars($property['price']); ?></td>
                        <td><?php echo htmlspecialchars($property['location']); ?></td>
                        <td>
                            <a href="edit_property.php?id=<?php echo $property['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete_property.php?id=<?php echo $property['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this property?');">Delete</a>
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
