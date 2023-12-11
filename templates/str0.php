<?php
require "../php/conn.php";
 session_start();
	$stringnm = "";
	if ($_REQUEST['stringname']) {
		# code...
		$stringnm = $_REQUEST['stringname'];
		$_SESSION['stro'] = 2;
		//echo $select;
		echo $_SESSION['stro'];
	}
?>