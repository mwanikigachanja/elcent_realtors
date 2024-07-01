<?php
include 'header.php';
include 'config.php';

// Fetch testimonials from database
$query = "SELECT * FROM testimonials";
$result = mysqli_query($link, $query);
?>
<h2>Manage Testimonials</h2>
<a href="add_testimonial.php" class="btn btn-success mb-3">Add New Testimonial</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Testimonial</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['testimonial']; ?></td>
                <td>
                    <a href="edit_testimonial.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="delete_testimonial.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php
include 'footer.php';
?>
