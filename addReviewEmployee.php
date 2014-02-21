<?php
include 'filter/adminFilter.php';
$con = mysql_connect("localhost:3306", "root", "");
if (!$con) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("tracker_grade", $con);
$result = mysql_query("SELECT * FROM employee where id NOT in (SELECT userId FROM employee_review)");
mysql_close($con);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="style/admin.css" />
		<script type="text/javascript" src="script/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="script/manager.js"></script>
		<title>通州车务段 - 北京铁路局</title>
	</head>
	<body>
		<div class="top-bar">
			<div class="content">
				<?php
					echo $user['name'];
				?>
		 		<a class="logout-button" href="/action/logoutAction.php">退出</a>
		 	</div>
		</div>
		<div class="main">
			<div class="content">
				<h2>添加被审核人员</h2>
				<table>
					<tr><th>编号</th><th>姓名</th><th>部门</th><th>职务</th><th>操作</th></tr>
					<?php
						$index = 1;
						while(($row = mysql_fetch_array($result)) !== false) {
							echo '<tr><td>' . $index . "</td><td>" . $row['name'] . "</td><td>" . $row['department'] . "</td><td>" . $row['job'] . '</td><td><a href="javascript:void(0);" onclick="tudou.action.reviewPerson.add(' . $row['id'] . ');">添加</a></td></tr>';
							$index++;
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>