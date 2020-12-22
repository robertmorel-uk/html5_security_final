<?php
require("./conn.php");
require("./functions.php");

session_start();

if ( !isset($_POST['username'], $_POST['password']) && !isset($_COOKIE['cookie_session_id'])) {
	exit('Please fill both the username and password fields!');
}

if ( isset($_POST['username'])) { $curUsername = test_input($_POST['username']); } else $curUsername = "";
if ( isset($_POST['password'])) { $curpassword = test_input($_POST['password']); } else $curpassword = "";

$arr_cookie_options = array (
    'expires' => time() + 86400 * 30,
    'path' => '/',
    'domain' => 'localhost', // leading dot for compatibility or use subdomain
     //'secure' => true,     // Uncomment on prod
    'httponly' => true,    // or false
    'samesite' => 'strict' // None || Lax  || Strict
    );

if ( isset($_POST['password']) && isset($_POST['username'])){
if ($stmt = $con->prepare('SELECT id, password FROM users WHERE username = ?')) {
	// Bind username parameter (s = string)
	$stmt->bind_param('s', $curUsername);
	$stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        // If username exists then bind the ID and password to the prepared SQL statement
        $stmt->bind_result($id, $password);
        // Fetch results from prepared statement into the bound variables
        $stmt->fetch();
        $stmt->close();
        // Verify the password
        if (password_verify($curpassword, $password)) {
            // If Remember me checkbox checked
            if(isset($_POST['memberme'])) { 
                $memberme = test_input($_POST['memberme']); 
                if(isset($memberme)) { 
                    $cookie_name = "cookie_session_id";
                    $cookie_value = random_str();
                    setcookie($cookie_name, $cookie_value, $arr_cookie_options); // 86400 = 1 day
                        if ($sql = "UPDATE users SET cookie_session_id=? WHERE username=?") {
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param('ss', $cookie_value,$curUsername);
                        $stmt->execute();
                        $stmt->close();
                            }
                } 
            } 
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $curUsername;
            $_SESSION['id'] = $id;
            // Redirect to home page
            header('Location: ./home.php');
        } else {
            // Incorrect password
            echo 'Incorrect password!';
        }
    } else {
        // Incorrect username
        echo 'Incorrect username!';
    }
}
}

if ( isset($_COOKIE['cookie_session_id'])) {
	if ($stmt = $con->prepare('SELECT username, email FROM users WHERE cookie_session_id = ?')) {
        // Bind username parameter (s = string)
        $stmt->bind_param('s', test_input($_COOKIE['cookie_session_id']));
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($username, $email);
            $stmt->fetch();
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $username;
                $_SESSION['email'] = $email;
                header('Location: ./home.php');
        } else {
            echo 'Incorrect session ID!';
        }
    
        $stmt->close();
    }
}

?>