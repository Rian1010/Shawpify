<?php

	session_start();
	$_SESSION = array();//Clears the session array
	$params = session_get_cookie_params();//gets cookie parameters
	//unset the session cookie by setting a time in the distant past
	setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
	// Make sure that it is from somewhere in the past, so that the session cookie gets removed
	session_destroy();//Destroys the session on the local server
?>

<?php
	include_once("inc/head.inc.php")
?>

<!--HEADER-->
<header>
	<div class="container">
		<h1>Log Out</h1>
	</div>
</header>

<!--MAIN-->
<main class="container">
	<p>You hae been successfully logged out</p>
	<a href="signin.php" class="btn btn-primary">Log Back In</a>
</main>

<?php
	include("inc/foot.inc.php");
?>