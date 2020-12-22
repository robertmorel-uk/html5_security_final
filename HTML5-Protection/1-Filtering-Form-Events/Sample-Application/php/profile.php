<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: ./index.html');
	exit;
}

require("./conn.php");
// Get username from session ID
$stmt = $con->prepare('SELECT email FROM users WHERE id = ?');

$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();

require("./header.php");
?>

	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>HTML5 Sample application</h1>
				<a href="./home.php"><i class="fas fa-user-circle"></i>Home</a>
				<a href="./logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>