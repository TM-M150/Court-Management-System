<?php require_once 'db_con.php';
session_start();
if (!isset($_SESSION['user_login'])) {
  header('Location: login.php');
}
?>

<style>
		
.container {
	width:100%;
	margin:auto;
}
	.tr{
		
	}	
.table {
    width: 100%;
    margin-bottom: 20px;
	border:1px solid navy;
	border-collapse:collapse;
	font-size:13px;
}	

.table-striped tbody > tr:nth-child(odd) > td,
.table-striped tbody > tr:nth-child(odd) > th {
     
	border:1px solid gray;
}

.table-striped tbody > tr:nth-child(even) > td,
.table-striped tbody > tr:nth-child(even) > th {
     
	border:1px solid gray;
}

@media print{
#print {
display:none;
}
}

#print {
	width:10%;
	padding:15px;
	cursor:pointer;
	color:white;
	background-color:green;
	font-size:19px;
	font-weight:bold;
	border:green;
	border-radius:15px;

}
#print:hover {
color:red;
background-color:white;
border:1px solid green;
}
		
		</style>

		
<div class="row animate__animated animate__pulse">
		<div id = "header" style="width:98%;">
		<br/>
		<script>
function printTable() {
    self.print();
	  
  
}
</script>
<button type="submit" id="print" onclick="printTable()" >Print Case</button>
			
        <div align="right">
		<b style="color:blue;">Printed On:</b>
		<?php include('current-date.php'); ?>
        </div>			
		<br/>
<?php


					include ('database.php');
					$id=$_GET['id'];
					$result = $database->prepare ("SELECT * FROM casefile WHERE `id`= $id");
?>
						<table class="table table-striped">
						<?php
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
								<td style="text-align:top-left;padding:15px;width:15%;"><?php echo $row_member['name']; ?></td>
						<th style="text-align:left;width:10%;">National ID/ Registration Number:</th>
								<td style="text-align:top-left;padding:15px;width:10%;"><?php echo $row_member['national_id']; ?></td>
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
					$id = $_GET['id'];
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
					<b style="font-size:13px">Status: </b><color style="font-size:13px;font-weight:bold;color:navy;"><?php echo $row['status']; ?></color>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<b  style="font-size:13px">Date Of Hearing:</b> <color style="font-size:13px;font-weight:bold;color:navy;"><?php echo $row['hearing']; ?></color>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
					<b  style="font-size:13px">Date Processed:</b><color style="font-size:13px;font-weight:bold;color:navy;"> <?php echo date("F jS, Y",strtotime( $row['dateprocessed'])); ?></color>
					
					<h4 style="text-decoration:underline">More Details</h4><?php echo $row['details']; ?></p>
					<hr style="border:1px solid navy;">
					<?php	}?>
					</td></br>
					
					</tr>
						  </tbody> 
					  </table> 

<br />
<br />
<?php
error_reporting(0);
 $showuser1 = $_SESSION['user_login']; $haha = mysqli_query($db_con,"SELECT * FROM `users` WHERE `username`='$showuser1';"); $showrow1=mysqli_fetch_array($haha); ?>

		 <?php if($showrow1['level']=="user"){
			 $name=$showrow1['name'];
 
			echo " <b style='color:blue; font-size:15px;'>Printed By:$name
 
</b>";

			 } else {?>	
<?php $showuser = $_SESSION['user_login']; $haha = mysqli_query($db_con,"SELECT * FROM `staff` WHERE `username`='$showuser';"); $showrow=mysqli_fetch_array($haha); ?>
<b style="color:blue; font-size:15px;">Printed By: <?php echo $showrow['name']; ?>
 
</b>
<?php }?> 

			</div>
	
	
	
	

	</div>
