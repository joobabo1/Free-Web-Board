<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login check</title>
<link rel="stylesheet" href="bootstrap-3.0.2-dist/dist/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="style/message.css" type="text/css" />
</head>

<body>
	<?php
			session_start();
			
			include_once('config.php');
			$conn = mysql_connect($db_server,$db_id,$db_pw);
			mysql_select_db($db_table) or die(mysql_errno());

			//extract($_POST);
			$user_id = $_POST['user_id'];
			$user_pass = $_POST['user_pass'];
						
			$result = mysql_query("SELECT * FROM ap_menber WHERE id='$user_id'");
			
			if(mysql_num_rows($result) == 1)
			{
				//check the Id whether correct or incorrect
				$encryped_pass = sha1($user_pass);
				$row = mysql_fetch_array($result, MYSQLI_ASSOC);
								
				if($row['pw'] == $encryped_pass)
				{
					//SESSION progress to authorize user
					$_SESSION['is_logged'] = 'YES';
					$_SESSION['user_id'] = $user_id;
					
					//User check
					$_SESSION['member_idx'] = $row['member_idx'];
					
					header("Location: login_done.php");
					exit();
				}
				else
					//SESSION progress to unauthorize user
					$_SESSION['is_logged'] = 'NO';
					$_SESSION['user_id'] = '';
					
					header("Location: login_done(1).php");
					exit();
			}
			else?>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="panel panel-default">
							<div class="fieldset">
								<div class="panel-body">
									<h3><?php echo "Invailed Id";?></h3>
								</div>
							</div>	
						</div><?php echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/index.php" class="btn" >Home</a>';?>
					</div>
				</div>
		    </div>

			<?php	
	?>
</body>
</html>