<?php
include('config.php');
include('functions.php');

// Fetch blogs
$blogs = mysqli_query($link, "SELECT * FROM blogs");

if (isset($_POST['delete_blog'])) {
    $id = $_POST['id'];
    mysqli_query($link, "DELETE FROM blogs WHERE id='$id'");
    header('Location: manage_blogs.php');
}

if (isset($_POST['edit_blog'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    // Additional fields as per your DB structure
    mysqli_query($link, "UPDATE blogs SET title='$title', content='$content' WHERE id='$id'");
    header('Location: manage_blogs.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Blogs</title>
    <!-- Include your CSS here -->
</head>
<body>
    <h1>Manage Blogs</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($blogs)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['content']; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" name="edit_blog" value="Edit">
                            <input type="submit" name="delete_blog" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
