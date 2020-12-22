<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: ./index.php');
	exit;
}

require("./header.php");

?>
        <div class="row">
            <div class="col-md-12" id="content">
                <h1>C.O.M.M.S. Comment Management System</h1>
                <img src="./img/comms.png" width="400px">
                <p>Manage all your site comments in on handy dashboard!</p>
			</div>	
		</div>
    </div>
</body>

</html>