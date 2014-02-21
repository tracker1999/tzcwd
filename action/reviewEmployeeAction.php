<?php
include '../filter/adminFilter.php';
$con = mysql_connect("localhost:3306", "root", "");
if (!$con) {
    die("Could not connect: " . mysql_error());
}
mysql_select_db("tracker_grade", $con);
if ($_GET["o"] == "d") {
	$result = mysql_query("DELETE FROM employee_review WHERE id='" . $_GET["id"] . "'");
} else if ($_GET["o"] == "a") {
	$result1 = mysql_query("SELECT * FROM employee WHERE id='" . $_GET["id"] . "'");
	if (!$result1) {
		die('select employee error: ' . mysql_error());
	}
	if (mysql_num_rows($result1) > 0) {
		$employee = mysql_fetch_array($result1);
		$result = mysql_query("INSERT INTO employee_review (userId, name, department, job) VALUES ('" . $employee["id"] . "', '" . $employee["name"] . "', '" . $employee["department"] . "', '" . $employee["job"] . "')");
	}
} else if ($_GET["o"] == "s") {
	if (count($_POST) > 0) {
		$sql = "INSERT INTO employee_review_score (userId, targetId, score) VALUES ";
		foreach ($_POST as $key=>$score) {
			$sql = $sql . "('" . $user["id"] . "', '" . $key . "', '" . $score . "'), ";
		}
		$sql = substr($sql, 0, strlen($sql) - 2);
		$result = mysql_query($sql);
	}
}
if ($result) {
	echo 'success';
} else {
	echo 'failure';
}
mysql_close($con);
?>