<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Board_modify page</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
<script>
	function valuecheck()
	{
		if(write_form.subject.value == "")
		{
			alert("Subject is required");
			write_form.subject.focus();
			return;
		}
		else
		{
			document.write_form.submit();
		}
	}
</script>
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
	    
	    if( isset($doc_idx) == false )
		
	    	{
	    		echo "There is no number of text.";
				exit();
	   		 }
						
			$q = "SELECT * FROM ap_bbs WHERE doc_idx = '$doc_idx'";
			$result = mysql_query($q);
			$data = mysql_fetch_array($result);
			
			$doc_idx = $_GET['doc_idx'];
			
					
	
	 ?>
    
    
    <div class="container">
   
        <br><br>
        
       <!--Start Navigation-->    
	       <nav class="navbar navbar-default" role="navigation">
			  <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			      <span class="sr-only">Toggle navigation</span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			    </button>
			    <a class="navbar-brand" href="Board_list.php">Free Board</a>
			  </div>
			
			  <!-- Collect the nav links, forms, and other content for toggling -->
			  <div class="collapse navbar-collapse">
			    <ul class="nav navbar-nav">
			      <li><a href="Board_list.php"> List </a></li>
			      <li><a href="Board_write.php">Write</a></li>
			    </ul>
			  
			    <ul class="nav navbar-nav navbar-right">
			      <li class="nav-divider"></li>
			      <li><a href="#"><i class="icon-user"> </i><?php echo $_SESSION['user_id'];?> </a></li>
			      <li><a href="logout.php">Sign out</a></li>
			    </ul>
			  </div><!-- /.navbar-collapse -->
			</nav>
	    <!--End Navigation-->				
    
    	<br><br>
    
        <!--Write_Modify part-->
		    <div class="row">
		    	<div class="col-md-5 col-md-offset-3">
		    		<fieldset>		
					    <form name ="write_form" method = "POST" action = "Board_modify_check.php">
					        <input type="hidden" name="doc_idx" value="<?php echo $doc_idx ?>">
					        
					        <table>
					            <tr>
					                <td>
					            		*Subject&nbsp;
						            </td>
					            
					          		<td>
					                    <input class="form-control" type ="text" name = "subject" size ="90" value="<?php echo $data['subject'];?>">
						            </td>
					            </tr>
					            
					            <tr>
					                <td>
					                    Content&nbsp;
					            	</td>
					                
						            <td>
					                    <textarea class="form-control" name="content" cols="100" rows="10"><?php echo $data['content'];?></textarea>
					    	        </td>
					            </tr>
					        	
					        </table><br>
					        <span><input class="col-xs-3 col-xs-offset-5 col-md-3 col-md-offset-5 btn btn-success" type = "button" onclick="valuecheck();" value = "save"></span>
					        </form>
						</fieldset>        
					</div>        
			 </div>
</div>
    <script src="http://code.jquery.com/jquery.js"></script>

    <script src="bootstrap-3.0.2-dist/dist/js/bootstrap.min.js"></script>

</body>
</html>