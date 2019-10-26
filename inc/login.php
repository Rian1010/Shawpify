<?php
	/*
	$_POST['username'];
	$_POST['password'];
	*/

	if(!isset($_POST['username'])||!isset($_POST['password'])) {
		die("Error:".var_dump($_POST));
	}

	session_start();
	include_once "config.php";
	//mysqli is an object built in in PHP for SQL and requires the four following arguments:
	$conn = new mysqli(SERVER_NAME, USERNAME, PASSWORD, DATABASE);

	if($conn->connect_error) {
		die("Connection failed: ".$conn->connect_error);
	}

	$stmt = $conn->prepare("SELECT `id`, `username`, `password`
							FROM `users`
							WHERE `username` = ?");
	//s = string i = integer ss = string string
	$stmt->bind_param("s",$_POST['username']);//Binds a string with the parameter as a variable to the SQL statement

	$stmt->execute(); //Sends the SQL statement to the database

	$stmt->bind_result($id,$name,$password);//binds the received result to PHP variables that can be used

	$stmt->fetch();//Grabs results and puts them into the PHP variables

	/* Three valid variables from the table
	$id;
	$name;
	$password */

	echo $_POST['password'];
	echo "<br>";
	echo $password;

	//This is where password would be compared
	if($_POST['password']==$password) {
		$_SESSION['id'] = $id;
		$_SESSION['username'] = $name;
		header("Location: ../index.php");
	}
	else {
		header("Location: ../signin.php");
	}


	$conn->close();