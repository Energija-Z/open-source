<!DOCTYPE html>
<html>
	<head><link href="prop/style.css" rel="stylesheet"/></head>

	<body>
<?php
	echo '
		<nav><ul>
			<li><a href="">Početna stranica</a></li>
			<li><a href="">Novosti</a></li>
			<li><a href="">O nama</a></li>
			<li><a href="">Kontakt</a></li>
			<li><a href="">Galerija</a></li>
			<li><a href="">Registracija</a></li>
			<li><a href="">Prijava</a></li>
		</nav></ul>
	';
	include('2.php');
	$mysql = conn();

	if(isset($_POST['name'])){
		$name     = $_POST['name'];
		$surname  = $_POST['surname'];
		$password = sha1($_POST['password']);
		$email    = $_POST['email'];
		$date     = $_POST['date'];
		$country  = $_POST['country'];

		$username;
		if(isset($_POST['username']))
			$username = $_POST['username'];
		else
			$username = substr($name, 0, 1) . $surname;

		$provjera = "SELECT ime FROM korisnici WHERE ime = '${username}'";
		$rezultat = mysqli_query($mysql, $provjera);

		if(mysqli_num_rows($rezultat) > 0)
			$username = $username . mysqli_fetch_array($rezultat['id']) + 1;

		$unos = "INSERT INTO korisnici (ime, prezime, korisnicko_ime, lozinka, email, datum_rodjenja, drzava) VALUES ('${name}', '${surname}', '${username}', '${password}', '${email}', '${date}', '${country}')";

		if(mysqli_query($mysql, $unos))
			echo "<p>Prijava je uspjela, korisničko ime je ${username}</p><br/>";
		
		else
			echo "<p>Krivi upit:</p><br/>${unos}";

		//defined(()
		#mail()
	}

	echo '
		<main>
			<form method="post">
				<br/><br/>
				<label>Name:</label> <input type="text" name="name"/><br/><br/>
				<label>Surname:</label> <input type="text" name="surname"/><br/><br/>
				<label>Username:</label> <input type="text" name="username"/><br/><br/>
				<label>Password:</label> <input type="password" name="password"/><br/><br/>
				<label>E-mail:</label> <input type="email" name="email"/><br/><br/>
				<label>Birthdate:</label> <input type="date" name="date"/><br/><br/>
				<label>Select a country:</label>
				<select name="country">
	';

	$upit = "SELECT country_code FROM countries";
	$rezultat = mysqli_query($mysql, $upit);
	while($row = mysqli_fetch_array($rezultat))
		echo "<option>".$row['country_code']."</option>";
	echo '
				</select>
				<button>Submit</button>
			</form>
		</main>
	';
	mysqli_close($mysql);
?>
	</body>
</html>