<?php
require "../php/conn.php";
 session_start();
	$tamnt = "";
	if ($_REQUEST['myAmnt']) {
		# code...
		$tamnt = $_REQUEST['myAmnt'];
		$_SESSION['amnt_selected'] = $tamnt;
		//echo $select;
		echo $_SESSION['amnt_selected'];
	}
?>