<?php include('../includes/header.php'); ?>
<?php include('../db.php'); ?>

<div class="container mt-5">
  <h1 class="mb-4">Available Properties</h1>
  <div class="row">
    <?php
    $sql = "SELECT * FROM properties";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card">';
        echo '<img src="/images/' . $row["images"] . '" class="card-img-top" alt="' . $row["title"] . '">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row["title"] . '</h5>';
        echo '<p class="card-text">' . $row["description"] . '</p>';
        echo '<p class="card-text">Location: ' . $row["location"] . '</p>';
        echo '<p class="card-text">Price: ' . $row["price"] . '</p>';
        echo '<a href="#" class="btn btn-primary">More Info</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
      }
    } else {
      echo "<p>No properties found</p>";
    }
    $conn->close();
    ?>
  </div>
</div>
<?php include('../includes/footer.php'); ?>
