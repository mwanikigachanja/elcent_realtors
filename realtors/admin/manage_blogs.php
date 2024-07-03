<?php
session_start();
include("config.php");

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch blogs from the database
$query = "SELECT * FROM blogs";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Blogs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.tinymce',
            menubar: false
        });
    </script>
    <style>
        .modal-content {
            padding: 20px;
        }
        .modal-header {
            border-bottom: none;
        }
        .modal-footer {
            border-top: none;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Elcent Realtors Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="manage_properties.php">Manage Properties</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manage_blogs.php">Manage Blogs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manage_testimonials.php">Manage Testimonials</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manage_users.php">Manage Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container mt-5">
    <h1 class="mb-4">Manage Blogs</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars(substr($row['content'], 0, 100)) . '...'; ?></td>
                    <td><?php echo htmlspecialchars($row['date']); ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</button>
                    </td>
                </tr>
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel<?php echo $row['id']; ?>">Edit Blog</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="manage_blogs.php">
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea class="form-control tinymce" name="content" required><?php echo htmlspecialchars($row['content']); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" class="form-control" name="date" value="<?php echo htmlspecialchars($row['date']); ?>" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="update">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this blog?')) {
            window.location.href = 'manage_blogs.php?delete=' + id;
        }
    }
</script>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $content = mysqli_real_escape_string($link, $_POST['content']);
    $date = mysqli_real_escape_string($link, $_POST['date']);

    $update_query = "UPDATE blogs SET title='$title', content='$content', date='$date' WHERE id=$id";
    mysqli_query($link, $update_query);
    header("Location: manage_blogs.php");
}

if (isset($_GET['delete'])) {
    $id = mysqli_real_escape_string($link, $_GET['delete']);
    $delete_query = "DELETE FROM blogs WHERE id=$id";
    mysqli_query($link, $delete_query);
    header("Location: manage_blogs.php");
}
?>
