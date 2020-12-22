<?php
if(isset($_COOKIE['cookie_session_id'])){
    header('Location: ./php/authenticate.php');
}
if(!isset($_COOKIE['cookie_session_id']) && isset($_COOKIE['PHPSESSID'])){
    header('Location: ./php/logout.php');
}
require("./php/header.php");
?>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="./php/authenticate.php" method="post" autocomplete="on">
				<input 
					type="email" 
					name="email" 
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
					autocomplete="off"
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
                <p>New member? <a href="./php/register-user">Click here to register</a></p>
            </form>
            
		</div>
	</body>
</html>