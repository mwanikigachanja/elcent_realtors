<?php
session_start();
if(!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

require_once 'config.php';

// Fetch properties from the database
$query = "SELECT * FROM properties";
$result = mysqli_query($link, $query);
$properties = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Properties</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/@ionic/core@5.0.0/dist/ionic/ionic.js"></script>
    <style>
        /* Add your custom styles here */
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Properties</h1>
        <button id="addPropertyBtn">Add New Property</button>
        <table>
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
                <?php foreach ($properties as $property): ?>
                    <tr>
                        <td><?= htmlspecialchars($property['title']); ?></td>
                        <td><?= htmlspecialchars($property['description']); ?></td>
                        <td><?= htmlspecialchars($property['price']); ?></td>
                        <td><?= htmlspecialchars($property['location']); ?></td>
                        <td>
                            <a href="edit_property.php?id=<?= $property['id']; ?>">Edit</a>
                            <a href="delete_property.php?id=<?= $property['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal for adding new property -->
    <div id="addPropertyModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Add New Property</h2>
            <form action="add_property.php" method="POST">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" required>

                <label for="description">Description</label>
                <textarea name="description" id="description" required></textarea>

                <label for="price">Price</label>
                <input type="number" name="price" id="price" required>

                <label for="location">Location</label>
                <input type="text" name="location" id="location" required>

                <label for="features">Features</label>
                <textarea name="features" id="features"></textarea>

                <label for="images">Images</label>
                <input type="file" name="images" id="images" multiple>

                <button type="submit">Add Property</button>
            </form>
        </div>
    </div>

    <script>
        var modal = document.getElementById("addPropertyModal");
        var btn = document.getElementById("addPropertyBtn");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
