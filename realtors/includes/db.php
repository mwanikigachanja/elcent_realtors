<?php
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
?>
