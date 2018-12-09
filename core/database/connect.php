<?php
$mysqli = new mysqli('localhost', 'root', 's0ftwareualr', 'plagiarism_detect');
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
?>