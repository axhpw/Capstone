<?php 
//session_start();

// check if the session exists(it should have been created in do_login.php)
// if it exists, send the user back to index and display the logged in message
// if not, send the user back to login.php with a message reading "the account does not exist"
if ($_SESSION["User"] != "" && $_SESSION["User"] != null) {

	echo "You are currently logged in as " . $_SESSION["User"];

	while ($_SESSION["User"] != null) {

		// whatever is here gets done while the user is logged in.
	}
}
else {

	//redirect user back to login.php if the session does not exist
	header('Location: login.php');
}

?>
<html>
<body>
<span><a href="login.php">Sign Out</a></span>


</body>
</html>