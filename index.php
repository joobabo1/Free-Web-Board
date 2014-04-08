<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Free Board</title>
<link rel="stylesheet" href="bootstrap-3.0.2-dist/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" href="style/custom.css" type="text/css" />
<script>
	function valuecheck()
	{
		if(login_form.user_id.value == "")
		{
			alert("Username is required");
			login_form.user_id.focus();
			return;
		}
		else if(login_form.user_pass.value == "")
		{
			alert("Password is required");
			login_form.user_pass.focus();
			return;
		}
		else
		{
			document.login_form.submit();
		}
	}
	</script>
	
</head>

<body>
	
	<div class="row">
			<div class="header vert">
				
					<h1>The Free Board</h1>
					<p class="lead hidden-xs">Easy to become a member and write your message!</p>
			
			</div>
	</div>
	<br/><br/>
	
	
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Member Login</h3>
					</div>
						<div class="panel-body">
							<form name="login_form" method="post" action="login_check.php">
								<fieldset>
				                    	<p class="input-group">
				                    		<span class="input-group-addon"><i class="icon-user"></i></span>
				                        	<input class="form-control" type="text" name="user_id" placeholder="UserName" />
				                        </p>
				                        <p class="input-group">
				                        	<span class="input-group-addon"><i class="icon-key"></i></span>
				                        	<input class="form-control" type="password" name="user_pass" placeholder="Password" />
				                        </p><br/>
										<input class="btn btn-success" type="button" onclick="valuecheck();" value="Sign In" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<span class="icon-gear"><a href="signup.php"> Register</a></span>
				            	</fieldset>            
		                    </form>
	                    </div>
				</div>
             </div>
		</div>
   </div>	
    
    
    <div>
    	<p align="center" class="footertext"><i class="icon-shield"></i> Copyright © 2014 - Cj Choi</p>
    </div>

</body>
</html>
