<?php
include 'includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Elcent Realtors</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.css">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/svg+xml">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700|Oswald:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    /* Reset some default browser styles for consistency across browsers */
body, h1, h2, h3, h4, h5, h6, p, a {
    margin: 0;
    padding: 0;
    font-weight: normal;
    color: #333;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f4f4f4;
    line-height: 1.6;
}

/* Global Styles */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

.text-center {
    text-align: center;
}

/* Header Styles */
.navbar {
    background-color: #333;
    padding: 1rem;
}

.navbar a {
    color: #fff;
    margin: 0 15px;
    text-decoration: none;
}

.navbar a:hover {
    color: #ddd;
}

/* Hero Section */
.hero {
    background: url('img/hero.jpg') no-repeat center center/cover;
    color: #fff;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
}

.hero h1 {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.hero p {
    font-size: 1.5rem;
    margin-bottom: 2rem;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
}

.btn-primary:hover {
    background-color: #0056b3;
}

/* About Section */
.about {
    padding: 60px 0;
    background-color: #fff;
}

.about h1, .services h1, .properties h1, .testimonials h1, .blog h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    color: #333;
}

.about p {
    font-size: 1.2rem;
    line-height: 1.8;
}

/* Services Section */
.services {
    padding: 60px 0;
    background-color: #f9f9f9;
}

.service-item {
    text-align: center;
    margin-bottom: 30px;
}

.service-item h4 {
    font-size: 1.5rem;
    margin: 10px 0;
}

.service-item p {
    font-size: 1rem;
    line-height: 1.6;
}

/* Properties Section */
.properties {
    padding: 60px 0;
}

.property-item {
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 30px;
    transition: all 0.3s ease-in-out;
}

.property-item:hover {
    transform: scale(1.05);
}

.property-item img {
    width: 100%;
    height: auto;
}

.property-item h5 {
    font-size: 1.25rem;
    margin: 10px 0;
}

.property-item p {
    font-size: 1rem;
    line-height: 1.6;
}

.property-item .price {
    font-size: 1.5rem;
    color: #007bff;
}

/* Testimonials Section */
.testimonials {
    padding: 60px 0;
    background-color: #f9f9f9;
}

.testimonial-item {
    text-align: center;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    margin-bottom: 30px;
}

.testimonial-item p {
    font-size: 1rem;
    line-height: 1.6;
}

.testimonial-item h5 {
    font-size: 1.25rem;
    margin: 10px 0;
}

.testimonial-item img {
    border-radius: 50%;
    width: 60px;
    height: 60px;
}

/* Blog Section */
.blog {
    padding: 60px 0;
}

.blog-item {
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 30px;
    transition: all 0.3s ease-in-out;
}

.blog-item:hover {
    transform: scale(1.05);
}

.blog-item img {
    width: 100%;
    height: auto;
}

.blog-item h5 {
    font-size: 1.25rem;
    margin: 10px 0;
}

.blog-item p {
    font-size: 1rem;
    line-height: 1.6;
}

.blog-item a {
    font-size: 1rem;
    color: #007bff;
    text-decoration: none;
}

.blog-item a:hover {
    text-decoration: underline;
}

/* Footer Styles */
.footer {
    background-color: #333;
    color: #fff;
    padding: 30px 0;
}

.footer a {
    color: #ddd;
    text-decoration: none;
}

.footer a:hover {
    color: #fff;
}

.footer h5 {
    font-size: 1.25rem;
    margin-bottom: 15px;
}

.footer p {
    font-size: 1rem;
    line-height: 1.6;
}

.footer .social a {
    color: #fff;
    margin-right: 10px;
}

.footer .social a:hover {
    color: #ddd;
}

/* Back to Top Button */
.back-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #007bff;
    color: #fff;
    border-radius: 50%;
    padding: 10px;
    cursor: pointer;
    display: none;
}

.back-to-top:hover {
    background-color: #0056b3;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero h1 {
        font-size: 2rem;
    }

    .hero p {
        font-size: 1.2rem;
    }
}

</style>
</head>

