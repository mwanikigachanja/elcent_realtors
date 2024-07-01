<?php
include('config.php');
include('functions.php');

// Fetch testimonials
$testimonials = mysqli_query($link, "SELECT * FROM testimonials");

if (isset($_POST['delete_testimonial'])) {
    $id = $_POST['id'];
    mysqli_query($link, "DELETE FROM testimonials WHERE id='$id'");
    header('Location: manage_testimonials.php');
}

if (isset($_POST['edit_testimonial'])) {
    $id = $_POST['id'];
    $author = $_POST['author'];
    $content = $_POST['content'];
    // Additional fields as per your DB structure
    mysqli_query($link, "UPDATE testimonials SET author='$author', content='$content' WHERE id='$id'");
    header('Location: manage_testimonials.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Testimonials</title>
    <!-- Include your CSS here -->
</head>
<body>
    <h1>Manage Testimonials</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($testimonials)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['content']; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" name="edit_testimonial" value="Edit">
                            <input type="submit" name="delete_testimonial" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
