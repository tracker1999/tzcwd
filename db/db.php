<?php
include 'config.php';
echo $db_url . $db_user . $db_password;
class DBConnector {
	var $connect;
	
	function __construct() {
		echo '1';
		global $db_url,$db_user,$db_password;
		echo $db_url . $db_user . $db_password;
		$this->connect = mysql_connect($db_url, $db_user, $db_password);
		if (!$this->connect) {
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db($db_name, $this->connect);
	}

	function __destruct() {
		echo '2';
		mysql_close($this->connect);
	}
}
new DBConnector();
?>