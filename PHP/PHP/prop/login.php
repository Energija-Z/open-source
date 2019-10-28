<?php
	if(!isset($_SESSION))
		session_start();
	include('2.php');
	$mysql = conn();
	if(isset($_POST['username']) && $_POST['password']){
		$username = $_POST['username'];
		$password = sha1($_POST['password']);

		$izmjena = "
			SELECT korisnicko_ime, uloga FROM korisnici
			WHERE korisnicko_ime = '${username}' AND lozinka = '${password}'
		";

		$rezultat = mysqli_query($mysql, $izmjena);
		if($user = mysqli_fetch_array($rezultat)){
			$_SESSION['username'] = $user['korisnicko_ime'];
			$_SESSION['role'] = $user['uloga'];
		}
		else
			echo "<p>Pogreška u prijavi</p><br/>";
	}

	echo '
		<main>
		<form method="post">
			<label>Korisničko ime:</label> <input type="text" name="username"/><br/><br/>

			<label>Lozinka:</label> <input type="password" name="password"/><br/><br/>
			<button>Login</button>
		</form>
	';

	mysqli_close($mysql);
?>