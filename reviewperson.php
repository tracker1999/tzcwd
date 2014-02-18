<?php
$con = mysql_connect("localhost:3306", "root", "123");
if (!$con) {
    die("Could not connect: " . mysql_error());
}
mysql_select_db("tracker_grade", $con);
if ($_GET["o"] == "d") {
	$result = mysql_query("DELETE FROM review_person WHERE id=" . $_GET["id"]);
} else if ($_GET["o"] == "a") {
	$result = mysql_query("INSERT INTO review_person (name, job) VALUES ('" . $_GET["name"] . "', '" . $_GET["job"] . "')");
}
if ($result) {
	echo 'success';
} else {
	echo 'failure';
}
mysql_close($con);
?>