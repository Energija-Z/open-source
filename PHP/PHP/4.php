<?php
	if(!isset($_SESSION))
		session_start();
?>
<!DOCTYPE html>
<html>
	<head><link href="prop/style.css" rel="stylesheet"/></head>

	<body>
<?php
	$nav = '
		<nav><ul>
			<li><a href="?tab=1">Login</a></li>
	';

	if(isset($_SESSION['role'])){
		if($_SESSION['role'] == 'admin')
			$nav = $nav . '<li><a href="?tab=2">Roles</a></li>';

		if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'editor')
			$nav = $nav . '<li><a href="?tab=3">Content</a></li>';

		if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'editor' || $_SESSION['role'] == 'user')
			$nav = $nav . '<li><a href="?tab=4">Logout</a></li>';
	}

	$nav = $nav . '</nav></ul>';
	echo $nav;
	echo '<main>';

	if(isset($_GET['tab'])){
		$tab = $_GET['tab'];

		if($tab == 1) include('prop/login.php');
		else if($tab == 2) include('prop/roles.php');
		else if($tab == 3) include('prop/write.php');
		else if($tab == 4) include('prop/logout.php');
	}

	if(isset($_SESSION['username']))
		echo "Dobar dan " . $_SESSION['role'] . " " . $_SESSION['username'];

	echo '</main>';
?>
	</body>
</html>