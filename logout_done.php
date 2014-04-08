<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign out_done</title>
<link rel="stylesheet" href="bootstrap-3.0.2-dist/dist/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="style/message.css" type="text/css" />

	<style>
		body{
				padding: 40px;
			}
	</style>

</head>

<body>

<?php
    include_once('config.php');
	$conn = mysql_connect($db_server,$db_id,$db_pw);
	mysql_select_db($db_table) or die(mysql_errno());		
?>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="fieldset">
						<div class="panel-body">
							<h3><?php echo 'You have been signed out.';?><br /></h3>
						</div>
					</div>	
				</div><?php echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/index.php" class="btn" >Home</a>';?>
			</div>
		</div>
    </div>
</body>
</html>