<?php
	if(!isset($_SESSION))
		session_start();
	include('2.php');
	$mysql = conn();
	if(isset($_POST['username'])){
		$username = $_POST['username'];
		$uloga = $_POST['role'];
		$izmjena = "
			UPDATE korisnici
			SET uloga = '${uloga}'
			WHERE korisnicko_ime = '${username}'
		";

		if(mysqli_query($mysql, $izmjena))
			echo "Uloga za korisnika '${username}' je promjenjena na '${uloga}'";
		else
			echo "<p>Pogreška u izmjeni</p><br/>";
	}

	echo '
		<main>
		<form method="post">
			<label>Korisničko ime:</label> <input type="text" name="username"/><br/><br/>

			<label>Odaberite ulogu:</label>
			<select name="role">
				<option>user</option>
				<option>editor</option>
				<option>administrator</option>
			</select>
			<br/><br/>
			<button>Predaj formu</button>
		</form>
	';

	mysqli_close($mysql);
?>