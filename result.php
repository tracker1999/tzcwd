<?php
$con = mysql_connect("localhost:3306", "root", "123");
if (!$con) {
    die("Could not connect: " . mysql_error());
}
mysql_select_db("tracker_grade", $con);
$result = mysql_query("SELECT * FROM review_record");
while(($row = mysql_fetch_array($result)) !== false ) {
	echo "<tr><td>" . $index . "</td><td>" . $row["name"] . "</td><td>" . $row["job"] . "</td><td><input type='text' /></td></tr>";
	$index++;
}
if ($result) {
	echo 'success';
} else {
	echo 'failure';
}
mysql_close($con);
?>