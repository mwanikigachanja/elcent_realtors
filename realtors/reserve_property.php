<?php
include('includes/session.php');
redirectIfNotLoggedIn();
include('includes/db.php');
include('includes/functions.php');


if (isset($_GET['property_id'])) {
    $property_id = $_GET['property_id'];
    $user_id = $_SESSION['user_id'];

    if (add_reservation($user_id, $property_id)) {
        $user_email = $_SESSION['user_email'];
        send_email($user_email, "Reservation Confirmation", "You have successfully reserved the property with ID $property_id.");
        echo "Property reserved successfully";
    } else {
        echo "Error reserving property";
    }
}

?>
