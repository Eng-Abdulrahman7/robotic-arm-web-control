<?php
$conn = new mysqli("localhost", "root", "", "robot_arm");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE poses SET status = 0 WHERE status = 1";

if ($conn->query($sql) === TRUE) {
    echo "Status reset successfully.";
} else {
    echo "Error updating status: " . $conn->error;
}

$conn->close();
?>