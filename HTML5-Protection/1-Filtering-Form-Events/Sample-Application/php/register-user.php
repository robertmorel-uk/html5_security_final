<?php
require("./header.php");
?>
	<body>
		<div class="register">
			<h1>Register</h1>
			<form action="./register.php" method="post">
				<input 
					type="text" 
					name="text" 
					style="display:none !important" 
					autocomplete="off">
				<input 
					type="hidden" 
					id="randomNonce">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input 
					type="text" 
					name="username" 
					placeholder="Username" 
					id="username" 
					required
					minlength="3" 
					maxlength="32"
					autocomplete="off"
					>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input 
					type="password" 
					name="password" 
					placeholder="Password" 
					id="password" 
					required
					minlength="3" 
					maxlength="32"
					autocomplete="off"
					>
				<label for="email">
					<i class="fas fa-envelope"></i>
				</label>
				<input 
					type="email" 
					name="email" 
					placeholder="email" 
					id="email" 
					required
					minlength="9" 
					maxlength="64"
					pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
					autocomplete="off"
					>
				<p id="message"></p>
				<input type="submit" value="Register" id="register">
			</form>
		</div>
	</body>
</html>