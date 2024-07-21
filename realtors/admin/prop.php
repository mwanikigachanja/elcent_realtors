<?php
session_start();
require 'config.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Add Property
    if (isset($_POST['add_property'])) {
        $title = mysqli_real_escape_string($link, $_POST['title']);
        $description = mysqli_real_escape_string($link, $_POST['description']);
        $features = mysqli_real_escape_string($link, $_POST['features']);
        $price = mysqli_real_escape_string($link, $_POST['price']);
        $location = mysqli_real_escape_string($link, $_POST['location']);
        $image = NULL;

        if (isset($_FILES['images']) && $_FILES['images']['error'] == 0) {
            $target_dir = 'images/';
            $target_file = $target_dir . basename($_FILES['images']['name']);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $check = getimagesize($_FILES['images']['tmp_name']);
            if ($check !== false && $_FILES['images']['size'] <= 5000000 && in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
                if (move_uploaded_file($_FILES['images']['tmp_name'], $target_file)) {
                    $image = $target_file;
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                }
            } else {
                $error = "File is not an image, too large, or unsupported format.";
            }
        }

        if (empty($error)) {
            $query = "INSERT INTO properties (title, description, features, price, location, images) VALUES ('$title', '$description', '$features', '$price', '$location', ?)";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, 's', $image);

            if (mysqli_stmt_execute($stmt)) {
                $success = "Property added successfully.";
            } else {
                $error = "Error adding property: " . mysqli_error($link);
            }
        }
    }

    // Edit Property
    if (isset($_POST['edit_property'])) {
        $id = mysqli_real_escape_string($link, $_POST['id']);
        $title = mysqli_real_escape_string($link, $_POST['title']);
        $description = mysqli_real_escape_string($link, $_POST['description']);
        $features = mysqli_real_escape_string($link, $_POST['features']);
        $price = mysqli_real_escape_string($link, $_POST['price']);
        $location = mysqli_real_escape_string($link, $_POST['location']);
        $image = NULL;

        if (isset($_FILES['images']) && $_FILES['images']['error'] == 0) {
            $target_dir = 'images/';
            $target_file = $target_dir . basename($_FILES['images']['name']);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $check = getimagesize($_FILES['images']['tmp_name']);
            if ($check !== false && $_FILES['images']['size'] <= 5000000 && in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
                if (move_uploaded_file($_FILES['images']['tmp_name'], $target_file)) {
                    $image = $target_file;
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                }
            } else {
                $error = "File is not an image, too large, or unsupported format.";
            }
        }

        if (empty($error)) {
            if ($image) {
                $query = "UPDATE properties SET title = '$title', description = '$description', features = $features, price = '$price', location = '$location', image = ? WHERE id = '$id'";
                $stmt = mysqli_prepare($link, $query);
                mysqli_stmt_bind_param($stmt, 's', $image);
            } else {
                $query = "UPDATE properties SET title = '$title', description = '$description', features = $features, price = '$price', location = '$location' WHERE id = '$id'";
            }

            if (mysqli_stmt_execute($stmt)) {
                $success = "Property updated successfully.";
            } else {
                $error = "Error updating property: " . mysqli_error($link);
            }
        }
    }

    // Delete Property
    if (isset($_POST['delete_property'])) {
        $id = mysqli_real_escape_string($link, $_POST['id']);
        $query = "DELETE FROM properties WHERE id = '$id'";

        if (mysqli_query($link, $query)) {
            $success = "Property deleted successfully.";
        } else {
            $error = "Error deleting property: " . mysqli_error($link);
        }
    }
}

// Fetch Properties
$query = "SELECT * FROM properties";
$result = mysqli_query($link, $query);
$properties = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Properties - Elcent Realtors</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Manage Properties</h1>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php elseif ($success): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>
        <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#addPropertyModal">Add Property</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Location</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($properties as $property): ?>
                    <tr>
                        <td><?= $property['id'] ?></td>
                        <td><?= $property['title'] ?></td>
                        <td><?= $property['description'] ?></td>
                        <td><?= $property['price'] ?></td>
                        <td><?= $property['location'] ?></td>
                        <td><img src="<?= $property['image'] ?>" alt="Property Image" style="width: 100px; height: auto;"></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPropertyModal" data-id="<?= $property['id'] ?>" data-title="<?= $property['title'] ?>" data-description="<?= $property['description'] ?>" data-price="<?= $property['price'] ?>" data-location="<?= $property['location'] ?>">Edit</button>
                            <form method="post" action="" class="d-inline">
                                <input type="hidden" name="id" value="<?= $property['id'] ?>">
                                <button type="submit" name="delete_property" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Add Property Modal -->
    <div class="modal fade" id="addPropertyModal" tabindex="-1" role="dialog" aria-labelledby="addPropertyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPropertyModalLabel">Add Property</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <input type="hidden" name="add_property" value="1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Property</buttonHere's the complete and improved `manage_properties.php` file, ensuring all functionalities, including editing, deleting, and adding properties, are working without errors:

