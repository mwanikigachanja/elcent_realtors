<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elcent Realtors - Legit Property Deals</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom styles here for the updated design */
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Welcome to Elcent Realtors</h1>
            <p>Your Trusted Real Estate Partner</p>
            <a href="#contact" class="btn btn-light">Contact Us</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="hero" class="hero-section" style="background-image: url('path/to/your/hero-image.jpg');">
        <div class="container text-center text-white">
            <h2>Find Your Dream Property</h2>
            <p>Discover the best properties in prime locations</p>
            <a href="#properties" class="btn btn-primary">Explore Properties</a>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="about-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>About Elcent Realtors</h2>
                    <p>We are committed to providing the best real estate services in Kitale and beyond. Our experienced team ensures you get the best deals and professional advice.</p>
                </div>
                <div class="col-md-6">
                    <img src="path/to/about-image.jpg" alt="About Us" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section bg-light py-5">
        <div class="container text-center">
            <h2>Our Services</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="service-item">
                        <i class="icon icon-sale"></i>
                        <h3>Sale of Property</h3>
                        <p>We offer a wide range of properties for sale in prime locations.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item">
                        <i class="icon icon-consultancy"></i>
                        <h3>General Consultancy</h3>
                        <p>Get expert advice on real estate investments and property management.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-item">
                        <i class="icon icon-rental"></i>
                        <h3>Rental of Properties</h3>
                        <p>Find the best rental properties that meet your needs and budget.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Properties Section -->
    <section id="properties" class="properties-section py-5">
        <div class="container">
            <h2 class="text-center">Featured Properties</h2>
            <div class="row">
                <!-- Loop through properties from the database -->
                <?php
                require 'config.php';
                $result = mysqli_query($link, "SELECT * FROM properties");
                while ($property = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-4">
                    <div class="property-item">
                        <img src="<?php echo $property['image']; ?>" alt="<?php echo $property['title']; ?>" class="img-fluid">
                        <h3><?php echo $property['title']; ?></h3>
                        <p><?php echo substr($property['description'], 0, 100); ?>...</p>
                        <a href="property.php?id=<?php echo $property['id']; ?>" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials-section bg-light py-5">
        <div class="container">
            <h2 class="text-center">What Our Clients Say</h2>
            <div class="row">
                <!-- Loop through testimonials from the database -->
                <?php
                $result = mysqli_query($link, "SELECT * FROM testimonials");
                while ($testimonial = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-4">
                    <div class="testimonial-item">
                        <img src="<?php echo $testimonial['image']; ?>" alt="<?php echo $testimonial['name']; ?>" class="img-fluid rounded-circle">
                        <h4><?php echo $testimonial['name']; ?></h4>
                        <p><?php echo $testimonial['testimonial']; ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="blog-section py-5">
        <div class="container">
            <h2 class="text-center">Latest Blog Posts</h2>
            <div class="row">
                <!-- Loop through blog posts from the database -->
                <?php
                $result = mysqli_query($link, "SELECT * FROM blog ORDER BY created_at DESC LIMIT 3");
                while ($blog = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-4">
                    <div class="blog-item">
                        <img src="<?php echo $blog['image']; ?>" alt="<?php echo $blog['title']; ?>" class="img-fluid">
                        <h3><?php echo $blog['title']; ?></h3>
                        <p><?php echo substr($blog['content'], 0, 100); ?>...</p>
                        <a href="blog.php?id=<?php echo $blog['id']; ?>" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section bg-primary text-white py-5">
        <div class="container">
            <h2 class="text-center">Get In Touch</h2>
            <div class="row">
                <div class="col-md-6">
                    <form action="contact.php" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-light">Send Message</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h3>Contact Information</h3>
                    <p><strong>Phone:</strong> +254 717 388544</p>
                    <p><strong>Email:</strong> elcentrealtors@gmail.com</p>
                    <p><strong>Address:</strong> Ebby Towers, 2nd Floor Room D5, Kenyatta Avenue, Kitale</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="To enhance your landing page to match the style and quality of Fanaka's website, we need to implement several changes across different sections of your current layout. Here is a complete update of the `index.php` to reflect these improvements:
