<?php
include 'admin/config.php';

$query = "SELECT * FROM properties";
$result = mysqli_query($conn, $query);

$properties = array();
while($row = mysqli_fetch_assoc($result)) {
    $properties[] = $row;
}

echo json_encode($properties);
?>
