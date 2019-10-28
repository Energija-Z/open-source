<?php
	if(!isset($_SESSION))
		session_start();

	session_destroy();
	//echo "<p>Odjavljeni ste</p><br/>";
	header('Location: 4.php?tab=1.php', true, $statusCode);
?>