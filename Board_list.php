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
<link rel="stylesheet" href="style/footer.css" type="text/css" />
</head>

<body>


<div class="container">	
	<?php
			session_start();
				
			include_once('config.php');
			$conn = mysql_connect($db_server,$db_id,$db_pw);
			mysql_select_db($db_table)or die(mysql_errno()) ;
			
			//Check to the DB table
			$q = "SELECT * FROM ap_bbs";
			$result = mysql_query($q);
			$total_record = mysql_num_rows($result);
	?>


		<?php if($total_record == 0):?>
        No articles.
        
        <?php else:?>
        
        <?php
			if(isset($_GET['page']))
			{
				$now_page = $_GET['page'];
			}
			else
			{
				$now_page = 1;
			}
			
			$record_per_page = 8;
			
			//Set of location and number of query
			$start_recode = $record_per_page * ($now_page - 1);
			$record_to_get = $record_per_page;
			
			if($start_recode + $record_per_page > $total_record)
			{
				$record_to_get = $total_record - $start_recode;
			}
			
			$q = "SELECT * FROM ap_bbs WHERE 1 ORDER BY doc_idx DESC LIMIT $start_recode, $record_to_get";
			$result = mysql_query($q) or die("Error".mysql_errno());
			
		?>	
        
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
		      <li class="active"><a href="Board_list.php"> List </a></li>
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
	    
	    <div>
        	<table class="table table-hover"> 	
				<thead align="center">
                    <th>No</th>
                    <th>Subject</th>
                    <th>ID</th>
                    <th>Date</th>
				</thead>
				
				<?php $num = $total_record - $start_recode; ?>
                <?php while($data = mysql_fetch_array($result, MYSQLI_ASSOC)) :?>
                	<tr>
                    	<td><?php echo $num; ?></td>
                        <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/Board_view.php?doc_idx=<?php echo $data['doc_idx']?>"><?php echo $data['subject']?></a></td>
                        
                        
				<?php	//Check to the DB table
						$q1 = "SELECT * FROM ap_menber where member_idx = ".$data['member_idx'].";";
						$result1 = mysql_query($q1);
						$data1 = mysql_fetch_array($result1);
				?>
						<td><?php echo $data1['id']?></td>
                      
                         
                        <td><?php echo date("d-m-y h:i:s",$data['reg_date'])?></td>
                    </tr>
                <?php $num--; endwhile ?>
            </table>
        </div>
        
        <?php endif?>	
        
        <div>
            <ul class="pagination">
            	
        <?php
        
		$page_per_block = 10;
		$now_block = ceil($now_page / $page_per_block);
		
        $total_page = ceil($total_record / $record_per_page);
        $total_block = ceil($total_page / $page_per_block);
        
        if(1<$now_block ) {
          $pre_page = ($now_block-1)*$page_per_block;
          echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/Board_list.php?page='.$pre_page.'">Prev</a>';
        
        }
        
        $start_page = ($now_block-1)*$page_per_block+1;
        $end_page = $now_block*$page_per_block;
        if($end_page>$total_page) {
          $end_page = $total_page;
        }
        
        ?>
            
        <?php for($i=$start_page;$i<=$end_page;$i++) :?>
            <li><a href="./Board_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php endfor?>

        </ul>
        <?php
        if($now_block < $total_block) {
          $post_page = ($now_block)*$page_per_block+1;
          echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/Board_list.php?page='.$post_page.'">Next</a>';
        }
        ?>

        
        </div><!-- .pagination -->
</div>
		    	
    <script src="http://code.jquery.com/jquery.js"></script>

    <script src="bootstrap-3.0.2-dist/dist/js/bootstrap.min.js"></script>

</body>
</html>