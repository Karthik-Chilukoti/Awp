<!DOCTYPE html>
<html>
<head>
	<title>CRUD Operations in PHP</title>
</head>
<body>
	<h1>CRUD Operations in PHP</h1>
	<?php
	// Connect to the database (replace with your own database credentials)
	$servername = "localhost";
	$username = "username";
	$password = "password";
	$dbname = "mydatabase";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Create the table if it doesn't exist
	$sql = "CREATE TABLE IF NOT EXISTS users (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(30) NOT NULL,
			email VARCHAR(50) NOT NULL,
			phone VARCHAR(15),
			address VARCHAR(50),
			reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
		)";

	if (mysqli_query($conn, $sql)) {
		echo "Table created successfully<br>";
	} else {
		echo "Error creating table: " . mysqli_error($conn) . "<br>";
	}

	// Add a new user
	$sql = "INSERT INTO users (name, email, phone, address) VALUES ('John Doe', 'john@example.com', '123-456-7890', '123 Main St')";

	if (mysqli_query($conn, $sql)) {
		echo "New user added successfully<br>";
	} else {
		echo "Error adding user: " . mysqli_error($conn) . "<br>";
	}

	// Update a user
	$sql = "UPDATE users SET phone='555-555-5555' WHERE id=1";

	if (mysqli_query($conn, $sql)) {
		echo "User updated successfully<br>";
	} else {
		echo "Error updating user: " . mysqli_error($conn) . "<br>";
	}

	// Delete a user
	$sql = "DELETE FROM users WHERE id=1";

	if (mysqli_query($conn, $sql)) {
		echo "User deleted successfully<br>";
	} else {
		echo "Error deleting user: " . mysqli_error($conn) . "<br>";
	}

	// Display all users
	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo "<table border='1'>";
		echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Registration Date</th></tr>";

		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['phone'] . "</td>";
			echo "<td>" . $row['address'] . "</td>";
			echo "<td>" . $row['reg_date'] . "</td>";
			echo "</tr>";
		}

		echo "</table>";
	} else {
		echo "No users found";
	}

	mysqli_close($conn);
	?>
</body>
</html>
