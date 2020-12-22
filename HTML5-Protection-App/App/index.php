<?php
if(isset($_COOKIE['cookie_session_id'])){
    header('Location: ./authenticate.php');
}
if(!isset($_COOKIE['cookie_session_id']) && isset($_COOKIE['PHPSESSID'])){
    header('Location: ./logout.php');
}
require("./header.php");
?>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="./authenticate.php" method="post" autocomplete="on">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input 
					type="text" 
					name="username" 
					placeholder="Username" 
					id="username" 
					required
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
					>
                <label class="checkbox-inline" id="rememberMeLabel">
                    <input type="checkbox" id="memberme" name="memberme" value="memberme">Remember Me
				  </label>
                <input type="submit" value="Login" id="login">
                <p>New member? <a href="./register-user">Click here to register</a></p>
            </form>
            
		</div>
	</body>
</html>