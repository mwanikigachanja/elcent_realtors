<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['admin']);
}

function redirectIfNotLoggedIn() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}
?>
