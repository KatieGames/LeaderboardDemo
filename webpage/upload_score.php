<?php
header("Content-Type: application/json");
require "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"] ?? '';
    $score = $_POST["score"] ?? '';

    if (!$name || !$score) {
        echo json_encode(["success" => false, "message" => "Missing parameters"]);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO scores (name, score) VALUES (?, ?)");
    $stmt->bind_param("si", $name, $score);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => $conn->error]);
    }

    $stmt->close();
    $conn->close();
}
?>