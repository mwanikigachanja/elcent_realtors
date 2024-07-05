<?php
include 'config.php';

$query = "SELECT * FROM testimonials";
$result = mysqli_query($conn, $query);

$testimonials = array();
while($row = mysqli_fetch_assoc($result)) {
    $testimonials[] = $row;
}

echo json_encode($testimonials);
?>
