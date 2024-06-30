<?php
/* Database credentials. */
define('DB_SERVER', '102.218.215.29');
define('DB_USERNAME', 'elcentre_root');
define('DB_PASSWORD', 'PE{Tgr{qI=Lm');
define('DB_NAME', 'elcentre_main_app');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
