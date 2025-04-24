<?php
$host = 'localhost';
$dbname = 'mindtrack';
$username = 'root'; // Change if needed
$password = 'root';     // Change if needed

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
