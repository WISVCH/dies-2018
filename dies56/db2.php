<?php

	$mysqlhost = "Joost"; 
	$user = "cie_dies";
	$passwd = "QH5f6xseydreUVZ8";
	
	
	$mysql = mysql_connect($mysqlhost, $user, $passwd);
	if (!$mysql) {
		die('Could not connect: ' . mysql_error());
	}

	$db_selected = mysql_select_db('cie_dies', $mysql);
	if (!$db_selected) {
		die('Could not connect: ' . mysql_error());
	}
?>
