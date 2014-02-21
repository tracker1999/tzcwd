<?php
include 'config.php';

class DBConnector {
	private $connect;
	
	function __construct() {
		$this->connect = mysql_connect(DB_URL, DB_USER, DB_PASSWORD);
		if (!$this->connect) {
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db(DB_NAME, $this->connect);
	}

	function __destruct() {
		mysql_close($this->connect);
	}
	
	public function query($sql) {
		return mysql_query($sql);
	}
}
?>