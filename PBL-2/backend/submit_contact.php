<?php
require 'config.php';

$data = json_decode(file_get_contents("php://input"));
$name = $data->name ?? '';
$email = $data->email ?? '';
$message = $data->message ?? '';

if ($name && $email && $message) {
    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $message]);
    echo json_encode(["status" => "success", "message" => "Message submitted."]);
} else {
    echo json_encode(["status" => "error", "message" => "All fields are required."]);
}
?>
