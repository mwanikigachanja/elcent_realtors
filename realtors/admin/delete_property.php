<?php
include('../includes/session.php');
redirectIfNotLoggedIn();
include('../includes/db.php');

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $query = "DELETE FROM properties WHERE id = '$id'";

    if ($conn->query($query) === TRUE) {
        echo "Property deleted successfully";
    } else {
        echo "Error deleting property: " . $conn->error;
    }
} else {
    echo "No property ID provided";
}
?>
<a href="manage_properties.php">Back to Manage Properties</a>
