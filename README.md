#🤖 robotic-arm-web-control
A simple web-based interface to control a 6-motor robotic arm using HTML, CSS, JavaScript, PHP, and MySQL.

> ⚠ Local project folder name: my_project3

---
## 🛠 Project Features
- Control six servo motors using sliders.
- Save multiple poses (motor positions) to a database.
- Load a saved pose to activate it.
- Remove saved poses.
- Send pose data to microcontroller via get_run_pose.php.
- Reset pose status after execution using update_status.php

- ---

## 🧰 Technologies Used

- HTML, CSS, JavaScript
- PHP 8+
- MySQL (via phpMyAdmin)
- XAMPP for local server
---
## 🧱 Database Setup

1. Create a database called robot_arm.
2. Create a table called poses using the following structure:

```sql
CREATE TABLE poses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  motor1 INT NOT NULL,
  motor2 INT NOT NULL,
  motor3 INT NOT NULL,
  motor4 INT NOT NULL,
  motor5 INT NOT NULL,
  motor6 INT NOT NULL,
  status INT DEFAULT 0
);

🔌 How It Works
	•	Save Pose: Adds a new motor configuration to the database.
	•	Load: Marks a specific pose as active (status = 1) and resets all others.
	•	Remove: Deletes the pose from the database.
	•	Run: Reads the active pose through get_run_pose.php.
	•	update_status.php: Resets status to 0 after execution.

⸻

🌐 Usage
	1.	Place all files in C:\xampp\htdocs\my_project3.
	2.	Start Apache & MySQL via XAMPP.
  3.	Open in browser:    http://localhost/my_project3/index.php

✅ Output Format (get_run_pose.php)

Returns a line like:


Where:
	•	1 indicates the pose is active
	•	s1 to s6 represent each motor’s angle

⸻

📌 Notes
	•	Make sure all PHP files are inside the same project folder.
	•	Ensure mysqli is enabled in PHP and MySQL is running.
