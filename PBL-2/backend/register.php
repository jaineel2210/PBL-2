<?php
require 'config.php';

$data = json_decode(file_get_contents("php://input"));
$username = $data->username ?? '';
$email = $data->email ?? '';
$password = password_hash($data->password ?? '', PASSWORD_BCRYPT);

if ($username && $email && $password) {
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    try {
        $stmt->execute([$username, $email, $password]);
        echo json_encode(["status" => "success", "message" => "User registered successfully."]);
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Registration failed: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Missing fields."]);
}
?>
