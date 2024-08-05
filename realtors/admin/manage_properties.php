<?php
session_start();
include("config.php");

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

// Handle delete action
if (isset($_GET['delete'])) {
    $property_id = intval($_GET['delete']);
    $query = "DELETE FROM properties WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, 'i', $property_id);
    if (mysqli_stmt_execute($stmt)) {
        $message = "Property deleted successfully.";
    } else {
        $error = "Error deleting property: " . mysqli_error($link);
    }
}

// Fetch properties from the database
$query = "SELECT * FROM properties";
$result = mysqli_query($link, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Properties</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/svg+xml">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .modal-header, .modal-footer {
            background-color: #343a40;
            color: #fff;
        }
        .modal-footer {
            justify-content: flex-start;
        }
        .btn-custom {
            background-color: #343a40;
            color: #fff;
        }
    </style>
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
    <h1 class="mb-4">Manage Properties</h1>
    <?php if (!empty($message)): ?>
        <p class="success"><?php echo $message; ?></p>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#addPropertyModal">
            Add New Property
        </button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Location</th>
                <th>Features</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                <td><img src="<?= $row['images'] ?>" alt="<?= $row['title'] ?>" width="100px"></td>
                <td><img src="<?= $row['s_image']?>" alt="<?= $row['title']?>" width="100px"></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><?php echo htmlspecialchars($row['price']); ?></td>
                    <td><?php echo htmlspecialchars($row['location']); ?></td>
                    <td><?php echo htmlspecialchars($row['features']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</button>
                    </td>
                </tr>

                <!-- Add Property Modal -->
    <div class="modal fade" id="addPropertyModal" tabindex="-1" aria-labelledby="addPropertyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPropertyModalLabel">Add New Property</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="add_property.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="form-group">
                            <label for="features">Features</label>
                            <textarea class="form-control" id="features" name="features" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" class="form-control-file" id="images" name="images">
                        </div>
                        <div class="form-group">
                            <label for="images">Slider Images</label>
                            <input type="file" class="form-control-file" id="s_image" name="s_image">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="available">Available</option>
                                <option value="sold">Sold</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-custom">Save Property</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel<?php echo $row['id']; ?>">Edit Property</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="manage_properties.php">
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" required><?php echo htmlspecialchars($row['description']); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control" name="price" value="<?php echo htmlspecialchars($row['price']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input type="text" class="form-control" name="location" value="<?php echo htmlspecialchars($row['location']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="features">Features</label>
                                        <textarea class="form-control" name="features"><?php echo htmlspecialchars($row['features']); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="images">Images</label>
                                        <input type="file" class="form-control" name="images" value="<?php echo htmlspecialchars($row['images']); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="images">Slider Image</label>
                                        <input type="file" class="form-control" name="s_image" value="<?php echo htmlspecialchars($row['s_image']); ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="available" <?php if ($row['status'] == 'available') echo 'selected'; ?>>Available</option>
                                            <option value="sold" <?php if ($row['status'] == 'sold') echo 'selected'; ?>>Sold</option>
                                        </select>
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
        if (confirm('Are you sure you want to delete this property?')) {
            window.location.href = 'manage_properties.php?delete=' + id;
        }
    }
</script>
</body>
</html>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM properties WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $property = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $description = mysqli_real_escape_string($link, $_POST['description']);
    $price = mysqli_real_escape_string($link, $_POST['price']);
    $location = mysqli_real_escape_string($link, $_POST['location']);
    $image = $property['images'];
    //$simage = mysqli_real_escape_string($link, $_POST['s_image']);
    $simage = $property['s_image'];

    // Handle image upload
    if (isset($_FILES['images']) && $_FILES['images']['error'] == 0) {
        $target_dir = '../images/';
        $target_file = $target_dir . basename($_FILES['images']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES['images']['tmp_name']);
        if ($check !== false) {
            // Check file size (optional, example: 5MB limit)
            if ($_FILES['images']['size'] <= 5000000) {
                // Allow certain file formats (optional)
                $allowed_types = array("jpg", "jpeg", "png", "gif");
                if (in_array($imageFileType, $allowed_types)) {
                    if (move_uploaded_file($_FILES['images']['tmp_name'], $target_file)) {
                        $image = $target_file;
                    } else {
                        $error = "Sorry, there was an error uploading your file.";
                    }
                } else {
                    $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                }
            } else {
                $error = "Sorry, your file is too large.";
            }
        } else {
            $error = "File is not an image.";
        }
    }

    // Handle simage upload
    if (isset($_FILES['s_image']) && $_FILES['s_image']['error'] == 0) {
        $target_dir = '../images/';
        $target_file = $target_dir . basename($_FILES['s_image']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES['s_image']['tmp_name']);
        if ($check !== false) {
            // Check file size (optional, example: 5MB limit)
            if ($_FILES['s_image']['size'] <= 5000000) {
                // Allow certain file formats (optional)
                $allowed_types = array("jpg", "jpeg", "png", "gif");
                if (in_array($imageFileType, $allowed_types)) {
                    if (move_uploaded_file($_FILES['s_image']['tmp_name'], $target_file)) {
                        $simage = $target_file;
                    } else {
                        $error = "Sorry, there was an error uploading your file.";
                    }
                } else {
                    $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                }
            } else {
                $error = "Sorry, your file is too large.";
            }
        } else {
            $error = "File is not an image.";
        }
    }

    $query = "UPDATE properties SET title = ?, description = ?, price = ?, location = ?, features = ?, images = ?, s_image = ?, status = ?, WHERE id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, 'ssssssi', $title, $description, $price, $location, $image, $simage, $id);

    if (mysqli_stmt_execute($stmt)) {
        header('Location: manage_properties.php');
        exit;
    } else {
        $error = "Error updating property: " . mysqli_error($link);
    }
}
?>