<?php
	$username = $_POST['username'];
	$password = $_POST['password'];

	$veza = mysqli_connect('localhost', 'root', '', 'baza') or die("MYSQL database connection");
	mysqli_close();

	$upit = "SELECT username FROM baza WHERE username = '${username}' AND password = 'sha1(${password})'";
?>

<form>
	<label>Username:</label> <input type="text" name="username"/>
	<label>Password:</label> <input type="password" name="password"/>
</form>