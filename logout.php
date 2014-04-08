<?php
    include_once('config.php');
	$conn = mysql_connect($db_server,$db_id,$db_pw);
	mysql_select_db($db_table) or die(mysql_errno());
?>

<?php
	$_SESSION['is_logged'] = 'NO';
	$_SESSION['$user_id'] = '';
	$_SESSION['member_idx'] = '';
	
	session_unset($_SESSION['user_id']);
	session_unset($_SESSION['member_idx']);
	
	header("Location: logout_done.php");
	exit();
	
?>