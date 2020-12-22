<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ./index.html');
	exit;
}
require("./header.php");
?>

<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>HTML5 Sample Application</h1>
				<a href="./profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="./logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>
	</body>
</html>