<?php
include 'admin/config.php'; // Include database connection

// Fetch properties
$properties_sql = "SELECT * FROM properties WHERE status='available'";
$properties_result = mysqli_query($link, $properties_sql);

// Fetch testimonials
$testimonials_sql = "SELECT * FROM testimonials";
$testimonials_result = mysqli_query($link, $testimonials_sql);

// Fetch blogs
$blogs_sql = "SELECT * FROM blogs WHERE status='published'";
$blogs_result = mysqli_query($link, $blogs_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>ELCENT REALTORS - YOUR LEGIT PROPERTY DEALER</title>
  <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.css">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/svg+xml">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="assets/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700|Oswald:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

  <!-- HEADER -->
  <header class="header" data-header>
    <div class="overlay" data-overlay></div>
    <div class="header-top">
      <div class="container">
        <ul class="header-top-list">
          <li>
            <a href="mailto:info@elcentrealtors.com" class="header-top-link">
              <ion-icon name="mail-outline"></ion-icon>
              <span>info@elcentrealtors.com</span>
            </a>
          </li>
          <li>
            <a href="#" class="header-top-link">
              <ion-icon name="location-outline"></ion-icon>
              <address>Ebby Towers, 2nd Floor Room D5, Kenyatta Avenue, Kitale</address>
            </a>
          </li>
        </ul>
        <div class="wrapper">
          <ul class="header-top-social-list">
            <li><a href="#" class="header-top-social-link"><ion-icon name="logo-facebook"></ion-icon></a></li>
            <li><a href="#" class="header-top-social-link"><ion-icon name="logo-twitter"></ion-icon></a></li>
            <li><a href="#" class="header-top-social-link"><ion-icon name="logo-instagram"></ion-icon></a></li>
            <li><a href="#" class="header-top-social-link"><ion-icon name="logo-pinterest"></ion-icon></a></li>
          </ul>
          <button class="header-top-btn">Login</button>
        </div>
      </div>
    </div>
    <div class="header-bottom">
      <div class="container" height="100" weight="100%">
        <a href="index.html" class="logo"><img src="images/ELCENT-logo-001.jpg" alt="Homeverse logo" width="200" height="50"></a>
        <nav class="navbar" data-navbar>
          <div class="navbar-top">
            <a href="#" class="logo"><img src="images/ELCENT-logo-001.jpg" alt="Homeverse logo" width="200" height="50"></a>
            <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu"><ion-icon name="close-outline"></ion-icon></button>
          </div>
          <div class="navbar-bottom">
            <ul class="navbar-list">
              <li><a href="#home" class="navbar-link" data-nav-link>Home</a></li>
              <li><a href="#about" class="navbar-link" data-nav-link>About</a></li>
              <li><a href="#service" class="navbar-link" data-nav-link>Service</a></li>
              <li><a href="#property" class="navbar-link" data-nav-link>Property</a></li>
              <li><a href="#blog" class="navbar-link" data-nav-link>Blog</a></li>
              <li><a href="#contact" class="navbar-link" data-nav-link>Contact</a></li>
            </ul>
          </div>
        </nav>
        <div class="header-bottom-actions">
          <button class="header-bottom-actions-btn" aria-label="Search"><ion-icon name="search-outline"></ion-icon><span>Search</span></button>
          <button class="header-bottom-actions-btn" aria-label="Profile"><ion-icon name="person-outline"></ion-icon><span>Profile</span></button>
          <button class="header-bottom-actions-btn" aria-label="Cart"><ion-icon name="cart-outline"></ion-icon><span>Cart</span></button>
          <button class="header-bottom-actions-btn" data-nav-open-btn aria-label="Open Menu"><ion-icon name="menu-outline"></ion-icon><span>Menu</span></button>
        </div>
      </div>
    </div>
  </header>

  <main>
    <article>
      <!-- HERO SECTION -->
      <section class="hero" id="home">
        <div class="container">
          <div class="hero-content">
            <p class="hero-subtitle">
              <ion-icon name="home"></ion-icon>
              <span>Legit Property Deals</span>
            </p>
            <h2 class="h1 hero-title">Find Your Property Through Us</h2>
            <p class="hero-text">Legit property deals: be it your dream home or a piece of land for your project. We are here to help you.</p>
            <button class="btn">Make An Enquiry</button>
          </div>
          <figure class="hero-banner">
            <img src="images/elcent home.jpg" alt="Modern house model" class="w-100">
          </figure>
        </div>
      </section>

      <!-- ABOUT SECTION -->
      <section class="about" id="about">
        <div class="container">
          <figure class="about-banner">
            <img src="images/elcent plot 2.jpg" alt="Valuable Plots">
            <img src="images/elcent estates.jpg" alt="Secure Estates" class="abs-img">
          </figure>
          <div class="about-content">
            <p class="section-subtitle">About Us</p>
            <h2 class="h2 section-title">The Leading Legit Property Dealer in Kenya.</h2>
            <p class="about-text">ELCENT REALTORS is a leading legit property dealer in Kenya with an impeccable record of providing real estate services and property management to clients with varied needs.</p>
            <ul class="about-list">
              <li class="about-item">
                <div class="about-item-icon"><ion-icon name="home-outline"></ion-icon></div>
                <p class="about-item-text">Trusted property sales.</p>
              </li>
              <li class="about-item">
                <div class="about-item-icon"><ion-icon name="business-outline"></ion-icon></div>
                <p class="about-item-text">Reliable property management.</p>
              </li>
              <li class="about-item">
                <div class="about-item-icon"><ion-icon name="business-outline"></ion-icon></div>
                <p class="about-item-text">Professionalism and integrity.</p>
              </li>
            </ul>
            <button class="btn">Learn More</button>
          </div>
        </div>
      </section>

      <!-- SERVICE SECTION -->
      <section class="service" id="service">
        <div class="container">
          <p class="section-subtitle">Our Services</p>
          <h2 class="h2 section-title">What We Offer</h2>
          <ul class="service-list">
            <li class="service-item">
              <div class="service-card">
                <div class="card-icon"><ion-icon name="home-outline"></ion-icon></div>
                <h3 class="h3 card-title">Property Sales</h3>
                <p class="card-text">We provide the best deals on property sales in Kenya. Our portfolio includes a wide range of properties to suit your needs.</p>
              </div>
            </li>
            <li class="service-item">
              <div class="service-card">
                <div class="card-icon"><ion-icon name="business-outline"></ion-icon></div>
                <h3 class="h3 card-title">Property Management</h3>
                <p class="card-text">Our property management services ensure that your property is well taken care of, maximizing its value and ensuring tenant satisfaction.</p>
              </div>
            </li>
            <li class="service-item">
              <div class="service-card">
                <div class="card-icon"><ion-icon name="business-outline"></ion-icon></div>
                <h3 class="h3 card-title">Consultation</h3>
                <p class="card-text">We offer professional consultation services to help you make informed decisions about your property investments.</p>
              </div>
            </li>
          </ul>
        </div>
      </section>

      <!-- PROPERTY SECTION -->
      <section class="property" id="property">
        <div class="container">
          <p class="section-subtitle">Featured Properties</p>
          <h2 class="h2 section-title">Our Latest Properties</h2>
          <ul class="property-list" id="property-list">
            <!-- Properties Section -->
    <div class="properties-section">
        <?php while ($property = mysqli_fetch_assoc($properties_result)) { ?>
            <div class="property-card">
                <h3><?php echo $property['title']; ?></h3>
                <p><?php echo $property['description']; ?></p>
                <p>Price: <?php echo $property['price']; ?></p>
                <p>Location: <?php echo $property['location']; ?></p>
                <p>Category: <?php echo $property['category']; ?></p>
                <p>Type: <?php echo $property['type']; ?></p>
                <p>Tags: <?php echo $property['tags']; ?></p>
                <a href="<?php echo $property['video_link']; ?>" target="_blank">Video Tour</a>
            </div>
        <?php } ?>
    </div>
          </ul>
        </div>
      </section>

      <!-- TESTIMONIAL SECTION -->
      <section class="testimonial" id="testimonial">
        <div class="container">
          <p class="section-subtitle">Testimonials</p>
          <h2 class="h2 section-title">What Our Clients Say</h2>
          <ul class="testimonial-list" id="testimonial-list">
            <!-- Testimonials Section -->
    <div class="testimonials-section">
        <?php while ($testimonial = mysqli_fetch_assoc($testimonials_result)) { ?>
            <div class="testimonial-card">
                <p><?php echo $testimonial['testimonial']; ?></p>
                <p>- <?php echo $testimonial['name']; ?>, <?php echo $testimonial['position']; ?></p>
            </div>
        <?php } ?>
    </div>
          </ul>
        </div>
      </section>

      <!-- BLOG SECTION -->
      <section class="blog" id="blog">
        <div class="container">
          <p class="section-subtitle">Blog & News</p>
          <h2 class="h2 section-title">Latest News & Articles</h2>
          <ul class="blog-list" id="blog-list">
           <!-- Blogs Section -->
    <div class="blogs-section">
        <?php while ($blog = mysqli_fetch_assoc($blogs_result)) { ?>
            <div class="blog-card">
                <h3><?php echo $blog['title']; ?></h3>
                <p><?php echo $blog['content']; ?></p>
                <p>Author: <?php echo $blog['author']; ?></p>
                <p>Published: <?php echo $blog['created_at']; ?></p>
            </div>
        <?php } ?>
    </div>
          </ul>
        </div>
      </section>
    </article>
  </main>

  <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/script.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Fetch properties
      fetch('fetch_properties.php')
        .then(response => response.json())
        .then(data => {
          const propertyList = document.getElementById('property-list');
          data.forEach(property => {
            const li = document.createElement('li');
            li.className = 'property-item';
            li.innerHTML = `
              <div class="property-card">
                <figure class="card-banner">
                  <a href="property-details.html?id=${property.id}">
                    <img src="${property.image}" alt="${property.title}">
                  </a>
                </figure>
                <div class="card-content">
                  <div class="card-price">
                    <strong>KES ${property.price}</strong>
                  </div>
                  <h3 class="h3 card-title">
                    <a href="property-details.html?id=${property.id}">${property.title}</a>
                  </h3>
                  <ul class="card-list">
                    <li class="card-item"><strong>${property.bedrooms}</strong> <ion-icon name="bed-outline"></ion-icon></li>
                    <li class="card-item"><strong>${property.bathrooms}</strong> <ion-icon name="bathroom-outline"></ion-icon></li>
                    <li class="card-item"><strong>${property.size}</strong> <ion-icon name="cube-outline"></ion-icon></li>
                  </ul>
                </div>
              </div>`;
            propertyList.appendChild(li);
          });
        });

      // Fetch testimonials
      fetch('fetch_testimonials.php')
        .then(response => response.json())
        .then(data => {
          const testimonialList = document.getElementById('testimonial-list');
          data.forEach(testimonial => {
            const li = document.createElement('li');
            li.className = 'testimonial-item';
            li.innerHTML = `
              <div class="testimonial-card">
                <div class="card-content">
                  <p class="card-text">${testimonial.content}</p>
                  <div class="card-client">
                    <div class="client-img"><img src="${testimonial.image}" alt="${testimonial.name}"></div>
                    <div class="client-info">
                      <h4 class="h4 client-name">${testimonial.name}</h4>
                      <p class="client-title">${testimonial.title}</p>
                    </div>
                  </div>
                </div>
              </div>`;
            testimonialList.appendChild(li);
          });
        });

      // Fetch blogs
      fetch('fetch_blogs.php')
        .then(response => response.json())
        .then(data => {
          const blogList = document.getElementById('blog-list');
          data.forEach(blog => {
            const li = document.createElement('li');
            li.className = 'blog-item';
            li.innerHTML = `
              <div class="blog-card">
                <figure class="card-banner">
                  <a href="blog-details.html?id=${blog.id}">
                    <img src="${blog.image}" alt="${blog.title}">
                  </a>
                </figure>
                <div class="card-content">
                  <h3 class="h3 card-title">
                    <a href="blog-details.html?id=${blog.id}">${blog.title}</a>
                  </h3>
                  <div class="card-meta">
                    <time datetime="${blog.date}">${blog.date}</time>
                    <p class="card-author">${blog.author}</p>
                  </div>
                </div>
              </div>`;
            blogList.appendChild(li);
          });
        });
    });
  </script>
</body>
</html>
