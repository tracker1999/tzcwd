<?php
include "../filter/adminFilter.php";
$con = mysql_connect("localhost:3306", "root", "");
if (!$con) {
    die("Could not connect: " . mysql_error());
}
mysql_select_db("tracker_grade", $con);
switch ($_GET["type"]) {
	case "save" :
		$result = mysql_query("INSERT INTO department (name) VALUES ('" . $_GET["name"] . "')");
		break;
	case "update" :
		$result = mysql_query("UPDATE department SET name='" . $_GET["name"] . "' WHERE id='" . $_GET["id"] . "'");
		break;
	case "delete" :
		$result = mysql_query("DELETE FROM department WHERE id='" . $_GET["id"] . "'");
		break;
}
if ($result) {
	echo 'success';
} else {
	echo 'failure';
}
mysql_close($con);
?>