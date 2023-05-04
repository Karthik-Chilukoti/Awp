<!DOCTYPE html>
<html>
<head>
	<title>Student Registration</title>
</head>
<?php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Get the form data
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];

	// Validate the form data
	if (empty($name) || empty($email) || empty($phone) || empty($password)) {
		echo 'Please fill out all the fields';
	} else {
		// Connect to the database (replace with your own database credentials)
		$servername = 'localhost';
		$username = 'username';
		$password = 'password';
		$dbname = 'mydatabase';

		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die('Connection failed: ' . $conn->connect_error);
		}

		// Insert the data into the database
		$sql = "INSERT INTO students (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";

		if ($conn->query($sql) === TRUE) {
			echo 'Registration successful';
		} else {
			echo 'Error: ' . $sql . '<br>' . $conn->error;
		}

		$conn->close();
	}
}
?>

<body>
	<h1>Student Registration</h1>
	<form action="register.php" method="POST">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name"><br>

		<label for="email">Email:</label>
		<input type="email" id="email" name="email"><br>

		<label for="phone">Phone:</label>
		<input type="tel" id="phone" name="phone"><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password"><br>

		<button type="submit">Register</button>
	</form>
</body>
</html>
