<?php include 'filter/userFilter.php'; ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="style/login.css" />
		<script type="text/javascript" src="script/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="script/utils.js"></script>
		<script type="text/javascript" src="script/login.js"></script>
		<title>通州车务段-北京铁路局</title>
	</head>
	<body>
		<div class="main">
			<div class="left-part">
				<h3>账号登录</h3>
				<div class="error-notice">错误提示</div>
				<form method="POST" action="action/loginAction.php">
					<div>
						<span>账　号</span>
						<input type="text" name="name" />
					</div>
					<div>
						<span>密　码</span>
						<input type="password" name="password" />
					</div>
					<input class="btn" type="submit" value="登陆"/>
				</form>
			</div>
			<div class="right-part">
				<span>提示：账号为身份证号，初始密码为6个0，如果不能成功登陆，请联系劳动人事科解玉薇</span>
			</div>
		</div>
	</body>
</html>