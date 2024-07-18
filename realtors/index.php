<?php
include 'includes/db.php';
require 'admin/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elcent Realtors</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/svg+xml">
    <link rel="stylesheet" href="lp_styles.css">
    <style>
        /* Add custom styles here */
        .card {
    border: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    transition: transform 0.3s, box-shadow 0.3s;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.card-body {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-title {
    font-size: 1.25rem;
    margin-bottom: 10px;
    font-weight: bold;
}

.card-text {
    flex-grow: 1;
    margin-bottom: 10px;
}

.card .read-more {
    align-self: flex-end;
    margin-top: auto;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 16px rgba(0, 0, 0, 0.2);
}

    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-dark text-white">
        <nav class="navbar navbar-expand-lg navbar-dark container">
            <a class="navbar-brand" href="#">Elcent Realtors</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#properties">Properties</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonials">Testimonials</a></li>
                    <li class="nav-item"><a class="nav-link" href="#blog">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-section" style="background: url('images/hero.jpg') no-repeat center center/cover; height: 80vh;">
        <div class="container h-100 d-flex justify-content-center align-items-center text-center">
            <div class="text-white">
                <h1>Welcome to Elcent Realtors</h1>
                <p>Your gateway to the finest properties in Kenya</p>
                <a href="#properties" class="btn btn-primary">Explore Properties</a>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="images/about.jpg" alt="About Us" class="img-fluid">
                </div>
                <div class="col-lg-6">
                    <h2>About Us</h2>
                    <p>Elcent Realtors is dedicated to providing exceptional real estate services in Kenya. With a focus on customer satisfaction, we offer a wide range of properties for sale and rent, as well as expert consultancy services. Our team is committed to helping you find your dream home or investment property.</p>
                    <p><strong>Our Team:</strong></p>
                    <ul>
                        <?php
                        // Fetch team members from database
                        $query = "SELECT name, position, image FROM team_members";
                        $result = mysqli_query($link, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<li><img src='images/{$row['image']}' alt='{$row['name']}' class='team-img'> {$row['name']} - {$row['position']}</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Our Services</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <i class="fas fa-home fa-3x mb-3"></i>
                    <h4>Sale of Property</h4>
                    <p>We offer a wide range of properties for sale, including residential and commercial real estate.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-handshake fa-3x mb-3"></i>
                    <h4>General Consultancy</h4>
                    <p>Our expert consultants provide valuable advice and guidance on all aspects of real estate investment.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-building fa-3x mb-3"></i>
                    <h4>Rental of Properties</h4>
                    <p>We offer a variety of rental properties to meet your needs, from apartments to commercial spaces.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Properties Section -->
    <section id="properties" class="py-5">
    <div class="container">
    <div class="row">
        <?php
        $result = mysqli_query($link, "SELECT * FROM properties");
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="images/<?= $row['images'] ?>" alt="<?= $row['title'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['title'] ?></h5>
                        <p class="card-text"><?= substr($row['description'], 0, 100) ?>...</p>
                        <a href="property_details.php?id=<?= $row['id'] ?>" class="btn btn-primary read-more">Read More</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Testimonials</h2>
            <div class="row">
                <?php
                // Fetch testimonials from database
                $query = "SELECT id, name, image, testimonial FROM testimonials";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-md-4 mb-4'>
                            <div class='card'>
                                <img src='images/{$row['image']}' alt='{$row['name']}' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$row['name']}</h5>
                                    <p class='card-text'>{$row['testimonial']}</p>
                                </div>
                            </div>
                          </div>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Latest Blog Posts</h2>
            <div class="row">
                <?php
                // Fetch blog posts from database
                $query = "SELECT id, title, image, excerpt FROM blogs";
                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-md-4 mb-4'>
                            <div class='card'>
                                <img src='images/{$row['image']}' alt='{$row['title']}' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$row['title']}</h5>
                                    <p class='card-text'>{$row['excerpt']}</p>
                                    <a href='blog_details.php?id={$row['id']}' class='btn btn-primary'>Read More</a>
                                </div>
                            </div>
                          </div>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Elcent Realtors</h5>
                    <p>Contact us for the best property deals in Kenya.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-phone"></i> +254 717 388544</li>
                        <li><i class="fas fa-envelope"></i> elcentrealtors@gmail.com</li>
                        <li><i class="fas fa-map-marker-alt"></i> Ebby Towers, 2nd Floor Room D5, Kenyatta Avenue, Kitale</li>
                    </ul>
                </div>
                <div class="col-md-6 text-right">
                    <h5>Follow Us</h5>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>&copy; 2024 Elcent Realtors. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
