<?php
$servername = "localhost:4306";
$username = "root"; // MySQL username
$password = "12345"; // MySQL password
$dbname = "library"; // Your database name

// Create connection
$db =  mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$db) {
    die("Connection failed: " .$db->mysqli_connect_error);
}

?>
