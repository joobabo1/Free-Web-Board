<?php
	session_start();
	$is_logged = $_SESSION['is_logged'];
	
	if($is_logged == 'YES')
	{
		$user_id = $_SESSION['user_id'];
		$message = 'Dear ' . $user_id . ', Welcome! You have been logged.';
		
		echo "";
	}
	else
	{
		$message = 'Sorry, Password is incorrected.';
	}
	
	//var_dump($_SESSION);
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>login done</title>
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
							<div>
								<h3><?php echo $message;?><br /><br/></h3>
							</div>
						<div class="form-group">
							<a class="btn btn-success form-control" href="Board_list.php">Go to Board</a>
						</div>
						</div>
					</div>	
				</div><a class="btn" href="logout.php">Sign out</a>
			</div>
		</div>
    </div>
	<div class="container">		
		
	</div>
</body>
</html>