<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>

<link rel="stylesheet" href="bootstrap-3.0.2-dist/dist/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="style/message.css" type="text/css" />
<script>
	function valuecheck()
	{
		if(signup_form.user_id.value == "")
		{
			alert("Username is required");
			signup_form.user_id.focus();
			return;
		}
		else if(signup_form.user_pass.value == "")
		{
			alert("Password is required");
			signup_form.user_pass.focus();
			return;
		}
		else if(signup_form.user_pass2.value == "")
		{
			alert("Re-Password is required");
			signup_form.user_pass2.focus();
			return;
		}
		else if(signup_form.user_email.value == "")
		{
			alert("E-mail is required");
			signup_form.user_email.focus();
			return;
		}
		else
		{
			document.signup_form.submit();
		}
	}
</script>
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 panel panel-footer">	
				<fieldset>		
					<h1 align="center">Welcome to Register</h1>
		            <hr />    	
			            <form name="signup_form" method="post" action="signup_check.php" >
	                        <input class="form-control" type="text" name="user_id" placeholder="UserName" /><br/>
	                        <input class="form-control" type="password" name="user_pass" placeholder="Password" /><br />
	                        <input class="form-control" type="password" name="user_pass2" placeholder="Re-Password" /><br />
	                        <input class="form-control" type="text" name="user_email" placeholder="E-mail" /><br />
	                        <input class="form-control btn btn-success" type="button" onclick="valuecheck();" value="submit" /><br />
	                    </form>
	                
	             </fieldset>
	             <br/><p align="center"><a href="index.php">Home</a></p>    
		    </div>
        </div>                
	</div>
</body>
</html>