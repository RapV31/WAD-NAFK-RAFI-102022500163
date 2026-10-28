<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "profildriver"; // Sesuai dengan database 
$port = 3306; // gblok ternyata bawaan XAMPP port nya bodoh!

$conn = mysqli_connect($host, $username, $password, $db, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>