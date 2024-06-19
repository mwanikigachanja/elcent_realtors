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

$sql = "SELECT id, name, feedback, image FROM testimonials";
$result = $conn->query($sql);

$testimonials = [];

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $testimonials[] = $row;
  }
} else {
  echo "0 results";
}
$conn->close();

echo json_encode($testimonials);
?>
