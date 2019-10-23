<?php
	if(!isset($_SESSION)){
		session_destroy();
		echo "<p>Odjavljeni ste</p><br/>";
	}
?>