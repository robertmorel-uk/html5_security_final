<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>HTML5 Sample Application</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
		integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
		crossorigin="anonymous" />
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="./js/scripts.js"></script>
	<script src="./js/crypto-js.min.js"></script>
	<script src="./js/aes.js"></script>
	<script src="./js/purify.min.js"></script>
</head>
		<?php 
		if (isset($_SESSION) && $_SESSION['loggedin']){
		?>

<body class="loggedin">
	<div class="container-fluid">
		<div class="row">
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="/">COMMS</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li><a href="web-worker" class="nav-link">Browse</a></li>
							<li><a href="channel" class="nav-link">Search</a></li>
							<li><a href="chat" class="nav-link">Chat</a></li>
							<li><a href="profile" class="nav-link">Profile</a></li>
							<li><a href="contact" class="nav-link">Contact</a></li>
							<!--<li><a href="https://excess-xss.com/" class="nav-link">XSS attack</a></li>-->
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a id="back">Back</a></li>
							<li> <a id="forward">Forward</a></li>
							<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>

	<?php } 
	
	else { ?>

<body>
	<div class="container-fluid">

	<?php }