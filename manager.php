<?php
$con = mysql_connect("localhost:3306", "root", "");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("tracker_grade", $con);
$result = mysql_query("SELECT * FROM review_person");
mysql_close($con);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="style/manager.css" />
		<script type="text/javascript" src="script/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="script/manager.js"></script>
		<title>通州车务段 - 北京铁路局</title>
	</head>
	<body>
		<div class="frame">
			<div class="addPane">
				<h2>添加被评审人员</h2>
				<div>
					<span>姓名：</span><input id="name" type="text" />
					<span>职务：</span><input id="job" type="text" />
					<input id="submitButton" type="button" value="添加"/>
				</div>
			</div>
			<div class="personList">
				<h2>被评审人员列表</h2>
				<table>
					<tr><th>编号</th><th>姓名</th><th>职务</th><th>操作</th></tr>
					<?php
						$index = 1;
						while(($row = mysql_fetch_array($result)) !== false) {
							echo '<tr><td>' . $index . "</td><td>" . $row['department'] . "</td><td>" . $row['name'] . "</td><td>" . $row['job'] . '</td><td><a href="javascript:void(0)" data_id="' . $row['id'] . '">删除</a></td></tr>';
							$index++;
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>