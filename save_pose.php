<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $motor1 = $_POST["motor1"];
    $motor2 = $_POST["motor2"];
    $motor3 = $_POST["motor3"];
    $motor4 = $_POST["motor4"];
    $motor5 = $_POST["motor5"];
    $motor6 = $_POST["motor6"];

    
    $conn = new mysqli("localhost", "root", "", "robot_arm");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO poses (motor1, motor2, motor3, motor4, motor5, motor6, status)
            VALUES ($motor1, $motor2, $motor3, $motor4, $motor5, $motor6, 0)";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); 
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>