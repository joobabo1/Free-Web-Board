<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Free Board</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
</head>

<body>
	<div class="container">
		<?php
				session_start();
					
				include_once('config.php');
				$conn = mysql_connect($db_server,$db_id,$db_pw);
				mysql_select_db($db_table)or die(mysql_errno());
				
				$doc_idx = $_GET['doc_idx'];
								
				//Check to the DB table
				$q = "SELECT * FROM ap_bbs WHERE doc_idx = $doc_idx";
				$result = mysql_query($q);
				$data = mysql_fetch_array($result);
				
		?>
		
		<br><br>
		
		<!--Start Navigation-->    
	       <nav class="navbar navbar-default" role="navigation">
			  <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			      <span class="sr-only">Toggle navigation</span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			    </button>
			    <a class="navbar-brand" href="Board_list.php">Free Board</a>
			  </div>
			
			  <!-- Collect the nav links, forms, and other content for toggling -->
			  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			    <ul class="nav navbar-nav">
			      <li><a href="Board_list.php"> List </a></li>
			      <li><a href="Board_write.php">Write</a></li>
			    </ul>
			  
			    <ul class="nav navbar-nav navbar-right">
			      <li><a href="#"><i class="icon-user"> </i><?php echo $_SESSION['user_id']; ?> </a></li>
			      <li><a href="logout.php">Sign out</a></li>
			    </ul>
			  </div><!-- /.navbar-collapse -->
			</nav>
	    <!--End Navigation-->
		
		<br><br>
		
		<!--View-->
		<div class="row">
			<div class="col-md-5 col-md-offset-3">
				<table class="table table-bordered">
				    <tr>
				        <td width="90px" align="right">
				    		Subject
				    	</td>
				    	<td align="center">
				            <?php echo $data['subject']; ?>
				    	</td>
				    </tr>
				    <tr>
				        <td align="right">
				    		Writer
				    	</td>
				    	<td align="center">
				            <?php
					            $q1 = "SELECT * FROM ap_menber where member_idx = ".$data['member_idx'].";";
					            $result1 = mysql_query($q1);
								$data1 = mysql_fetch_array($result1);
								echo $data1['id'];
				            ?>
				    	</td>
				    </tr>
				    <tr>
				        <td align="right" height="150px">
		            		Content
			    		</td>
				    	<td align="center">
				            <?php echo $data['content']; ?>
				    	</td>
				    </tr>
				</table>
				
				 <!--View buttons-->
						<div class="row">
							<div class="col-xs-offset-2 col-md-offset-4">
								<?php echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/Board_list.php" class="btn" >List</a>';?>
								
								<?php
								if($_SESSION['member_idx'] == $data['member_idx'])
									{
											echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/Board_modify.php?doc_idx='.$doc_idx.'" class="btn">Modify</a>';  
									}
								?>
								
								<?php
								if($_SESSION['member_idx'] == $data['member_idx'])
									{
										echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/Board_delete.php?doc_idx='.$doc_idx.'" class="btn">Delete</a>';
									}
								?>
							</div>
						</div>
			</div>	 
		</div>	
	</div>    
	<script src="http://code.jquery.com/jquery.js"></script>

    <script src="bootstrap-3.0.2-dist/dist/js/bootstrap.min.js"></script>	
</body>
</html>