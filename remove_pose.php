<?php
if (!isset($_GET['id'])) {
    die("Missing ID");
}

$id = intval($_GET['id']);

$conn = new mysqli("localhost", "root", "", "robot_arm");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM poses WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting pose: " . $conn->error;
}

$conn->close();
?>