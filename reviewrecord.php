<?php
$con = mysql_connect("localhost:3306", "root", "123");
if (!$con) {
    die("Could not connect: " . mysql_error());
}
mysql_select_db("tracker_grade", $con);
$result = false;
if ($_GET["o"] == "s") {
	$result = mysql_query("INSERT INTO review_record (code, score) VALUES ('" . $_GET["code"] . "', '" . $_GET["score"] . "')");
}
if ($result) {
	echo 'success';
} else {
	echo 'failure';
}
mysql_close($con);
?>