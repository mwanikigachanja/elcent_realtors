<?php
include 'admin/config.php';

// Fetch properties
$property_sql = "SELECT * FROM properties";
$property_result = mysqli_query($conn, $property_sql);
$properties = mysqli_fetch_all($property_result, MYSQLI_ASSOC);

// Fetch testimonials
$testimonial_sql = "SELECT * FROM testimonials";
$testimonial_result = mysqli_query($conn, $testimonial_sql);
$testimonials = mysqli_fetch_all($testimonial_result, MYSQLI_ASSOC);

// Fetch blogs
$blog_sql = "SELECT * FROM blogs";
$blog_result = mysqli_query($conn, $blog_sql);
$blogs = mysqli_fetch_all($blog_result, MYSQLI_ASSOC);

// Close connection
mysqli_close($conn);

// Send data as JSON
header('Content-Type: application/json');
echo json_encode([
    'properties' => $properties,
    'testimonials' => $testimonials,
    'blogs' => $blogs,
]);
?>
