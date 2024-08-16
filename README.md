# By Charles Mwaniki 

# More coming

Fullstack Developer - in power

# Elcent Realtors Web Application

## Introduction

Welcome to the Elcent Realtors Web Application, a comprehensive real estate platform designed to cater to all your property needs. This application allows users to view property listings, book properties, make payments, and manage their accounts. It also includes an admin module for managing properties, users, reservations, and more.

## Features

- **User Authentication:** Secure registration, login, and password recovery.
- **Property Listings:** Browse and search properties with detailed information.
- **Booking and Payments:** Reserve properties and make payments online.
- **Admin Dashboard:** Manage properties, reservations, testimonials, users, and view analytics.
- **Blog Section:** Latest news and updates about real estate.
- **Testimonials:** User feedback and reviews.
- **Responsive Design:** Optimized for various devices using Bootstrap.

## Technology Stack

- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Backend:** PHP, MySQL
- **APIs:** MPESA for payments, PHPMailer for email notifications

## Installation
Done
### Prerequisites

- Web server (Apache, Nginx, etc.)
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Composer (for dependency management)
- Node.js and npm (for JavaScript dependencies)

### Steps

1. **Clone the Repository:**
   ```sh
   git clone https://github.com/yourusername/elcent-realtors.git
   cd elcent-realtors
   ```

2. **Install PHP Dependencies:**
   ```sh
   composer install
   ```

3. **Install JavaScript Dependencies:**
   ```sh
   npm install
   ```

4. **Set Up Environment Variables:**
   Create a `.env` file in the root directory and add the following:
   ```
   DB_HOST=your_db_host
   DB_USER=your_db_user
   DB_PASS=your_db_password
   DB_NAME=your_db_name

   MPESA_CONSUMER_KEY=your_consumer_key
   MPESA_CONSUMER_SECRET=your_consumer_secret

   SMTP_HOST=your_smtp_host
   SMTP_USER=your_smtp_user
   SMTP_PASS=your_smtp_password
   SMTP_PORT=your_smtp_port
   ```

5. **Set Up the Database:**
   Import the `database.sql` file into your MySQL database.

6. **Configure Apache/Nginx:**
   Ensure your web server points to the `public` directory of the project.

7. **Run the Application:**
   Start your web server and navigate to `http://yourdomain.com`.

## Directory Structure

```
elcent-realtors/
├── assets/
│   ├── css/
│   ├── images/
│   ├── js/
│   └── ...
├── config/
│   └── database.php
├── public/
│   ├── index.php
│   ├── login.php
│   ├── register.php
│   ├── ...
├── src/
│   ├── controllers/
│   ├── models/
│   ├── views/
│   └── ...
├── vendor/
├── .env
├── composer.json
├── package.json
├── README.md
└── ...
```

## Usage

### User Actions

- **Register:** Create an account to access property listings and make reservations.
- **Login:** Authenticate to manage bookings and view personal information.
- **Browse Properties:** View detailed information about available properties.
- **Book Property:** Reserve a property and proceed to payment.
- **View Blog:** Stay updated with the latest news and articles.
- **Leave a Testimonial:** Share your experience and feedback.

### Admin Actions

- **Login:** Access the admin dashboard.
- **Manage Properties:** Add, edit, or delete property listings.
- **Manage Reservations:** View and manage user reservations.
- **Manage Testimonials:** Approve or delete user feedback.
- **Manage Users:** View and manage registered users.
- **View Analytics:** Monitor site performance and user activities.

## Contributing

We welcome contributions! Please fork the repository and create a pull request with your changes. Make sure to follow the coding guidelines and test your changes thoroughly.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

For inquiries, support, or feedback, reach out to us at:

- **Phone:** 0717 388 544 / 0754 178 604
- **Email:** info@elcentrealtors.co.ke
- **Address:** Ebby Towers, 2nd Floor Room D5, Kenyatta Avenue, Kitale

---

Thank you for using Elcent Realtors! We hope you have a great experience with our platform.


Cross platform magic.


Materially working. 

Dues in line