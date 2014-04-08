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
			
			$subject = $_POST['subject'];
			$content = $_POST['content'];
			$reg_date = time();
			
			$member_idx = $_SESSION['member_idx'];
			
			$result = mysql_query("INSERT INTO ap_bbs (member_idx, subject, content, reg_date) VALUES ('$member_idx','$subject','$content','$reg_date')");
			
			if($result == false)
			{
				$_SESSION['writing_status'] = 'NO';
			}
			else
			{
				$_SESSION['writing_status'] = 'YES';
			}
			
			mysql_close();
			
			header("Location: Board_write_done.php");
			exit();
	?>
</body>
</html>