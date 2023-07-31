<?php
include ('database.php');
					$id = base64_decode($_GET['id']);
?>

    <!-- Bootstrap core CSS -->
    

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    

    <!-- Custom styles for this template -->
 

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>


<h1 class="text-primary"><i class="fas fa-list-alt"></i> Print Case Details<small class="text-warning">  </small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="">All Cases </a></li>
     <li class="breadcrumb-item active" aria-current="page">Print Case</li>
  </ol>
</nav>
	
 <div class="row animate__animated animate__pulse">
<?php 

$id = base64_decode($_GET['id']);
$res=mysqli_query($db_con,"SELECT * FROM casefile where id='$id' ");
while($row=mysqli_fetch_array($res))
{
    
    ?>
     <a href="data-print.php?id=<?php echo $row['id'];?>" target="_new">

              <h2><i class="fa fa-print">Print</i></h2></a>
 			
			<br />
						<?php
    
}
?>			
			<div class="table-responsive">
				<table class="table" style="border:1px solid navy;">
					
				<?php
					include ('database.php');
					$id = base64_decode($_GET['id']);
					$result = $database->prepare ("SELECT * FROM casefile  WHERE `id`= $id");
					$result ->execute();
					for ($count=0; $row_member = $result ->fetch(); $count++){
					$id = $row_member['id'];
				?>
				<thead>
								<tr  style="background-color:navy;">
								<th colspan="6" style="text-align:left;background:navy;color:white;font-size:22px;padding:9px;">Case File Number | <?php echo $row_member['caseno']; ?>/<?php echo $row_member['yearfile']; ?><span style="float:right;font-size:15px;"> Date Registered:<?php  echo date("l,F jS, Y",strtotime($row_member['datetime'])); ?></span></th>	
									
									
								</tr>
						  </thead>   
						  <tbody>
			
					<tr>
					<th style="text-align:left;width:10%;">Fullname/Institution:</th>
						<td style="text-align:top-left;padding:15px;width:20%;"><?php echo $row_member['name']; ?></td>
						<th style="text-align:left;width:10%;">National ID/ Registration Number:</th>
						<td style="text-align:top-left;padding:15px;width:20%;"><?php echo $row_member['national_id']; ?></td>
						<th style="text-align:left;width:10%;">Contact Information:</th>
						<td style="text-align:top-left;padding:5px;width:18%;">
						<?php echo $row_member['phone']; ?></br>
						<?php echo $row_member['postal']; ?></br>
						<?php echo $row_member['town']; ?> Town</br>
						<?php echo $row_member['county']; ?> County
						</td>
						
					</tr>
					<tr>
					<th style="text-align:left;width:10%;">Case Number:</th>
				<td style="text-align:top-left;padding:15px;width:10%;"><?php echo $row_member['caseno']; ?>/<?php echo $row_member['yearfile']; ?></td>
<th style="text-align:left;width:10%;">Registry:</th>
				<td style="text-align:top-left;padding:15px;width:10%;"><?php echo $row_member['registry']; ?></td>
				<th style="text-align:left;width:10%;">Case Type:</th>
				<td style="text-align:top-left;padding:15px;width:10%;"><?php echo $row_member['casetype']; ?></td>
				
					</tr>
					<?php	}	?>
					
					<tr>
					<th style="text-align:left;width:10%;">Case Updates:</th>
					
					<td style="text-align:top-left;padding:7px;width:10%;"colspan="5" ><p>
					<?php
					include("connection.php");
					$id = base64_decode($_GET['id']);
$res=mysqli_query($con,"SELECT caseno FROM casefile  where id=$id");
while($row=mysqli_fetch_array($res))
	
{
	$caseno=$row['caseno'];
	 ?>
	 <?php	}?>
	 <?php
$res=mysqli_query($con,"SELECT * FROM caseprogress  where caseno=$caseno");
while($row=mysqli_fetch_array($res))
	
{		
 ?>
					<b>Status: </b><?php echo $row['status']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date Of Hearing:</b> <?php echo $row['hearing']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Date Processed:</b> <?php echo $row['dateprocessed']; ?>
					
					<h4 style="text-decoration:underline">More Details</h4><?php echo $row['details']; ?></p>
					<hr>
					<?php	}?>
					</td></br>
					
					</tr>
					<tr colspan="6">
<?php
error_reporting(0);
 $showuser1 = $_SESSION['user_login']; $haha = mysqli_query($db_con,"SELECT * FROM `users` WHERE `username`='$showuser1';"); $showrow1=mysqli_fetch_array($haha); ?>

		 <?php if($showrow1['level']=="user"){
			 $name=$showrow1['name'];
 
			echo " <td style='color:blue; font-size:15px;'>Printed By:$name
 
</td>";

			 } else {?>	
<?php $showuser = $_SESSION['user_login']; $haha = mysqli_query($db_con,"SELECT * FROM `staff` WHERE `username`='$showuser';"); $showrow=mysqli_fetch_array($haha); ?>
<td style="color:blue; font-size:15px;">Printed By: <?php echo $showrow['name']; ?>
 
</td>
<?php }?> 

   
	</tr>
				</table>
				    
			</div>
      </div>
    </div>

    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
