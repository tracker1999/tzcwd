<?php
session_start();
$user = $_SESSION['user'];
if ($user == '' || $user['authority'] != 9) {
	header('Location: /');
}
?>