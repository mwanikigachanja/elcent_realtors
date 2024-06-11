<?php include('includes/header.php'); ?>

<section class="property-details py-5">
    <div class="container">
        <?php
        include('includes/db.php');
        $id = intval($_GET['id']);
        $query = "SELECT * FROM properties WHERE id = $id";
        $result = $conn->query($query);
        $property = $result->fetch_assoc();
        ?>
        <h2><?php echo htmlspecialchars($property['title']); ?></h2>
        <img src="images/<?php echo htmlspecialchars($property['images']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($property['title']); ?>">
        <p><?php echo htmlspecialchars($property['description']); ?></p>
        <p><strong>Price:</strong> KES <?php echo number_format($property['price']); ?></p>
        <p><strong>Location:</strong> <?php echo htmlspecialchars($property['location']); ?></p>
        <p><strong>Features:</strong> <?php echo htmlspecialchars($property['features']); ?></p>
    </div>
</section>

<?php include('includes/footer.php'); ?>
