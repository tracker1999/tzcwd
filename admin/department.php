<?php
include 'filter/adminFilter.php';
$con = mysql_connect("localhost:3306", "root", "");
if (!$con) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("tracker_grade", $con);
$result = mysql_query("SELECT * FROM department");
mysql_close($con);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="style/index.css" />
		<script type="text/javascript" src="script/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="script/department.js"></script>
		<title>通州车务段 - 北京铁路局</title>
	</head>
	<body>
		<div class="top-bar">
			<div class="content">
				<ul>
					<li><a href="/admin/index.php">人员管理</a></li>
					<li class="selected"><a href="/admin/department.php">部门管理</a></li>
					<li><a href="/admin/review.php">测评管理</a></li>
				</ul>
				<span><?php echo $user["name"]; ?></span>
				<a class="logout-button" href="/action/logoutAction.php">退出</a>
			</div>
		</div>
		<div class="main">
			<div class="content">
				<h2>部门列表</h2>
				<button class="add">添加部门</button>
				<table id="departmentList">
					<tr><th>编号</th><th>部门名称</th><th>操作</th></tr>
					<?php
						$index = 1;
						while(($row = mysql_fetch_array($result)) !== false) {
							echo '<tr><td>' . $index . '</td><td>' . $row['name'] . '</td><td><a href="javascript:void(0);" j_id="' . $row['id'] . '">修改</a><a href="javascript:void(0);" j_id="' . $row['id'] . '">删除</a></td></tr>';
							$index++;
						}
					?>
				</table>
			</div>
			<div id="addPane" class="content" style="display: none;">
				<h2>添加部门</h2>
				<span>名称：</span>
				<input id="name" type="text"/>
				<input id="addButton" type="button" value="添加"/>
			</div>
			<div id="editPane" class="content" style="display: none;">
				<h2>修改部门信息</h2>
				<span>名称：</span>
				<input id="name_edit" type="text"/>
				<input id="editButton" type="button" value="修改"/>
			</div>
		</div>
	</body>
</html>