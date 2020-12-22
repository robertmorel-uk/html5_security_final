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

echo "<script>localStorage.username ='" . $_SESSION['name'] ."';</script>";
echo "<script>sessionStorage.email ='" . $email ."';</script>";

//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

require("./header.php");
?>
	<script>
		$('document').ready(function () {
                if (typeof (Storage) !== "undefined") {
                    // Check if session storage is supported in browser
                    if (sessionStorage.dosCounter) {
                        // If dosCounter has been set then add 1 to it
                        sessionStorage.dosCounter = Number(sessionStorage.dosCounter) + 1;
                    } else {
                        // Else set dosCounter to 1
                        sessionStorage.dosCounter = 1;
                    }
				}
				// Ban user if they visit the same page 20+ times in one session
				if(sessionStorage.dosCounter > 20){alert("DOS - you are banned!");}

				if (typeof (Storage) !== "undefined") {
						if (localStorage.curStatus) {
							// Decrypt using CryptoJS library
							let curStatusDec = decryptString(localStorage.curStatus);
							// Purify using DOMPurify library
							let curStatusClean = DOMPurify.sanitize(curStatusDec);
							let curStatusTrim = curStatusClean.trim();
							$("#status").text(curStatusTrim);
						}
					}

				$("#statusButton").click(function (event) {
					let curStatus = $("#statusUpdate").val();
					// Encrypt using CryptoJS library			
					let curStatusEnc = encryptString(curStatus);
					if (typeof (Storage) !== "undefined") {
						localStorage.curStatus = curStatusEnc;
						if (localStorage.curStatus) {
							// Decrypt using CryptoJS library
							let curStatusDec = decryptString(localStorage.curStatus);
							// Purify using DOMPurify library
							let curStatusClean = DOMPurify.sanitize(curStatusDec);
							let curStatusTrim = curStatusClean.trim();
							$("#status").html(curStatusTrim);
						}
					}
				})
			});
	</script>

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
				<h3>How are you feeling today?</h3>
				<input 
					type="text" 
					id="statusUpdate"
					required
					minlength="3" 
					maxlength="32"
					autocomplete="off"
					>
				<button type="button" class="btn btn-primary" id="statusButton">Update Status</button>
				<h4 id="status">Current Status:none</h4>
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