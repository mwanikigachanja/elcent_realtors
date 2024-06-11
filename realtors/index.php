<?php include('includes/header.php'); ?>

<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Welcome to Elcent Realtors</h1>
                <p>Your dream property, just a click away!</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Properties Section -->
<section class="featured-properties py-5">
    <div class="container">
        <h2 class="text-center">Featured Properties</h2>
        <div class="row">
            <?php
            include('includes/db.php');
            $query = "SELECT * FROM properties LIMIT 3";
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="images/' . $row['images'] . '" class="card-img-top" alt="' . $row['title'] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $row['title'] . '</h5>
                            <p class="card-text">' . substr($row['description'], 0, 100) . '...</p>
                            <p class="card-text"><strong>Price:</strong> KES ' . number_format($row['price']) . '</p>
                            <a href="property.php?id=' . $row['id'] . '" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