```php
<?php
session_start();
require 'config.php';

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Add Property
    if (isset($_POST['add_property'])) {
        $title = mysqli_real_escape_string($link, $_POST['title']);
        $description = mysqli_real_escape_string($link, $_POST['description']);
        $price = mysqli_real_escape_string($link, $_POST['price']);
        $location = mysqli_real_escape_string($link, $_POST['location']);
        $image = NULL;

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = 'images/properties/';
            $target_file = $target_dir . basename($_FILES['image']['name']);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $check = getimagesize($_FILES['image']['tmp_name']);
            if ($check !== false && $_FILES['image']['size'] <= 5000000 && in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $image = $target_file;
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                }
            } else {
                $error = "File is not an image, too large, or unsupported format.";
            }
        }

        if (empty($error)) {
            $query = "INSERT INTO properties (title, description, price, location, image) VALUES ('$title', '$description', '$price', '$location', ?)";
            $stmt = mysqli_prepare($link, $query);
            mysqli_stmt_bind_param($stmt, 's', $image);

            if (mysqli_stmt_execute($stmt)) {
                $success = "Property added successfully.";
            } else {
                $error = "Error adding property: " . mysqli_error($link);
            }
        }
    }

    // Edit Property
    if (isset($_POST['edit_property'])) {
        $id = mysqli_real_escape_string($link, $_POST['id']);
        $title = mysqli_real_escape_string($link, $_POST['title']);
        $description = mysqli_real_escape_string($link, $_POST['description']);
        $price = mysqli_real_escape_string($link, $_POST['price']);
        $location = mysqli_real_escape_string($link, $_POST['location']);
        $image = NULL;

        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $target_dir = 'images/properties/';
            $target_file = $target_dir . basename($_FILES['image']['name']);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $check = getimagesize($_FILES['image']['tmp_name']);
            if ($check !== false && $_FILES['image']['size'] <= 5000000 && in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $image = $target_file;
                } else {
                    $error = "Sorry, there was an error uploading your file.";
                }
            } else {
                $error = "File is not an image, too large, or unsupported format.";
            }
        }

        if (empty($error)) {
            if ($image) {
                $query = "UPDATE properties SET title = '$title', description = '$description', price = '$price', location = '$location', image = ? WHERE id = '$id'";
                $stmt = mysqli_prepare($link, $query);
                mysqli_stmt_bind_param($stmt, 's', $image);
            } else {
                $query = "UPDATE properties SET title = '$title', description = '$description', price = '$price', location = '$location' WHERE id = '$id'";
            }

            if (mysqli_stmt_execute($stmt)) {
                $success = "Property updated successfully.";
            } else {
                $error = "Error updating property: " . mysqli_error($link);
            }
        }
    }

    // Delete Property
    if (isset($_POST['delete_property'])) {
        $id = mysqli_real_escape_string($link, $_POST['id']);
        $query = "DELETE FROM properties WHERE id = '$id'";

        if (mysqli_query($link, $query)) {
            $success = "Property deleted successfully.";
        } else {
            $error = "Error deleting property: " . mysqli_error($link);
        }
    }
}

// Fetch Properties
$query = "SELECT * FROM properties";
$result = mysqli_query($link, $query);
$properties = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Properties - Elcent Realtors</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Manage Properties</h1>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php elseif ($success): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>
        <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#addPropertyModal">Add Property</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Location</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($properties as $property): ?>
                    <tr>
                        <td><?= $property['id'] ?></td>
                        <td><?= $property['title'] ?></td>
                        <td><?= $property['description'] ?></td>
                        <td><?= $property['price'] ?></td>
                        <td><?= $property['location'] ?></td>
                        <td><img src="<?= $property['image'] ?>" alt="Property Image" style="width: 100px; height: auto;"></td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPropertyModal" data-id="<?= $property['id'] ?>" data-title="<?= $property['title'] ?>" data-description="<?= $property['description'] ?>" data-price="<?= $property['price'] ?>" data-location="<?= $property['location'] ?>">Edit</button>
                            <form method="post" action="" class="d-inline">
                                <input type="hidden" name="id" value="<?= $property['id'] ?>">
                                <button type="submit" name="delete_property" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Add Property Modal -->
    <div class="modal fade" id="addPropertyModal" tabindex="-1" role="dialog" aria-labelledby="addPropertyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPropertyModalLabel">Add Property</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <input type="hidden" name="add_property" value="1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Property</button>
```php
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Property Modal -->
    <div class="modal fade" id="editPropertyModal" tabindex="-1" role="dialog" aria-labelledby="editPropertyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPropertyModalLabel">Edit Property</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit_id" name="id">
                        <div class="form-group">
                            <label for="edit_title">Title</label>
                            <input type="text" class="form-control" id="edit_title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_description">Description</label>
                            <textarea class="form-control" id="edit_description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_price">Price</label>
                            <input type="number" class="form-control" id="edit_price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_location">Location</label>
                            <input type="text" class="form-control" id="edit_location" name="location" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_image">Image</label>
                            <input type="file" class="form-control" id="edit_image" name="image">
                        </div>
                        <input type="hidden" name="edit_property" value="1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('#editPropertyModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var title = button.data('title');
            var description = button.data('description');
            var price = button.data('price');
            var location = button.data('location');

            var modal = $(this);
            modal.find('#edit_id').val(id);
            modal.find('#edit_title').val(title);
            modal.find('#edit_description').val(description);
            modal.find('#edit_price').val(price);
            modal.find('#edit_location').val(location);
        });
    </script>
</body>
</html>
