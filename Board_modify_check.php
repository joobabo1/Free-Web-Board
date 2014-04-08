<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>write check</title>
</head>

<body>
	<?php
			session_start();
			
			include_once('config.php');
			$conn = mysql_connect($db_server,$db_id,$db_pw);
			mysql_select_db($db_table) or die(mysql_errno());
			$doc_idx = $_POST['doc_idx'];
			$subject = $_POST['subject'];
			$content = $_POST['content'];			
			$reg_date = time();
									
			$q = "UPDATE ap_bbs SET subject='$subject', content='$content', reg_date='$reg_date' WHERE doc_idx = '$doc_idx'";
			$result = mysql_query($q);
			
			if($result == false)
			{
				$_SESSION['modify_status'] = 'NO';
			}
			else
			{
				$_SESSION['modify_status'] = 'YES';
			}
			
			mysql_close();
			
			header("Location: Board_modify_done.php");
			exit();
	?>
</body>
</html>