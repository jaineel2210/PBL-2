<?php
require 'config.php';
session_start();

$user_id = $_SESSION['user_id'] ?? null;

if ($user_id) {
    $stmt = $conn->prepare("SELECT * FROM mood_entries WHERE user_id = ? ORDER BY entry_date DESC");
    $stmt->execute([$user_id]);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} else {
    echo json_encode(["status" => "error", "message" => "User not logged in."]);
}
?>
