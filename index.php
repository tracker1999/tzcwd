<?php
include '/filter/userFilter.php';
$con = mysql_connect("localhost:3306", "root", "");
if (!$con) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("tracker_grade", $con);
$result = mysql_query("SELECT * FROM employee_review");
mysql_close($con);
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
		<title>通州车务段-北京铁路局111</title>
	</head>
	<body>
		<?php
			include 'component/header.php';
		?>
		<div class="main">
			<div class="content">
				<h2>2013年第四季度机关中层干部岗级测评</h2>
				<form action="/action/reviewEmployeeAction.php?o=s" method="POST">
					<table>
						<tr><th>编号</th><th>姓名</th><th>部门</th><th>职务</th><th>分数</th></tr>
						<?php
							$index = 1;
							while(($row = mysql_fetch_array($result)) !== false) {
								echo '<tr><td>' . $index . '</td><td>' . $row['name'] . '</td><td>' . $row['department'] . '</td><td>' . $row['job'] . '</td><td><input type="text" name="' . $row['userId'] . '" /></td></tr>';
								$index++;
							}
						?>
					</table>
					<input type="submit" value="提交" />
				</form>
			</div>
		</div>
	</body>
</html>