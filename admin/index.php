<?php
include 'filter/adminFilter.php';
$con = mysql_connect("localhost:3306", "root", "");
if (!$con) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("tracker_grade", $con);
$employees = mysql_query("SELECT * FROM employee WHERE authority=0 AND NOT valid=0");
$departments = mysql_query("SELECT * FROM department");
mysql_close($con);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="style/index.css" />
		<script type="text/javascript" src="script/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="script/index.js"></script>
		<title>通州车务段 - 北京铁路局</title>
	</head>
	<body>
		<div class="top-bar">
			<div class="content">
				<ul>
					<li class="selected"><a href="/admin/index.php">人员管理</a></li>
					<li><a href="/admin/department.php">部门管理</a></li>
					<li><a href="/admin/review.php">测评管理</a></li>
				</ul>
				<span><?php echo $user["name"]; ?></span>
				<a class="logout-button" href="/action/logoutAction.php">退出</a>
			</div>
		</div>
		<div class="main">
			<div class="content">
				<h2>人员列表</h2>
				<button class="add">添加人员</button>
				<table id="departmentList">
					<tr><th>编号</th><th>姓名</th><th>部门</th><th>职务</th><th>操作</th></tr>
					<?php
						$index = 1;
						while(($employee = mysql_fetch_array($employees)) !== false) {
							echo '<tr><td>' . $index . '</td><td>' . $employee['name'] . '</td><td>' . $employee['department'] . '</td><td>' . $employee['job'] . '</td><td><a href="javascript:viod(0);" j_id="' . $employee["id"] . '">删除</a></td></tr>';
							$index++;
						}
					?>
				</table>
			</div>
			<div id="addPane" class="content" style="display: none;">
				<h2>添加人员</h2>
				<span>姓名：</span>
				<input id="name" type="text"/>
				<span>身份证号：</span>
				<input id="identityCard" type="text"/>
				<span>部门：</span>
				<select>
					<?php
						while(($department = mysql_fetch_array($departments)) !== false) {
							echo '<option>' . $department["name"] . '</option>';
						}
					?>
				</select>
				<input id="addButton" type="button" value="添加"/>
			</div>
			<div id="editPane" class="content" style="display: none;">
				<h2>修改人员信息</h2>
				<span>名称：</span>
				<input id="name_edit" type="text"/>
				<input id="editButton" type="button" value="修改"/>
			</div>
		</div>
	</body>
</html>