<?php

session_start();

// check if the session exists(it should have been created in do_login.php)
// if it exists, send the user back to index and display the logged in message
// if not, send the user back to login.php with a message reading "the account does not exist"
if ($_SESSION["User"] != "" && $_SESSION["User"] != null) {

	echo "You are currently logged in as " . $_SESSION["User"];

	
}
else {

	//redirect user back to login.php if the session does not exist
	header('Location: login.php');
}


echo $userFName;



function SignOut() {

	
}

?>
<html>
<body>
<form action="scripts/signoff.php"><input type="submit" placeholder="Log Off"/></form>


</body>
</html>