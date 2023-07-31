<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
    
    $id = $_GET['id'];
    $oldPhoto = $_GET['file1'];

  if (isset($_POST['updatestudent'])) {
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
  	
  	if (!empty($_FILES['photo']['name'])) {
  		 $photo = $_FILES['photo']['name'];
	  	 $photo = explode('.', $photo);
		 $photo = end($photo); 
		 $photo_name = $registry.$casetype.$caseno.'.'.$yearfile;
  	}else{
  		$photo = $oldPhoto;
  	}
  	

  	$query = "UPDATE `casefile` SET `name`='$name',`national_id`='$national_id',`phone`='$phone',`postal`='$postal',`county`='$county',`registry`='$registry',`casetype`='$casetype',`caseno`='$caseno',`yearfile`='$yearfile',`status`='$status',`details`='$details',`town`='$town',`hearing`='$hearing',`file1`='$photo_name' WHERE `id`= $id";
	
		$query1= "INSERT INTO `caseprogress`(`caseno`, `status`,`hearing`,`details`) VALUES ('$caseno', '$status', '$hearing', '$details')";	

  	if (mysqli_query($db_con,$query)) {
		$query= "INSERT INTO `caseprogress`(`caseno`, `status`,`hearing`,`details`) VALUES ('$caseno', '$status', '$hearing', '$details')";
  		$datainsert['insertsucess'] = '<p style="color: green;">Case Updated!</p>';
		if (!empty($_FILES['photo']['name'])) {
			move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
				

			unlink('images/'.$oldPhoto);
			
		}	
  		header('Location: index.php?page=all-cases&edit=success');
  	}else{
  		header('Location: index.php?page=all-cases&edit=error');
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-list-alt"></i>  Edit Case Informations!<small class="text-warning">  </small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-student">All Cases </a></li>
     <li class="breadcrumb-item active" aria-current="page">Edit Cases</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT * FROM `casefile` WHERE `id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>

 <div class="row animate__animated animate__pulse">
 <table>
	<form enctype="multipart/form-data" method="POST" action="">
	
		<div class="form-group">
		    <label for="name">Full Name | Institution</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" required="">
	  	</div>
		
	  	<div class="form-group">
		    <label for="national_id">National ID | Registration Number</label>
		    <input name="national_id" type="text" class="form-control"  id="national_id" value="<?php echo $row['national_id']; ?>" required="">
	  	</div>
		
		
	  	<div class="form-group">
		    <label for="postal">Postal Address</label>
		    <input name="postal" type="text" class="form-control" id="postal" value="<?php echo $row['postal']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="phone">Mobile Phone</label>
		    <input name="phone" type="text" class="form-control" id="phone" value="<?php echo $row['phone']; ?>"  required="">
	  	</div>
		
		<div class="form-group">
		    <label for="town">Town</label>
		    <input name="town" type="text" class="form-control" id="town" value="<?php echo $row['town']; ?>"  required="">
	  	</div>
				<div class="form-group">
		    <label for="county">County</label>
		    <input name="county" type="text" class="form-control" id="county" value="<?php echo $row['county']; ?>"  required="">
	  	</div>
	  	<div class="form-group">
		    <label for="registry">Registry</label>
		    <select name="registry" class="form-control" id="registry" required="" value="">
		    	<option style="width:185px;"value="<?php echo $row['registry']; ?>"><?php echo $row['registry']; ?></option>
		    	<?php
$res=mysqli_query($db_con,"SELECT reg_name FROM regcategory");
while($row=mysqli_fetch_array($res))
{
    
    ?>

<option style="width:185px;" value="<?php echo $row['reg_name']; ?>"><?php echo $row['reg_name']; ?></option>
<?php 
}
?> 	
		    </select>
	  	</div><?php
		if (isset($id)) {
			$query = "SELECT * FROM `casefile` WHERE `id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
		<div class="form-group">
		    <label for="class">Student Class</label>
		    <select name="casetype" class="form-control" id="casetype" required value="">
<option style="width:185px;" value="<?php echo $row['casetype']; ?>"><?php echo $row['casetype']; ?></option>
		    	 <?php
$res=mysqli_query($db_con,"SELECT * FROM casetype");
while($row=mysqli_fetch_array($res))
{
    
    ?>

<option style="width:185px;" value="<?php echo $row['case_name']; ?>"><?php echo $row['case_name']; ?></option>
<?php 
}
?> 	
		    </select>
	  	</div>
		
		<?php
		if (isset($id)) {
			$query = "SELECT * FROM `casefile` WHERE `id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
		<div class="form-group"style="width:23%">
		    <label for="caseno">Case Number</label>
		    <input name="caseno" type="text" class="form-control" id="caseno" value="<?php echo $row['caseno']; ?>"  required="" readonly>
	  	</div>
		<div class="form-group" style="width:7%">
		    <label for="yearfile">Year</label>
		    <input name="yearfile" type="text" class="form-control" id="yearfile" value="<?php echo $row['yearfile']; ?>" readonly required="">
	  	</div>
		<div class="form-group"style="width:28%">
		    <label for="hearing">Date of Hearing</label>
		    <input name="hearing" type="date" class="form-control" id="hearing" value="<?php echo $row['hearing']; ?>"  required="">
	  	</div>
		<div class="form-group">
		    <label for="status">Status</label>
		    <select name="status" type="text" class="form-control" id="status"   required="">
			<option style="width:185px;"value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
			<option>New</option>
			<option>Inprocess</option>
			<option>Closed</option>
			</select>
	  	</div>
	  	<div class="form-group">
		    <label for="photo">Student Photo</label>
		    <input name="photo" type="file" class="form-control" id="photo">
	  	</div>
	
		<div class="form-group">
		    <label for="details">More Details</label>
		    <textarea name="details" type="text" class="form-control" id="details" value=""  required="" cols="78"><?php echo $row['details']; ?></textarea>
	  	</div></br>
	  	<div class="form-group text-center">
		    <input name="updatestudent" value="Update Case" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
	 </table>
</div>
