<?php require_once 'db_con.php'; 
	
	if (isset($_POST['register'])) {
		$name = $_POST['name'];
		$postal = $_POST['postal'];
		$phone = $_POST['phone'];
		$county = $_POST['county'];
		$national_id= $_POST['national_id'];
		$town = $_POST['town'];
		$registry = $_POST['registry'];
		$casetype= $_POST['casetype'];
		$caseno= $_POST['caseno'];
		$yearfile= $_POST['yearfile'];
		$hearing= $_POST['hearing'];
		$status= $_POST['status'];
		$details= $_POST['details'];

		$photo = explode('.', $_FILES['photo']['name']);
		$photo= end($photo);
		$photo_name= $registry.$casetype.$caseno.'.'.$yearfile;

		$input_error = array();
		if (empty($name)) {
			$input_error['name'] = "The Name Filed is Required";
		}
		if (empty($postal)) {
			$input_error['postal'] = "The P.O BOX Filed is Required";
		}
		if (empty($county)) {
			$input_error['county'] = "The county Filed is Required";
		}
		if (empty($town)) {
			$input_error['town'] = "The PTown Filed is Required";
		}
		if (empty($photo)) {
			$input_error['photo'] = "The Photo Filed is Required";
		}
		if (empty($national_id)) {
			$input_error['national_id'] = "The National ID Filed is Required";
		}
		if (empty($phone)) {
			$input_error['phone'] = "The phone number Filed is Required";
		}
		if (empty($registry)) {
			$input_error['registry'] = "The registry Filed is Required";
		}
		if (empty($caseno)) {
			$input_error['caseno'] = "The Case Number Filed is Required";
		}
		if (empty($casetype)) {
			$input_error['casetype'] = "The Case Type Filed is Required";
		}
if (empty($status)) {
			$input_error['status'] = "The Status Filed is Required";
		}
		if (empty($hearing)) {
			$input_error['hearing'] = "The Hearing Date Filed is Required";
		}
		if (empty($details)) {
			$input_error['details'] = "The Other Details Filed is Required";
		}



		if (count($input_error)==0) {
			
			}
 $query ="INSERT INTO `casefile` (`name`,`national_id`,`phone`,`postal`,`county`,registry,casetype,caseno,yearfile,hearing,status,details,file1,town) value('$name','$national_id','$phone','$postal','$county','$registry','$casetype','$caseno','$yearfile','$hearing','New','$details','$photo_name','$town');";
									$result = mysqli_query($db_con,$query);
								if ($result) {
									$datainsert['insertsucess'] = '<p style="color: green;">case Inserted Success!</p>';
									move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
									
								}else{
									$datainsert['inserterror']= '<p style="color: red;">case Not Inserted, please input right informations!</p>';
									header('Location: add-casefile.php?insert=error');
								}
								
								}
								
						
		
	

?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Add Case <small class="text-warning"></small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add New Case</li>
  </ol>
</nav>

	

	
<div class="col-sm-12">
		
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-body">
	
	  <div class="toast-header">
	  <?php if (isset($datainsert)) {?>
	    <strong class="mr-auto">Insert Alert</strong>
	    <small><?php echo date('d-M-Y'); ?></small>
		
	    <?php 
	    	if (isset($datainsert['insertsucess'])) {
	    		echo $datainsert['insertsucess'];
	    	}
	    	if (isset($datainsert['inserterror'])) {
	    		echo $datainsert['inserterror'];
	    	}
	    ?>
	    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
	    </button>
		<?php } ?>
	  </div>
	
	  </div>
	 
	</div>
		
     </div>  
         <div class="row animate__animated animate__pulse"> 
       <table style>
	   
             	<form method="POST" enctype="multipart/form-data" style="box-shadow:1px 2px 3px 4px navy;padding:22px;width:100%;">
					<?php
