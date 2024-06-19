<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, image, price, location FROM properties";
$result = $conn->query($sql);

$properties = [];

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $properties[] = $row;
  }
} else {
  echo "0 results";
}
$conn->close();

echo json_encode($properties);
?>
