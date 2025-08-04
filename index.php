<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Robot Arm Control Panel</title>
  <style>
    body { font-family: Arial; margin: 40px; }
    h2 { margin-bottom: 20px; }
    .slider-group { margin-bottom: 15px; }
    label { width: 70px; display: inline-block; }
    input[type=range] { width: 300px; }
    button { margin: 5px; }
    table { margin-top: 30px; border-collapse: collapse; }
    th, td { padding: 8px; border: 1px solid #ccc; text-align: center; }
  </style>

</head>
<body>

<h2>Robot Arm Control Panel</h2>

<form id="poseForm" method="post" action="save_pose.php">
  <div class="slider-group">
    <?php
    for ($i = 1; $i <= 6; $i++) {
      echo "<label>Motor $i:</label>";
      echo "<input type='range' name='motor$i' min='0' max='180' value='90' oninput='updateValue(this, $i)' />";
      echo "<span id='val$i'>90</span><br>";
    }
    ?>
  </div>

  <button type="submit">Save Pose</button>
  <button type="button" onclick="location.href='run_pose.php'">Run</button>
  <button type="reset">Reset</button>
</form>

<script>
  function updateValue(slider, id) {
    document.getElementById("val" + id).textContent = slider.value;
  }
</script>

<?php
$conn = new mysqli("localhost", "root", "", "robot_arm");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM poses ORDER BY id DESC");

if ($result->num_rows > 0) {
  echo "<table><tr><th>#</th><th>Motor 1</th><th>Motor 2</th><th>Motor 3</th><th>Motor 4</th><th>Motor 5</th><th>Motor 6</th><th>Action</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>
      <td>{$row['id']}</td>
      <td>{$row['motor1']}</td>
      <td>{$row['motor2']}</td>
      <td>{$row['motor3']}</td>
      <td>{$row['motor4']}</td>
      <td>{$row['motor5']}</td>
      <td>{$row['motor6']}</td>
      <td>
        <a href='load_pose.php?id={$row['id']}'>Load</a> |
        <a href='remove_pose.php?id={$row['id']}'>Remove</a>
      </td>
    </tr>";
  }
  echo "</table>";
} else {
  echo "<p>No poses saved.</p>";
}

$conn->close();
?>

</body>
</html>