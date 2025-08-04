<?php

$conn = new mysqli("localhost", "root", "", "robot_arm");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM poses WHERE status = 1 ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    echo "1," .
         "s1=" . $row['motor1'] . "," .
         "s2=" . $row['motor2'] . "," .
         "s3=" . $row['motor3'] . "," .
         "s4=" . $row['motor4'] . "," .
         "s5=" . $row['motor5'] . "," .
         "s6=" . $row['motor6'];
} else {
    echo "0,s1=0,s2=0,s3=0,s4=0,s5=0,s6=0";
}

$conn->close();
?>