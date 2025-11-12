<?php
$host = "localhost";
$user = "";
$pass = "";
$dbname = "";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed."]));
}
?>