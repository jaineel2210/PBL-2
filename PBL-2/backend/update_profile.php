<?php
require 'config.php';
session_start();

$data = json_decode(file_get_contents("php://input"));
$user_id = $_SESSION['user_id'] ?? null;

$full_name = $data->full_name ?? '';
$age = $data->age ?? null;
$gender = $data->gender ?? '';
$bio = $data->bio ?? '';

if ($user_id) {
    $stmt = $conn->prepare("INSERT INTO profiles (user_id, full_name, age, gender, bio)
        VALUES (?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE full_name = VALUES(full_name), age = VALUES(age), gender = VALUES(gender), bio = VALUES(bio)");
    $stmt->execute([$user_id, $full_name, $age, $gender, $bio]);
    echo json_encode(["status" => "success", "message" => "Profile updated."]);
} else {
    echo json_encode(["status" => "error", "message" => "User not logged in."]);
}
?>
