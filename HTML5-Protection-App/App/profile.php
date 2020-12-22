<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: ./index.php');
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

?>
	<script>
		$('document').ready(function () {

				if (typeof (Storage) !== "undefined") {
						if (localStorage.curStatus) {
							let curStatus = localStorage.curStatus;
							$("#status").text(curStatus);
						}
					}

				$("#statusButton").click(function (event) {
					let curStatus = $("#statusUpdate").val();
					if (typeof (Storage) !== "undefined") {
						localStorage.curStatus = curStatus;
						if (localStorage.curStatus) {
							let curStatus = localStorage.curStatus;
							$("#status").html(curStatus);
						}
					}
				})
			});
	</script>

	<div class="template-part container">
		<div class="row">
			<div class="col-6" style="width: 50%; float:left;">
			<h1>Profile Page</h1>
			<div>
				<h3>How are you feeling today?</h3>
				<input 
					type="text" 
					id="statusUpdate"
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
			<div class="col-6" style="width: 50%; float:left;">
				<img src="./img/user.webp">
			</div>
		</div>
	</div>