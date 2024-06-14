<?php

// Database connection
function db_connect() {
    $servername = "102.218.215.29";
    $username = "elcentre_root";
    $password = "PE{Tgr{qI=Lm";
    $dbname = "elcentre_main_app";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Register admin
function register_admin($username, $email, $password) {
    $conn = db_connect();

    $username = $conn->real_escape_string($username);
    $email = $conn->real_escape_string($email);
    $token = bin2hex(random_bytes(50));

    $query = "INSERT INTO admins (username, email, password, token, is_verified) VALUES ('$username', '$email', '$password', '$token', 0)";
    
    if ($conn->query($query) === TRUE) {
        $subject = "Activate your admin account";
        $message = "Please click the link below to activate your account:\n\n";
        $message .= "http://elcentrealtors.co.ke/activate_admin.php?token=$token";
        send_email($email, $subject, $message);
        return true;
    } else {
        return false;
    }
}


// Activate admin account
function activate_admin($token) {
    $conn = db_connect();

    $token = $conn->real_escape_string($token);
    $query = "UPDATE admins SET is_verified = 1 WHERE token = '$token'";

    if ($conn->query($query) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Sending email function
function send_email($to, $subject, $message) {
    $headers = "From: noreply@elcentrealtors.co.ke";
    mail($to, $subject, $message, $headers);
}

// Check if admin is verified
function is_admin_verified($admin_id) {
    $conn = db_connect();

    $query = "SELECT is_verified FROM admins WHERE id = '$admin_id'";
    $result = $conn->query($query);
    $admin = $result->fetch_assoc();

    return $admin['is_verified'];
}

// User authentication with verification check
function authenticate_admin($email, $password) {
    $conn = db_connect();

    $email = $conn->real_escape_string($email);
    $query = "SELECT * FROM admins WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password']) && $admin['is_verified']) {
            return $admin;
        }
    }

    return false;
}

// Redirect if not logged in or not verified
function redirect_if_not_logged_in_or_verified() {
    if (!is_logged_in() || !is_admin_verified($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
}


// User authentication
function authenticate_user($email, $password) {
    $conn = db_connect();

    $email = $conn->real_escape_string($email);
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            return $user;
        }
    }
    
    return false;
}

// Check if user is logged in
function is_logged_in() {
    session_start();
    return isset($_SESSION['user_id']);
}

// Redirect if not logged in
function redirect_if_not_logged_in() {
    if (!is_logged_in()) {
        header("Location: login.php");
        exit;
    }
}
// Get user reservations
function get_user_reservations($user_id) {
    $conn = db_connect();

    $query = "SELECT * FROM reservations WHERE user_id = '$user_id'";
    $result = $conn->query($query);

    $reservations = [];
    while ($row = $result->fetch_assoc()) {
        $reservations[] = $row;
    }

    return $reservations;
}

// Add reservation
function add_reservation($user_id, $property_id) {
    $conn = db_connect();

    $query = "INSERT INTO reservations (user_id, property_id) VALUES ('$user_id', '$property_id')";

    if ($conn->query($query) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Get properties
function get_properties() {
    $conn = db_connect();

    $query = "SELECT * FROM properties";
    $result = $conn->query($query);

    $properties = [];
    while ($row = $result->fetch_assoc()) {
        $properties[] = $row;
    }

    return $properties;
}

// Get property by ID
function get_property_by_id($property_id) {
    $conn = db_connect();

    $property_id = $conn->real_escape_string($property_id);
    $query = "SELECT * FROM properties WHERE id = '$property_id'";
    $result = $conn->query($query);

    return $result->fetch_assoc();
}

// Delete property
function delete_property($property_id) {
    $conn = db_connect();

    $property_id = $conn->real_escape_string($property_id);
    $query = "DELETE FROM properties WHERE id = '$property_id'";

    return $conn->query($query);
}

// Update property
function update_property($property_id, $name, $location, $price, $description) {
    $conn = db_connect();

    $property_id = $conn->real_escape_string($property_id);
    $name = $conn->real_escape_string($name);
    $location = $conn->real_escape_string($location);
    $price = $conn->real_escape_string($price);
    $description = $conn->real_escape_string($description);

    $query = "UPDATE properties SET name = '$name', location = '$location', price = '$price', description = '$description' WHERE id = '$property_id'";

    return $conn->query($query);
}

?>
