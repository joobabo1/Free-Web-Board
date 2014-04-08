<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome Register</title>
</head>

<body>

		<?php
		//DB Connect
		include_once('config.php');
		$conn = mysql_connect($db_server,$db_id,$db_pw);
		mysql_select_db($db_table) or die(mysql_errno());

		//extract($_POST);
		
		$user_id = $_POST['user_id'];
		$user_pass = $_POST['user_pass'];
		$user_pass2 = $_POST['user_pass2'];
		$user_email = $_POST['user_email'];
				
		echo $user_id .'<br>';
		echo $user_pass .'<br>';
		echo $user_pass2 .'<br>';
		echo $user_email .'<br>';
		
		//encrypted of pw
		$encrypted_pass = sha1($user_pass);
		
		$q = "INSERT INTO ap_menber (id, pw, email) VALUES ('$user_id', '$encrypted_pass', '$user_email')";
		mysql_query($q);
		
		mysql_close($conn);
		
		header("Location: signup_done.php");
		exit();
		
	?>

</body>
</html>