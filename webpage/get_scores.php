<?php
header("Content-Type: application/json");
require "db.php";

$result = $conn->query("SELECT name, score, created_at FROM scores ORDER BY score DESC LIMIT 1000");
$scores = [];

while ($row = $result->fetch_assoc()) {
    $scores[] = $row;
}

echo json_encode($scores);

$conn->close();
?>