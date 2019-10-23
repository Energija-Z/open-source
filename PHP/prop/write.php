<?php
	if(!isset($_SESSION))
		session_start();

	include('2.php');
	if(isset($_POST['username'])){
		$text = $_POST['text'];
		$izmjena = "INSERT INTO tekstovi ('${text}') VALUES ('${username}')";

		if(mysqli_query($mysql, $izmjena))
			echo "<p>Tekst je upisan</p><br/>";
		else
			echo "<p>Pogreška u unosu teksta</p><br/>";
	}

	echo '
		<textarea name="text"></textarea>
		<button>Submit</button>
	';

	mysqli_close($mysql);
?>