error_reporting(0);
 $showuser1 = $_SESSION['user_login']; $haha = mysqli_query($db_con,"SELECT * FROM `users` WHERE `username`='$showuser1';"); $showrow1=mysqli_fetch_array($haha); ?>

		 <?php if($showrow1['level']=="user"){

			 } else {?>	
<?php $showuser = $_SESSION['user_login']; $haha = mysqli_query($db_con,"SELECT * FROM `staff` WHERE `username`='$showuser';"); $showrow=mysqli_fetch_array($haha); ?>

<?php }?> 
				 <tr>
				  <div class="form-group">
				  <label for="name">Full Name | Business Name</label>
				      <input type="text" class="form-control" value="<?php echo $showrow['name']; ?>" name="name" placeholder="Name" id="inputEmail3"><?= isset($input_error['name'])? '<label for="inputEmail3" class="error">'.$input_error['name'].'</label>':'';  ?>
				    </div></tr>
					 <tr>
					<div class="form-group">
				   <label for="NationalId">National ID | Business Number</label>
				      <input type="number" class="form-control" required value="<?php echo $showrow['national_id']; ?>" name="national_id" placeholder="national_id" id="inputEmail3"><?= isset($input_error['national_id'])? '<label class="error">'.$input_error['national_id'].'</label>':'';  ?>
				      
				    </div>
					</tr>
					<tr>
				  					<div class="form-group">
				   <label for="Phone Number">Phone Number</label>
				      <input type="text" class="form-control" value="<?php echo $showrow['phone']; ?>" name="phone" placeholder="Phone Number" id="inputEmail3"><?= isset($input_error['phone'])? '<label class="error">'.$input_error['phone'].'</label>':'';  ?>
				      <?= isset($phone_error)? '<label class="error">'.$phone_error.'</label>':'';  ?>
				    </div>
				</tr>
				 <tr>
				  <div class="form-group">
				  <label for="name">Postal Address</label>
				      <input type="text" class="form-control" required name="postal" placeholder="Postal Address" id="inputEmail3"><?= isset($input_error['postal'])? '<label for="inputEmail3" class="error">'.$input_error['postal'].'</label>':'';  ?>
				    </div></tr>
					<tr>
				  <div class="form-group">
				  <label for="name">County</label>
				      <input type="text" class="form-control" required name="county" placeholder="Enter County Name" id="inputEmail3"><?= isset($input_error['county'])? '<label for="inputEmail3" class="error">'.$input_error['county'].'</label>':'';  ?>
				    </div></tr>
					<tr>
				  <div class="form-group">
				  <label for="name">Town</label>
				      <input type="text" class="form-control"required  name="town" placeholder="Enter town Name" id="inputEmail3"><?= isset($input_error['town'])? '<label for="inputEmail3" class="error">'.$input_error['town'].'</label>':'';  ?>
				    </div></tr>
					
					<tr>
				  <div class="form-group">
				  <label for="name">Case Number</label>
				      <input type="text" class="form-control" value="<?php $rn = rand(1000000, 9999999); echo $rn;?>" readonly name="caseno" placeholder="Enter caseno" id="inputEmail3"><?= isset($input_error['caseno'])? '<label for="inputEmail3" class="error">'.$input_error['caseno'].'</label>':'';  ?>
				    </div></tr>
										<tr>
				  <div class="form-group" style="width:7%;">
				  <label for="name">Year</label>
				      <input type="text" class="form-control" value="<?php  echo date('Y');?>" readonly name="yearfile" placeholder="Enter yearfile Name" id="inputEmail3"><?= isset($input_error['yearfile'])? '<label for="inputEmail3" class="error">'.$input_error['yearfile'].'</label>':'';  ?>
				    </div></tr>
					<tr>
				  <div class="form-group">
				  <label for="name">Registry</label>
				      <select type="text" class="form-control" required name="registry" placeholder="Enter registry Name" id="inputEmail3" style=""><?= isset($input_error['registry'])? '<label for="inputEmail3" class="error">'.$input_error['registry'].'</label>':'';  ?>
					   <option style="width:160px;"> </option>
					  <?php
$res=mysqli_query($db_con,"SELECT * FROM regcategory");
while($row=mysqli_fetch_array($res))
{
    
    ?>

<option style="width:160px;" value="<?php echo $row['reg_name']; ?>"><?php echo $row['reg_name']; ?></option>
<?php 
}
?> 	
					  </select>
				    </div></tr>
					
				<tr>
				  <div class="form-group">
				  <label for="casetype">Type of Case</label>
				  <select type="text" class="form-control" required name="casetype" placeholder="casetype" id="inputEmail3"  ><?= isset($input_error['casetype'])? '<label class="error">'.$input_error['casetype'].'</label>':'';  ?>
					  <option style="width:150px;">  </option>
					 <?php
$res=mysqli_query($db_con,"SELECT * FROM casetype");
while($row=mysqli_fetch_array($res))
{
    
    ?>

<option style="width:150px;" value="<?php echo $row['case_name']; ?>"><?php echo $row['case_name']; ?></option>
<?php 
}
?> 	
					  
					  </select>
				    </div>
					</tr>
												
				
				<tr>
				  <div class="form-group" style="width:26.6%;">
				  <label for="name">Date of Next Hearing(IF ANY)</label>
				  <?php
error_reporting(0);
 $showuser1 = $_SESSION['user_login']; $haha = mysqli_query($db_con,"SELECT * FROM `users` WHERE `username`='$showuser1';"); $showrow1=mysqli_fetch_array($haha); ?>

		 <?php if($showrow1['level']=="user"){
			 
				  
				echo ' 
				  
				      <input type="date2" class="form-control" value=""  name="hearing" placeholder="Enter hearing date" id="inputEmail3" readonly> 
				    ';
					
					} else {?>	
<?php $showuser = $_SESSION['user_login']; $haha = mysqli_query($db_con,"SELECT * FROM `staff` WHERE `username`='$showuser';"); $showrow=mysqli_fetch_array($haha); ?>
<input type="date" class="form-control" value=""  name="hearing" placeholder="Enter hearing date" id="inputEmail3">

<?php }?> 
					</div></tr>
									<tr>
				  <div class="form-group">
				  <label for="status">Case Status</label>
				      <input type="text" class="form-control" value="New" readonly name="status" placeholder="New" id="inputEmail3"><?= isset($input_error['status'])? '<label for="inputEmail3" class="error">'.$input_error['status'].'</label>':'';  ?>
				    </div></tr>
					
					
				 <tr>
				 
				  	<div class="form-group">
					<label for="photo">Choose your photo</label>
				  	
				      <input type="file" id="photo" name="photo" class="form-control" id="inputPassword3" required>
				     	<?= isset($input_error['photo'])? '<label for="inputEmail3" class="error">'.$input_error['photo'].'</label>':'';  ?>			    
				  </div> 
				  </tr>
				  <tr>
				  <div class="form-group">
				  <label for="details">Details</label>
				      <textarea type="text" class="form-control" value="" required name="details" placeholder="Enter details" id="inputEmail3"cols="76"></textarea><?= isset($input_error['details'])? '<label for="inputEmail3" class="error">'.$input_error['details'].'</label>':'';  ?>
					 
				    </div></tr>
				  <tr>
					<div class="form-group text-center">
				
				      <button type="submit" name="register"  class="btn btn-primary text-center">Submit Your Case</button>
				    </div>
				</tr>
				</form>
				 </table>
            </div>
</div>