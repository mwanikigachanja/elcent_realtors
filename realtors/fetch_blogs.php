<?php
include 'config.php';

$query = "SELECT * FROM blogs";
$result = mysqli_query($conn, $query);

$blogs = array();
while($row = mysqli_fetch_assoc($result)) {
    $blogs[] = $row;
}

echo json_encode($blogs);
?>
