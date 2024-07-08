<?php
include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elcent Realtors</title>
    <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.css">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/svg+xml">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700|Oswald:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="lp_style.css">
    <style>
        /* Add custom styles here */
        .navbar {
            background-color: #0d0281;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #fff;
        }
        .hero {
            background: url('images/elcent home.jpg') no-repeat center center;
            background-size: cover;
            height: 100vh;
            color: #fff;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .hero h1 {
            font-size: 4rem;
            font-weight: bold;
        }
        .hero p {
            font-size: 1.5rem;
        }
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            font-size: 2.5rem;
        }
        .card {
            margin: 20px 0;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .card img {
            max-height: 200px;
            object-fit: cover;
        }
        .card-body {
            flex-grow: 1;
        }
        .card-text {
            display: none;
            overflow: hidden;
            max-height: 100px; /* Adjust based on your needs */
        }
        .read-more {
            cursor: pointer;
            color: blue;
        }
        .footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
        }
        .footer a {
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Elcent Realtors</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#about-us">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#properties">Properties</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonials">Testimonials</a></li>
                    <li class="nav-item"><a class="nav-link" href="#blog">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Welcome to Elcent Realtors</h1>
            <p>Your trusted real estate partner</p>
            <a href="#properties" class="btn btn-primary">View Properties</a>
        </div>
    </section>

    <!-- About Section -->
    <!-- About Us Section -->
<section id="about-us" class="about-us">
    <div class="container">
        <div class="section-title">
            <h2>About Us</h2>
            <p>Discover more about Elcent Realtors</p>
        </div>
        <div class="about-content">
            <div class="about-intro">
                <p>Elcent Realtors is dedicated to providing top-notch real estate services in Kitale and its environs. Our team is committed to helping you find the perfect property that meets your needs and exceeds your expectations.</p>
            </div>
            <div class="about-mission-vision">
                <div class="mission">
                    <h3>Our Mission</h3>
                    <p>To offer comprehensive and reliable real estate solutions, ensuring our clients receive the highest level of service and satisfaction.</p>
                </div>
                <div class="vision">
                    <h3>Our Vision</h3>
                    <p>To be the leading real estate company in Kitale, recognized for our exceptional customer service, integrity, and dedication to excellence.</p>
                </div>
            </div>
            <div class="team">
                <h3>Meet Our Team</h3>
                <div class="team-members">
                    <?php
                    $query = "SELECT name, position, image FROM team_members";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="team-member">';
                            echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
                            echo '<h4>' . $row['name'] . '</h4>';
                            echo '<p>' . $row['position'] . '</p>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No team members found.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- Services Section -->
   <!-- Services Section -->
   <div class="services-section text-center">
            <h2 class="mb-4">Our Services</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card service-card">
                        <div class="card-body">
                            <div class="service-icon mb-3">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="service-title">Sale of Property</div>
                            <p class="service-description">We offer a wide range of properties for sale in prime locations. Our properties are verified and come with all necessary documentation.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card service-card">
                        <div class="card-body">
                            <div class="service-icon mb-3">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div class="service-title">General Consultancy</div>
                            <p class="service-description">Our team of experts provides comprehensive consultancy services in real estate. We guide you through the process of buying, selling, and managing properties.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card service-card">
                        <div class="card-body">
                            <div class="service-icon mb-3">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="service-title">Rental of Properties</div>
                            <p class="service-description">We offer a variety of rental properties to meet your needs. Whether you are looking for residential or commercial properties, we have you covered.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Services Section -->

    <!-- Properties Section -->
    <section id="properties" class="py-5">
        <div class="container">
            <h2 class="section-title">Our Properties</h2>
            <div class="row">
                <!-- Dynamic properties from database -->
                <?php
                // Assuming you have a database connection in $conn
                $query = "SELECT * FROM properties";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card">';
                    echo '<img src="images/' . $row['images'] . '" class="card-img-top" alt="' . $row['title'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                    echo '<p class="card-text">' . substr($row['description'], 0, 100) . '...</p>';
                    echo '<span class="read-more" data-full-text="' . htmlspecialchars($row['description']) . '">Read More</span>';
                    echo '<a href="#" class="btn btn-primary mt-3">View Details</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">Testimonials</h2>
            <div class="row">
                <!-- Dynamic testimonials from database -->
                <?php
                $query = "SELECT * FROM testimonials";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card">';
                    echo '<img src="images/' . $row['image'] . '" class="card-img-top" alt="' . $row['name'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                    echo '<p class="card-text">' . substr($row['text'], 0, 100) . '...</p>';
                    echo '<span class="read-more" data-full-text="' . htmlspecialchars($row['text']) . '">Read More</span>';
                    echo '<p class="card-text"><small class="text-muted">' . $row['role'] . '</small></p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section id="blog" class="py-5">
        <div class="container">
            <h2 class="section-title">Our Blog</h2>
            <div class="row">
                <!-- Dynamic blog posts from database -->
                <?php
                $query = "SELECT * FROM blogs";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card">';
                    echo '<img src="images/' . $row['image'] . '" class="card-img-top" alt="' . $row['title'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                    echo '<p class="card-text">' . substr($row['excerpt'], 0, 100) . '...</p>';
                    echo '<span class="read-more" data-full-text="' . htmlspecialchars($row['excerpt']) . '">Read More</span>';
                    echo '<a href="#" class="btn btn-primary mt-3">Read More</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">Contact Us</h2>
            <form action="contact.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <p>&copy; 2024 Elcent Realtors. All Rights Reserved.</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                <li class="list-inline-item"><a href="#">Contact Us</a></li>
            </ul>
        </div>
       
    </footer>

    <!-- Back to Top Button -->
    <a href="#top" class="back-top" aria-label="Back to Top"><ion-icon name="chevron-up-outline" id="back-to-top"></ion-icon></a>


    <!-- Bootstrap JS -->
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var readMoreLinks = document.querySelectorAll('.read-more');
            readMoreLinks.forEach(function (link) {
                link.addEventListener('click', function () {
                    var fullText = this.getAttribute('data-full-text');
                    var cardText = this.previousElementSibling;
                    cardText.textContent = fullText;
                    cardText.style.display = 'block';
                    this.style.display = 'none';
                });
            });
        });
    </script>
    


</body>
</html>
