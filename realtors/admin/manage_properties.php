<?php
include('config.php');
include('functions.php');

// Fetch properties
$properties = mysqli_query($link, "SELECT * FROM properties");

if (isset($_POST['delete_property'])) {
    $id = $_POST['id'];
    mysqli_query($link, "DELETE FROM properties WHERE id='$id'");
    header('Location: manage_properties.php');
}

if (isset($_POST['edit_property'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    // Additional fields as per your DB structure
    mysqli_query($link, "UPDATE properties SET name='$name', location='$location', price='$price' WHERE id='$id'");
    header('Location: manage_properties.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Properties</title>
    <!-- Include your CSS here -->
</head>
<body>
    <h1>Manage Properties</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($properties)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" name="edit_property" value="Edit">
                            <input type="submit" name="delete_property" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
