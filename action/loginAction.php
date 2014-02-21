<?php
$name = $_POST["name"];
$password = $_POST["password"];
if ($name == '') {
	header('Location: /login.php?errorCode=1');
	exit();
} else if($password == ''){
	header('Location: /login.php?errorCode=2');
	exit();
} else {
	include '../db/connector.php';
	$con = new DBConnector();
	$query = "SELECT * FROM employee WHERE identityCard='" . $name . "' AND password='" . $password . "'";
	$result = $con->query($query);
	if (!$result) {
		die('select employee error: ' . mysql_error());
	}
	if (mysql_num_rows($result) > 0) {
		session_start();
		$_SESSION['user'] = mysql_fetch_array($result);
		header('Location: /');
		exit();
	} else {
		header('Location: /login.php?errorCode=3');
		exit();
	}
}
?>