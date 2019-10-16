<?php
	function conn() {
		return mysqli_connect('localhost', 'root', '', 'database') or die('Connection error');
	}
?>