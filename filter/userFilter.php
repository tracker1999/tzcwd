<?php
if (isset($_SESSION['user'])) {
	$user = $_SESSION['user'];
	if ($user == '') {
		if ($_SERVER['PHP_SELF'] != '/login.php') {
			header('Location: /login.php');
			exit();
		}
	} else {
		if ($user['authroty'] == '9' && $_SERVER['PHP_SELF'] != '/admin/index.php') {
			header('Location: /admin/index.php');
			exit();
		}
		if ($_SERVER['PHP_SELF'] == '/login.php') {
			header('Location: /index.php');
			exit();
		}
	}
} else {
	if ($_SERVER['PHP_SELF'] != '/login.php') {
		header('Location: /login.php');
		exit();
	}
}
?>