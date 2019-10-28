<?php
	function conn() {
		$var = mysqli_connect('localhost', 'root', '', 'database') or die('Connection error');
		return $var;
	}
?>