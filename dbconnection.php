<?php
$con = mysqli_connect("localhost", "root", "", "college_website");

// Check if the connection failed
if (!$con) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
