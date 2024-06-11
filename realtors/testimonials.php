<?php include('includes/header.php'); ?>

<section class="testimonials-section py-5">
    <div class="container">
        <h2 class="text-center">Client Testimonials</h2>
        <div class="row">
            <?php
            include('includes/db.php');
            $result = $conn->query("SELECT * FROM testimonials");
            while ($testimonial = $result->fetch_assoc()) {
            ?>
                <div class="col-md-4">
                    <div class="testimonial">
                        <p>"<?php echo htmlspecialchars($testimonial['message']); ?>"</p>
                        <p><strong>- <?php echo htmlspecialchars($testimonial['client_name']); ?></strong></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>
