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
		$file = $_POST['name'];
		$photo = $_FILES["file"]["name"];
		$photo_name= $name.$caseno.$casetype.'.'.$photo;
move_uploaded_file($_FILES["file"]["tmp_name"],"images/".$photo_name);
$query =( "INSERT INTO `casefile` (`name`, `postal`,`national_id`,`phone`,`county`, `town`, `registry`, `casetype`, `caseno`,`yearfile`, `file1`, `status` , `hearing`, `details`) VALUES ('$name', '$postal', '$national_id', '$phone', '$county', '$town', '$registry','$casetype','$yearfile','$photo_name','$status','$hearing','$details',);");
    $result = mysqli_query($db_con,$query);

	if ($result) {
    $msg="Service has been Updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}

 if(isset($_POST['submit']))
  {
require "../gump.class.php";
$gump = new GUMP();
$_POST = $gump->sanitize($_POST); 

$gump->validation_rules(array(
    'name'    => 'required|max_len,6000|min_len,3',
    'national_id'    => 'required|max_len,6000|min_len,3',
    'town'    => 'required|max_len,6000|min_len,3',
    'registry'    => 'required|max_len,6000|min_len,3',
    'casetype'    => 'required|max_len,6000|min_len,3',
    'caseno'    => 'required|max_len,6000|min_len,3',
    'yearfile'    => 'required|max_len,6000|min_len,3',
    'hearing'    => 'required|max_len,6000|min_len,3',
    'status'    => 'required|max_len,6000|min_len,3',
    'postal'   => 'required|max_len,15000|min_len,3',
    'phone'   => 'required|max_len,150000|min_len,3',
    'county'   => 'required|max_len,100000|min_len,8',
    'details'   => 'required|max_len,100000000000000000000000000|min_len,5',
    'file'   => 'required|max_len,100000000000000000000000000000000000|min_len,5',
    
));
$gump->filter_rules(array(
    'name' => 'trim|sanitize_string',
    'national_id' => 'trim|sanitize_string',
    'town' => 'trim|sanitize_string',
    'registry' => 'trim|sanitize_string',
    'casetype' => 'trim|sanitize_string',
    'caseno' => 'trim|sanitize_string',
    'yearfile' => 'trim|sanitize_string',
    'hearing' => 'trim|sanitize_string',
    'status' => 'trim|sanitize_string',
    'postal' => 'trim|sanitize_string',
    'phone' => 'trim|sanitize_string',
    'county' => 'trim|sanitize_string',
    'details' => 'trim|sanitize_string',
    'file' => 'trim|sanitize_string',
    
    ));
$validated_data = $gump->run($_POST);

if($validated_data === false) {
    ?>
    <center><font color="red" > <?php echo $gump->get_readable_errors(true); ?> </font></center>
    <?php 
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
		$file = $_POST['file'];
      
}
else {
	$name= $validated_data['name'];
	$postal= $validated_data['postal'];
	$phone= $validated_data['phone'];
	$county= $validated_data['county'];
	$national_id= $validated_data['national_id'];
	$caseno= $validated_data['caseno'];
	$town= $validated_data['town'];
	$registry= $validated_data['registry'];
    $casetype= $validated_data['casetype'];
      $yearfile = $validated_data['yearfile'];
      $hearing = $validated_data['hearing'];
      $status = $validated_data['status'];
      $details = $validated_data['details'];
      $file = $validated_data['file'];
  if (isset($_SESSION['id'])) {
        $file_uploader = $_SESSION['user'];
        
    }

    $file = $_FILES['file']['name'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $validExt = array ('pdf','mp4','doc','png','png','docx','jpg','mkv','zip','PNG','jpeg');
    if (empty($file)) {
echo "<script>alert('Attach a file');</script>";
    }
   // else if ($_FILES['file']['size'] =0 || $_FILES['file']['size'] <5180718054 )
  
    else if (!in_array($ext, $validExt)){
        echo "<script>alert('Not a valid file');</script>";

    }
    else {
        $folder  = 'images/';
        $fileext = strtolower(pathinfo($file, PATHINFO_EXTENSION) );
        $notefile = $registry.$casetype.$caseno.'.'.$fileext;
  $query ="INSERT INTO `casefile` (`name`,`national_id`,`phone`,`postal`,`county`,registry,casetype,caseno,yearfile,hearing,status,details,file1,town) value('$name','$national_id','$phone','$postal','$county','$registry','$casetype','$caseno','$yearfile','$hearing','$status','$details','$notefile','$town')";
		$result = mysqli_query($db_con,$query);
            if ($result) {
									$datainsert['insertsucess'] = '<p style="color: green;">Staff Inserted Success!</p>';
									move_uploaded_file($_FILES['file']['tmp_name'], $folder.$notefile);
									header('Location: index.php?page=add-casefile');
								}else{
									$datainsert['inserterror']= '<p style="color: red;">Staff Not Inserted, please input right informations!</p>';
									header('Location: add-casefile.php?insert=error');
								}
								}
								}
								}


  ?>
 
  
  
  
<h1 class="text-primary"><i class="fas fa-briefcase"></i>  File Case <small class="text-warning"> (File New Case!)</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">File Case</li>
  </ol>
</nav>

	

	
<div class="col-sm-12">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto">Alert Box</strong>
	    <small><?php echo date('d-M-Y'); ?></small>
	    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
	    </button>
	  </div>
	  <div class="toast-body">
	    <?php 
	    	if (isset($datainsert['insertsucess'])) {
	    		echo $datainsert['insertsucess'];
	    	}
	    	if (isset($datainsert['inserterror'])) {
	    		echo $datainsert['inserterror'];
	    	}
	    ?>
	  </div>
	</div>
		<?php } ?>
     </div>  
         <div class="row animate__animated animate__pulse"> 
       <table style>
	   
             	<form method="POST" enctype="multipart/form-data" style="box-shadow:1px 2px 3px 4px navy;padding:22px;width:100%;">
				
				 <tr>
				  <div class="form-group">
				  <label for="name">Full Name | Business Name</label>
				  <?php $showuser = $_SESSION['user_login']; $haha = mysqli_query($db_con,"SELECT * FROM `staff` WHERE `username`='$showuser';"); $showrow=mysqli_fetch_array($haha); ?>
				      <input type="text" class="form-control" value="<?php echo $showrow['name']; ?>" name="name" placeholder="Enter FullName" id="inputEmail3" >
				    </div>
				</tr>&nbsp;
&nbsp;


					
					 <tr>
					<div class="form-group">
				   <label for="NationalId">National ID | Business Number</label>
				      <input type="number" class="form-control"  value="<?php echo $showrow['national_id']; ?>" name="national_id" placeholder="Enter National ID" id="inputEmail3" >
				      
				    </div>
					</tr>
					<tr>&nbsp;
&nbsp;

				  					<div class="form-group">
				   <label for="Phone Number">Phone Number</label>
				      <input type="text" class="form-control"pattern="[0-9]{10}" value="<?php echo $showrow['phone']; ?>" name="phone" placeholder="Enter Phone Number" id="inputEmail3" readonly>
				    </div>
				</tr>&nbsp;
&nbsp;


 <tr>
				   <div class="form-group">
				   <label for="postal">Postal Address</label>
				      <input type="text" class="form-control" value="<?= isset($postal)? $postal:'' ?>" name="postal" placeholder="Enter Postal Address" id="inputEmail3">
				    </div>
					 </tr>&nbsp;
&nbsp;

		
						
				
				<tr>
				  	<div class="form-group">
					<label for="county">County</label>
				      <input type="text" name="county" value="<?= isset($county)? $county:'' ?>" class="form-control" id="inputPassword3" placeholder="Enter County Name">
				    </div>
					</tr>&nbsp;
&nbsp;



					<tr>
				   <div class="form-group">
				   <label for="town">Home Town</label>
				      <input type="town" name="town" class="form-control" id="inputPassword3" placeholder="Enter Home Town">
				    </div>
					</tr>&nbsp;
&nbsp;


					<tr>
				    <div class="form-group">
					<label for="registry">Registry</label>

				      <select type="text" name="registry" class="form-control" id="inputPassword3" placeholder="Enter Registry">
				      	<option>Select Category</option>
				      	<?php
$res=mysqli_query($db_con,"SELECT * FROM regcategory");
while($row=mysqli_fetch_array($res))
{
    
    ?>

<option value="<?php echo $row['reg_name']; ?>"><?php echo $row['reg_name']; ?></option>
<?php 
}
?> 	
</select>
				    
				    </div>
				 </tr>&nbsp;
&nbsp;

				 <tr>
				    <div class="form-group">
					<label for="casetype">Case Type</label>
				      <select type="text" name="casetype" class="form-control" id="inputPassword3" placeholder="Enter Case Type">

				      	<option>Select Category</option>
				      	<?php
$res=mysqli_query($db_con,"SELECT * FROM casetype");
while($row=mysqli_fetch_array($res))
{
    
    ?>

<option value="<?php echo $row['reg_name']; ?>"><?php echo $row['reg_name']; ?></option>
<?php 
}
?> 	
</select>

				    </div>
				 </tr>&nbsp;
&nbsp;

<tr>
				    <div class="form-group">
					<label for="caseno">Case Number</label>
				      <input type="text" name="caseno" class="form-control" id="inputPassword3" placeholder="Enter Case Number" value="<?php $rn = rand(1000000, 9999999); echo $rn;?>" readonly>
				    </div>
				 </tr>&nbsp;
&nbsp;

<tr>
				    <div class="form-group" style="width:7%;">
					<label for="yearfile">Year</label>
				      <input type="text" name="yearfile" class="form-control" id="inputPassword3" placeholder="Enter year" value="<?php  echo date('Y');?>" readonly>
				    </div>
				 </tr>&nbsp;
&nbsp;

<tr>
				    <div class="form-group">
					<label for="hearing">Hearing Date(If Any)</label>
				      <input type="date" name="hearing" class="form-control" id="inputPassword3" placeholder="Enter Date of next Hearing" value="" >
				    </div>
				 </tr>
				 &nbsp;
&nbsp;

<tr>
				    <div class="form-group">
					<label for="status">Status of the Case</label>
				      <input type="text" name="status" class="form-control" id="inputPassword3" placeholder="Enter status"  ><?= isset($input_error['notmatch'])? '<label class="error">'.$input_error['notmatch'].'</label>':'';  ?> <?= isset($passlan)? '<label class="error">'.$passlan.'</label>':'';  ?>
				    </div>
				 </tr>&nbsp;
&nbsp;



<tr>
				    <div class="form-group">
					<label for="details">Other Details:</label>
				      <textarea type="text" name="details" class="form-control" id="inputPassword3" placeholder="Enter More Details" cols="78"></textarea> <?= isset($input_error['notmatch'])? '<label class="error">'.$input_error['notmatch'].'</label>':'';  ?> <?= isset($passlan)? '<label class="error">'.$passlan.'</label>':'';  ?>
				    </div>
				 </tr>


				 <tr>
				 
				  	<div class="form-group">
					<label for="file">Attach Document if Any</label>
				  	
				      <input type="file" id="file" name="file" class="form-control" id="inputPassword3" >
				     	 			    
				  </div> 
				  </tr>
				  
				  <tr>
					<div class="form-group text-center">
					</br>
					</br>
					</br>
					</br>
				      <button type="submit" name="register"  class="btn btn-primary text-center">Submit Case!</button>
				    </div>
				</tr>
				</form>
				 </table>
            </div>
</div>