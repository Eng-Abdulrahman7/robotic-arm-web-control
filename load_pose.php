<?php
if (!isset($_GET['id'])) {
    die("Missing ID");
}

$id = intval($_GET['id']);


$conn = new mysqli("localhost", "root", "", "robot_arm");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$conn->query("UPDATE poses SET status = 0");

$sql = "UPDATE poses SET status = 1 WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error loading pose: " . $conn->error;
}

$conn->close();
?>