<?php
	$nav = "<nav><ul>";
	$nav = $nav . "<li><a href=''>Početna stranica</a></li>";
	$nav = $nav . "<li><a href=''>Novosti</a></li>";
	$nav = $nav . "<li><a href=''>O nama</a></li>";
	$nav = $nav . "<li><a href=''>Kontakt</a></li>";
	$nav = $nav . "<li><a href=''>Galerija</a></li>";
	$nav = $nav . "<li><a href=''>Registracija</a></li>";
	$nav = $nav . "<li><a href=''>Prijava</a></li>";

	$nav = $nav . "</nav></ul>";

	$name     = $_POST['name'];
	$surname  = $_POST['surname'];
	$password = sha1($_POST['password']);
	$email    = $_POST['email'];
	$date     = $_POST['date'];
	$city     = $_POST['city'];

	$veza = mysqli_connect('localhost', 'root', '', 'database') or die('MYSQL database connection');
	$provjera = "SELECT username, id FROM baza WHERE name = '${name}'";
	$unos = "";
	$username = $name . $surname;

	$rezultat = mysqli_query($veza, $provjera);

	if(mysqli_num_rows($rezultat) > 0)
		$username = $username . mysqli_fetch_array($rezultat)['id'] + 1;
	
	$unos = "INSERT INTO database VALUES ('${username}', '${password}', '${email}', '${date}', '${city}')";

	if(mysqli_query($veza, $unos))
		echo "<p>Prijava je uspjela, korisničko ime je </p>" . ${username} . "<br/>";

	mysqli_close();

	//defined(()
	#mail()

	echo $nav;
//include(str.php);
?>


<form>
	<label>Name:</label> <input type="text" name="name"/><br/><br/>
	<label>Surname:</label> <input type="text" name="surname"/><br/><br/>
	<label>Password:</label> <input type="password" name="password"/><br/><br/>
	<label>E-mail:</label> <input type="email" name="email"/><br/><br/>
	<label>Birthdate:</label> <input type="date" name="date"/><br/><br/>

	<select name="city">
		<option>Zagreb</option>
		<option>Osijek</option>
		<option>Rijeka</option>
		<option>Split</option>
	</select>

	<select name="city">
		<option>Zagreb</option>
		<option>Osijek</option>
		<option>Rijeka</option>
		<option>Split</option>
	</select>
</form>