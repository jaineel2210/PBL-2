<?php
require 'config.php';
session_start();

$user_id = $_SESSION['user_id'] ?? null;

if ($user_id) {
    $stmt = $conn->prepare("SELECT * FROM profiles WHERE user_id = ?");
    $stmt->execute([$user_id]);
    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
} else {
    echo json_encode(["status" => "error", "message" => "User not logged in."]);
}
?>
