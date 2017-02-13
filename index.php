<?php

session_start();

// check if the session exists(it should have been created in do_login.php)
// if it exists, send the user back to index and display the logged in message
// if not, send the user back to login.php with a message reading "the account does not exist"
if ( isset($_SESSION["User"]) != "" ) {

	echo "You are currently logged in as " . $_SESSION["User"];
	
}
else {

	//redirect user back to login.php if the session does not exist
	header('Location: login.php');
}

?>
<html>
<body>


</body>
</html>