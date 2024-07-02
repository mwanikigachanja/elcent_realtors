<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Properties</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/svg+xml">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <div class="container">
    
    <?php
include 'config.php';

// Fetch properties from database
$query = "SELECT * FROM properties";
$result = mysqli_query($link, $query);
?>

        <h1 class="mb-4">Manage Properties</h1>
        <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#addPropertyModal">
            Add New Property
        </button>
        <!-- Property Table -->
        <table class="table table-striped mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Location</th>
                    <th>Features</th>
                    <th>Images</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Add PHP code to fetch and display properties from database -->
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['location'];?></td>
                <td><?php echo $row['features'];?></td>
                <td><?php echo $row['images'];?></td>
                <td><?php echo $row['status'];?></td>
                <td>
                    <a href="edit_property.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="delete_property.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>
            </tbody>
        </table>
    </div>

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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
