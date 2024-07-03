<?php
session_start();
include("config.php");

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch testimonials from the database
$query = "SELECT * FROM testimonials";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Testimonials</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/svg+xml">
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
    <h1 class="mb-4">Manage Testimonials</h1>
    <a href="add_testimonial.php" class="btn btn-success mb-3">Add New Testimonial</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Testimonial</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['testimonial']); ?></td>
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
                                <h5 class="modal-title" id="editModalLabel<?php echo $row['id']; ?>">Edit Testimonial</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="manage_testimonials.php">
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="testimonial">Testimonial</label>
                                        <textarea class="form-control" name="testimonial" required><?php echo htmlspecialchars($row['testimonial']); ?></textarea>
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
        if (confirm('Are you sure you want to delete this testimonial?')) {
            window.location.href = 'manage_testimonials.php?delete=' + id;
        }
    }
</script>
</body>
</html>

<?php
if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $testimonial = mysqli_real_escape_string($link, $_POST['testimonial']);
    $date = mysqli_real_escape_string($link, $_POST['date']);

    $update_query = "UPDATE testimonials SET name='$name', testimonial='$testimonial', created_at='$date' WHERE id=$id";
    mysqli_query($link, $update_query);
    header("Location: manage_testimonials.php");
}

if (isset($_GET['delete'])) {
    $id = mysqli_real_escape_string($link, $_GET['delete']);
    $delete_query = "DELETE FROM testimonials WHERE id=$id";
    mysqli_query($link, $delete_query);
    header("Location: manage_testimonials.php");
}
?>
