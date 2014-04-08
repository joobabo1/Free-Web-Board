<?php
	session_start();
	$delete_status = $_SESSION['delete_status'];
	
	if($delete_status == 'YES')
	{
		$message = 'Completed to delete';
	}
	else
	{
		$message = 'Failed to delete';
	}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Delete_done</title>
	<style>	body{padding: 40px;}</style>
<link rel="stylesheet" href="bootstrap-3.0.2-dist/dist/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="style/message.css" type="text/css" />
</head>

<body>
	
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="fieldset">
						<div class="panel-body">
							<?php echo $message;?>
						</div>
					</div>	
				</div><?php echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/Board_list.php" class="btn" >List</a>';?>
			</div>
		</div>
    </div>
	<br>
	
</body>
</html>