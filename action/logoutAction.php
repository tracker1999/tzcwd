<?php
include '../filter/userFilter.php';
unset($_SESSION['user']);
header('Location: /');
exit();
?>