<body>
    <div class="container-fluid bg-dark px-0">
        <div class="row gx-0">
            <div class="col-lg-3 bg-dark d-none d-lg-block">
                <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                    <h1 class="m-0 text-primary text-uppercase">Elcent Realtors</h1>
                </a>
            </div>
            <div class="col-lg-9">
                <div class="row gx-0 bg-secondary d-none d-lg-flex">
                    <div class="col-lg-7 px-5 text-start">
                        <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                            <i class="fa fa-envelope text-primary me-2"></i>
                            <h6 class="mb-0">info@elcentrealtors.co.ke</h6>
                        </div>
                        <div class="h-100 d-inline-flex align-items-center py-2">
                            <i class="fa fa-phone-alt text-primary me-2"></i>
                            <h6 class="mb-0">+254 717 388544 </h6>
                        </div>
                    </div>
                    <div class="col-lg-5 px-5 text-end">
                        <div class="d-inline-flex align-items-center py-2">
                            <a class="btn btn-light btn-square btn-sm rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-light btn-square btn-sm rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-light btn-square btn-sm rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-light btn-square btn-sm rounded-circle me-2" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-light btn-square btn-sm rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                    <a href="index.html" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 text-primary text-uppercase">Elcent Realtors</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.html" class="nav-item nav-link active">Home</a>
                            <a href="about.html" class="nav-item nav-link">About</a>
                            <a href="service.html" class="nav-item nav-link">Service</a>
                            <a href="property.html" class="nav-item nav-link">Property</a>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 d-none d-lg-block">Login</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Luxury Living</h6>
                            <h1 class="display-3 text-white mb-4 animated slideInDown">Discover Your Perfect Home</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Our Properties</a>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Luxury Living</h6>
                            <h1 class="display-3 text-white mb-4 animated slideInDown">Find Your Dream House</h1>
                            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Our Properties</a>
                            <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Properties</h6>
                <h1 class="mb-5">Featured Properties</h1>
            </div>
            <div class="row g-4">
                <?php
                $query = "SELECT * FROM properties ORDER BY id DESC LIMIT 6";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $category = isset($row['category']) ? $row['category'] : '';
                    $type = isset($row['type']) ? $row['type'] : '';
                    $tags = isset($row['tags']) ? $row['tags'] : '';
                    $video_link = isset($row['video_link']) ? $row['video_link'] : '';
                    $image = isset($row['image']) ? $row['image'] : 'img/property-1.jpg'; // Default image if none
                    $name = isset($row['name']) ? $row['name'] : 'Unknown';
                    $location = isset($row['location']) ? $row['location'] : 'Unknown';
                    $price = isset($row['price']) ? $row['price'] : 'Contact for price';

                    echo "
                    <div class='col-lg-4 col-md-6 wow fadeInUp' data-wow-delay='0.1s'>
                        <div class='property-item rounded overflow-hidden'>
                            <div class='position-relative overflow-hidden'>
                                <a href=''><img class='img-fluid' src='$image' alt=''></a>
                                <div class='bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3'>$category</div>
                                <div class='bg-secondary rounded text-white position-absolute end-0 bottom-0 m-4 py-1 px-3'>$type</div>
                            </div>
                            <div class='p-4'>
                                <h5 class='mb-3'>$name</h5>
                                <p><i class='fa fa-map-marker-alt text-primary me-2'></i>$location</p>
                                <span class='d-block mb-2'><i class='fa fa-tags text-primary me-2'></i>$tags</span>
                                <span class='text-primary'>$price</span>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Testimonials</h6>
                <h1 class="mb-5">What Our Clients Say</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <?php
                $query = "SELECT * FROM testimonials ORDER BY id DESC LIMIT 6";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $client_name = isset($row['client_name']) ? $row['client_name'] : 'Anonymous';
                    $position = isset($row['position']) ? $row['position'] : '';
                    $testimonial = isset($row['testimonial']) ? $row['testimonial'] : 'No testimonial provided';

                    echo "
                    <div class='testimonial-item bg-light rounded p-4'>
                        <i class='fa fa-quote-left fa-2x text-primary mb-3'></i>
                        <p>$testimonial</p>
                        <div class='d-flex align-items-center'>
                            <img class='img-fluid flex-shrink-0 rounded-circle' src='img/testimonial-1.jpg' alt=''>
                            <div class='ps-3'>
                                <h5 class='mb-1'>$client_name</h5>
                                <span>$position</span>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Blog</h6>
                <h1 class="mb-5">Latest From Our Blog</h1>
            </div>
            <div class="row g-4">
                <?php
                $query = "SELECT * FROM blogs ORDER BY id DESC LIMIT 3";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $title = isset($row['title']) ? $row['title'] : 'No title';
                    $description = isset($row['description']) ? $row['description'] : 'No description';
                    $date = isset($row['date']) ? $row['date'] : 'No date';
                    $image = isset($row['image']) ? $row['image'] : 'img/blog-1.jpg'; // Default image if none

                    echo "
                    <div class='col-lg-4 col-md-6 wow fadeInUp' data-wow-delay='0.1s'>
                        <div class='blog-item rounded overflow-hidden'>
                            <div class='position-relative overflow-hidden'>
                                <a href=''><img class='img-fluid' src='$image' alt=''></a>
                                <div class='bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3'>$date</div>
                            </div>
                            <div class='p-4'>
                                <h5 class='mb-3'>$title</h5>
                                <p>$description</p>
                                <a class='text-uppercase' href=''>Read More <i class='bi bi-arrow-right'></i></a>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-dark text-white-50 footer mt-5 py-5 px-0">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white text-uppercase mb-4">Get In Touch</h5>
                    <p class="mb-4">Feel free to reach out to us for any inquiries or assistance. We're here to help you find your perfect property.</p>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>Ebby Towers, 2nd Floor Room D5, Kenyatta Avenue, Kitale</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary me-3"></i>+254 717 388544</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>info@elcentrealtors.co.ke</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white text-uppercase mb-4">Quick Links</h5>
                    <a class="text-white-50 mb-2" href="index.html"><i class="fa fa-angle-right me-2"></i>Home</a>
                    <a class="text-white-50 mb-2" href="about.html"><i class="fa fa-angle-right me-2"></i>About</a>
                    <a class="text-white-50 mb-2" href="service.html"><i class="fa fa-angle-right me-2"></i>Service</a>
                    <a class="text-white-50 mb-2" href="property.html"><i class="fa fa-angle-right me-2"></i>Property</a>
                    <a class="text-white-50 mb-2" href="contact.html"><i class="fa fa-angle-right me-2"></i>Contact</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white text-uppercase mb-4">Photo Gallery</h5>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/property-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/property-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/property-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/property-4.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/property-5.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/property-6.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white text-uppercase mb-4">Newsletter</h5>
                    <p>Sign up to receive updates and news directly in your inbox.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Elcent Realtors</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

<?php
$conn->close();
?>
