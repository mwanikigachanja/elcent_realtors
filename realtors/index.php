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
    <link rel="stylesheet" href="lp_style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <style>
        /* Assuming your CSS file is style.css or embedded in the HTML */

header, footer {
    background-color: #0D0281; /* Apply the new color */
    color: #ffffff; /* Ensure text is readable */
}

header a, footer a {
    color: #ffffff; /* Ensure links are readable */
}

header a:hover, footer a:hover {
    color: #cccccc; /* Add a hover effect for links */
}

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
    <header class="text-white">
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

    <!-- Hero Section Carousel -->
<section class="hero-carousel">
    <div class="carousel-container">
        <?php
        // Fetch images from the properties table
        $sql = "SELECT s_image FROM properties where s_image IS NOT NULL AND id >= 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="carousel-slide" style="width: 600px;">
                        <img src="images/<?= $row['s_image'] ?>" alt="Property Image">
                      </div>
                <?php
            }
        } else {
            echo "0 results";
        }

        ?>
    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
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
                        <p class="card-text"><?= substr($row['description'], 0, 200) ?>...</p>
                        <a href="property_details.php?id=<?= $row['id'] ?>" class="btn btn-primary read-more">Read More</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>

 <!-- About Us Section -->
 <section id="about" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                <div class="about-content">
            <div class="about-intro">
                <div id="video-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/xLIkHmXM3pk?si=CwzpTVaDhAoX8kKq" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            </div>
        </div>
                </div>
                <div class="col-lg-6">
                    <h2>About Us</h2>
                    <p>Elcent Realtors is dedicated to providing exceptional real estate services in Kenya. With a focus on customer satisfaction, we offer a wide range of properties for sale and rent, as well as expert consultancy services. Our team is committed to helping you find your dream home or investment property.</p>
                    <p><strong>Team Elcent</strong></p>
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
    <section id="services">
    <div class="container">
        <div class="section-title">
            <h2>Our Services</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="icon">
                        <i class="bi bi-house-door"></i>
                    </div>
                    <h4>Sale of Property</h4>
                    <p>We offer a variety of properties for sale, ensuring you find your dream home or investment property.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="icon">
                        <i class="bi bi-chat-dots"></i>
                    </div>
                    <h4>General Consultancy</h4>
                    <p>Our consultancy services provide expert advice to help you navigate the real estate market effectively.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="icon">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <h4>Property Management</h4>
                    <p>We manage rental and other properties, offering comprehensive property management services.</p>
                </div>
            </div>
        </div>
    </div>
</section>

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
    <footer class="text-white py-4">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/yyb+G6loCw3r7b3zZ0U6FlNkmd+cOQfQ6U3Qa4" crossorigin="anonymous"></script>
    <!-- Slick Carousel CDN -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.carousel-container').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
                dots: true
            });
        });
    </script>
    <script src="js/carousel.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    
</body>
</html>
