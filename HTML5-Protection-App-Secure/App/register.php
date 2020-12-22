<?php
require("./conn.php");
require("./functions.php");

if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	exit('Please complete the registration form!');
}

if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	exit('Please complete the registration form!');
}

if (isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	$usernamePost = test_input($_POST['username']);
	$passwordPost = test_input($_POST['password']);
	$emailPost = test_input($_POST['email']);
	
}

// Check username exists
if ($stmt = $con->prepare('SELECT id, password FROM users WHERE username = ?')) {
	// Bind parameters (s = string)
	$stmt->bind_param('s', $usernamePost);
	$stmt->fetch();
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!';
	} else {

if ($stmt = $con->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?)')) {
    // Hash password
	$password = password_hash($passwordPost, PASSWORD_DEFAULT);
	$stmt->bind_param('sss', $usernamePost, $password, $passwordPost);
	$stmt->execute();
	echo 'You have successfully registered. <a href="../index.php">Click Here to Login</a>';
} else {
	echo 'Could not prepare statement!';
}
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement!';
}
$con->close();
?>