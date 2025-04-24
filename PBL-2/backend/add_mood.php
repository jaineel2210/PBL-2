<?php
require 'config.php';
session_start();

$data = json_decode(file_get_contents("php://input"));
$user_id = $_SESSION['user_id'] ?? null;
$mood = $data->mood ?? '';
$note = $data->note ?? '';
$date = $data->entry_date ?? date('Y-m-d');

if ($user_id && $mood) {
    $stmt = $conn->prepare("INSERT INTO mood_entries (user_id, mood, note, entry_date) VALUES (?, ?, ?, ?)");
    $stmt->execute([$user_id, $mood, $note, $date]);
    echo json_encode(["status" => "success", "message" => "Mood entry added."]);
} else {
    echo json_encode(["status" => "error", "message" => "Missing mood or not logged in."]);
}
?>
