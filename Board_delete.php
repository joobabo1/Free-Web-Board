<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Board_delete</title>
<link rel="stylesheet" href="bootstrap-3.0.2-dist/dist/css/bootstrap.min.css" type="text/css" />
</head>

<body>
	<?php
	
		session_start();
		
		include_once('config.php');
		$conn = mysql_connect($db_server,$db_id,$db_pw);
		mysql_select_db($db_table) or die(mysql_errno());
	?>
    
    <?php
    
	    $doc_idx = $_GET['doc_idx'];
		
	    $q = "DELETE FROM ap_bbs WHERE doc_idx = $doc_idx";
		$result = mysql_query($q);
	
		if ($result == false)
		{
		    $_SESSION['delete_status'] = 'NO';
		}
		else
		{
		    $_SESSION['delete_status'] = 'YES';
		}  
		
		mysql_close();
		
		header("Location: Board_delete_done.php");
		exit();
	?>
    
</body>
</html>