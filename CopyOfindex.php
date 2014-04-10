<?php
$isVoted = false;
if ($_COOKIE["uid"]) {
	$isVoted = true;
}
if ($isVoted == false) {
	$con = mysql_connect("localhost:3306", "root", "123");
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("tracker_grade", $con);
	$result = mysql_query("SELECT * FROM review_person");
	mysql_close($con);
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="style/index.css" />
		<script type="text/javascript" src="script/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="script/jquery.cookie.min.js"></script>
		<script type="text/javascript" src="script/index.js"></script>
		<title>通州车务段 - 北京铁路局111111</title>
	</head>
	<body>
		<div class="frame">
			<div class="personList">
				<?php
					if ($isVoted) {
						echo "<h2>您已经评过分了</h2>";
					} else {
						echo "<h2>人员列表</h2><table><tr><th>编号</th><th>姓名</th><th>职务</th><th>分数</th></tr>";
						$index = 1;
						while(($row = mysql_fetch_array($result)) !== false){
							echo "<tr><td>" . $index . "</td><td>" . $row["name"] . "</td><td>" . $row["job"] . "</td><td><input type='text' /></td></tr>";
							$index++;
						}
						echo "</table><div><span>请输入您的身份证号：</span><input id='code' type='text' /><input id='submitButton' type='button' value='提交' /></div>";
					}
				?>
			</div>
		</div>
	</body>
</html>