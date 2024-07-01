<?php
include 'header.php';
include 'config.php';

// Fetch properties from database
$query = "SELECT * FROM properties";
$result = mysqli_query($link, $query);
?>

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
        <?php
include 'footer.php';
?>

