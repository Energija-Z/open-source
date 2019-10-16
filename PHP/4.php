<?php
	$username = $_POST['username'];
	$role = $_POST['role'];

	$veza = mysqli_connect('localhost', 'root', '', 'baza') or die("MYSQL database connection");
	mysqli_close();

	$upit = "UPDATE tablica SET role = ${role} WHERE username = ${username}";
?>

<form>
	<label>Username:</label> <input type="text" name="username"/>
	<label>Role:</label>
	
	<select role="role">
		<option>Admin</option>
		<option>Editor</option>
		<option>User</option>
	</select>
</form>