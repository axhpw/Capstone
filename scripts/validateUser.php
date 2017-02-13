<?php

// This file completes the login, users are sent here from the login page
// login.php is the default page of the website.

require_once('../db.php');

try {

	// Select all using user and password textboxes on login.php
	$stmt = $db->prepare("SELECT * FROM users");

	$stmt->execute();
	$users = $stmt->fetchAll();
	
	// start the session, set the session variable for User
	// then redirect back to index.php
	session_start();

	// check the user to see if it exists within the database
	foreach ($users as $user) {

					
		// if the user does not exists(if the email in the db is null)
		// send the user back to login.php
		if ($user['Email'] != $_POST["email"] || !password_verify($_POST["password"], $user["P4WD"])) {

			header('url: ../login.php?loginSuccess=0');
		}
		
		else {
			// if the user exists(checking a valid email and password combo)
			// set a session variable and send the user to index.php
			$_SESSION["User"] = $user["Email"];
			echo $_SESSION["User"];

			//redirect user back to homepage
			header('Location: ../todo.php');
		}
	}
}
catch (PDOException $e) {
	
	die('Sign In Failed! ');
}
?>


	
