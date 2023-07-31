<?php require_once 'db_con.php'; 
	
	if (isset($_POST['register'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$level = $_POST['level'];
		$national_id= $_POST['national_id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$c_password = $_POST['c_password'];

		$photo = explode('.', $_FILES['photo']['name']);
		$photo= end($photo);
		$photo_name= $username.'.'.$photo;

		$input_error = array();
		if (empty($name)) {
			$input_error['name'] = "The Name Filed is Required";
		}
		if (empty($email)) {
			$input_error['email'] = "The Email Filed is Required";
		}
		if (empty($username)) {
			$input_error['username'] = "The UserName Filed is Required";
		}
		if (empty($password)) {
			$input_error['password'] = "The Password Filed is Required";
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
		if (empty($level)) {
			$input_error['level'] = "The Staff level Filed is Required";
		}

		if (!empty($password)) {
			if ($c_password!==$password) {
				$input_error['notmatch']="You Typed Wrong Password!";
			}
		}


		if (count($input_error)==0) {
			$check_email= mysqli_query($db_con,"SELECT * FROM `staff` WHERE `national_id`='$national_id';");

			if (mysqli_num_rows($check_email)==0) {
				$check_username= mysqli_query($db_con,"SELECT * FROM `staff` WHERE `username`='$username';");
				if (mysqli_num_rows($check_username)==0) {
					if (strlen($username)>4) {
						if (strlen($password)>4) {
								$password = $password;
							$query = "INSERT INTO `staff`(`name`, `email`,`national_id`,`phone`,`level`, `username`, `password`, `photo`, `status`) VALUES ('$name', '$email', '$national_id', '$phone', '$level', '$username', '$password','$photo_name','inactive');";
									$result = mysqli_query($db_con,$query);
								if ($result) {
									$datainsert['insertsucess'] = '<p style="color: green;">Staff Inserted Success!</p>';
									move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
									header('Location: index.php?page=add-staff');
								}else{
									$datainsert['inserterror']= '<p style="color: red;">Staff Not Inserted, please input right informations!</p>';
									header('Location: add-staff.php?insert=error');
								}
						}else{
							$passlan="This password more than 4 charset";
						}
					}else{
						$usernamelan= 'This username more than 4 charset';
					}
				}else{
					$username_error="This username already exists!";
				}
			}else{
				$email_error= "This email already exists";
			}
			}else{
				$national_id_error= "This National ID already exists";
			}
		}
		
	

?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Add Staff <small class="text-warning"> (New Staff!)</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add New Staff</li>
  </ol>
</nav>

	

	
<div class="col-sm-12">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto">Student Insert Alert</strong>
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
				  <label for="name">Staff FullName</label>
				      <input type="text" class="form-control" value="<?= isset($name)? $name:'' ?>" name="name" placeholder="Name" id="inputEmail3"><?= isset($input_error['name'])? '<label for="inputEmail3" class="error">'.$input_error['name'].'</label>':'';  ?>
				    </div></tr>
					 <tr>
				   <div class="form-group">
				   <label for="email">Email</label>
				      <input type="email" class="form-control" value="<?= isset($email)? $email:'' ?>" name="email" placeholder="Email" id="inputEmail3"><?= isset($input_error['email'])? '<label class="error">'.$input_error['email'].'</label>':'';  ?>
				      <?= isset($email_error)? '<label class="error">'.$email_error.'</label>':'';  ?>
				    </div>
					 </tr>
					 <tr>
					<div class="form-group">
				   <label for="NationalId">National ID</label>
				      <input type="number" class="form-control"  value="<?= isset($national_id)? $national_id:'' ?>" name="national_id" placeholder="national_id" id="inputEmail3"><?= isset($input_error['national_id'])? '<label class="error">'.$input_error['national_id'].'</label>':'';  ?>
				      
				    </div>
					</tr>
					<tr>
				  					<div class="form-group">
				   <label for="Phone Number">Phone Number</label>
				      <input type="text" class="form-control"pattern="[0-9]{10}" value="<?= isset($phone)? $phone:'' ?>" name="phone" placeholder="Phone Number" id="inputEmail3"><?= isset($input_error['phone'])? '<label class="error">'.$input_error['phone'].'</label>':'';  ?>
				      <?= isset($phone_error)? '<label class="error">'.$phone_error.'</label>':'';  ?>
				    </div>
				</tr>
				<tr>
				  <div class="form-group">
				  <label for="level">Staff Level</label>
				  <select type="text" class="form-control" value="<?= isset($level)? $level:'' ?>" name="level" placeholder="Level" id="inputEmail3"  ><?= isset($input_error['level'])? '<label class="error">'.$input_error['level'].'</label>':'';  ?>
					  <option >Select Staff Level </option>
					  <option>Select Staff Level </option>
					  <option>Select Staff Level </option>
					  <option>Select Staff Level </option>
					  <option>Select Staff Level </option>
					  <option>Select Staff Level </option>
					  <option>Select Staff Level </option>
					  <option>Select Staff Level </option>
					  <option>Select Staff Level </option>
					  </select>
				    </div>
					</tr>
												
				
				<tr>
				  	<div class="form-group">
					<label for="username">Staff username</label>
				      <input type="text" name="username" value="<?= isset($username)? $username:'' ?>" class="form-control" id="inputPassword3" placeholder="Username"><?= isset($input_error['username'])? '<label class="error">'.$input_error['username'].'</label>':'';  ?><?= isset($username_error)? '<label class="error">'.$username_error.'</label>':'';  ?><?= isset($usernamelan)? '<label class="error">'.$usernamelan.'</label>':'';  ?>
				    </div>
					</tr>
					<tr>
				   <div class="form-group">
				   <label for="password">Staff Password</label>
				      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password"><?= isset($input_error['password'])? '<label class="error">'.$input_error['password'].'</label>':'';  ?> <?= isset($passlan)? '<label class="error">'.$passlan.'</label>':'';  ?>  
				    </div>
					</tr>
					<tr>
				    <div class="form-group">
					<label for="cpassword">Confirm Password</label>
				      <input type="password" name="c_password" class="form-control" id="inputPassword3" placeholder="Confirm Password"><?= isset($input_error['notmatch'])? '<label class="error">'.$input_error['notmatch'].'</label>':'';  ?> <?= isset($passlan)? '<label class="error">'.$passlan.'</label>':'';  ?>
				    </div>
				 </tr>
				 <tr>
				 
				  	<div class="form-group">
					<label for="photo">Choose your photo</label>
				  	
				      <input type="file" id="photo" name="photo" class="form-control" id="inputPassword3" >
				     	<?= isset($input_error['photo'])? '<label for="inputEmail3" class="error">'.$input_error['photo'].'</label>':'';  ?>			    
				  </div> 
				  </tr>
				  
				  <tr>
					<div class="form-group text-center">
					</br>
					</br>
					</br>
					</br>
				      <button type="submit" name="register"  class="btn btn-primary text-center">Add Staff!</button>
				    </div>
				</tr>
				</form>
				 </table>
            </div>
</div>