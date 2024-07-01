<?php
include 'header.php';
include 'config.php';

// Fetch properties from database
$query = "SELECT * FROM properties";
$result = mysqli_query($link, $query);
?>
<h2>Manage Properties</h2>
<a href="add_property.php" class="btn btn-success mb-3">Add New Property</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                    <a href="edit_property.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="delete_property.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php
include 'footer.php';
?>
