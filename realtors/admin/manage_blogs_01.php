<?php
include 'header.php';
include 'config.php';

// Fetch blogs from database
$query = "SELECT * FROM blogs";
$result = mysqli_query($link, $query);
?>
<h2>Manage Blogs</h2>
<a href="add_blog.php" class="btn btn-success mb-3">Add New Blog</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['author']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <a href="edit_blog.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="delete_blog.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php
include 'footer.php';
?>
