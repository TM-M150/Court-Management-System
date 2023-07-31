<?php require_once 'db_con.php'; 
session_start();
if(isset($_SESSION['user_login'])){
	
	
}
	if (isset($_POST['login'])) {
		$username= $_POST['username'];
		$password= $_POST['password'];


		$input_arr = array();

		if (empty($username)) {
			$input_arr['input_user_error']= "Username Is Required!";
		}

		if (empty($password)) {
			$input_arr['input_pass_error']= "Password Is Required!";
		}

		if(count($input_arr)==0){
			$query = "SELECT * FROM `staff` WHERE `username` = '$username';";
			$result = mysqli_query($db_con, $query);
			$query1 = "SELECT * FROM `users` WHERE `username` = '$username';";
			$result1 = mysqli_query($db_con, $query1);
			if (mysqli_num_rows($result)> 0) {
				$row = mysqli_fetch_assoc($result);
				if ($row['password']==$password) {
					if ($row['status']=='active') {
					if ($row['level']=='admin') {
						$_SESSION['user_login']=$username;
						header('Location: index.php');
					}
					}
					}
					}		
	
			else if (mysqli_num_rows($result1)> 0) {
				$row1 = mysqli_fetch_assoc($result1);
				if ($row1['password']==$password) {
					if ($row1['status']=='active') {
					if ($row1['level']=='user') {
						$_SESSION['user_login']=$username;
						header('Location:index1.php');
					
			}
			}
			}
			}
					
					
					
					else{
						$status_inactive = "Your Status is inactive, please contact with admin or support!";
					}
				}else{
					$worngpass= "This password Wrong!";	
				}
			}
		
	
	


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Court Management System</title>
  </head>
  <body>
    <div class="container"><br><a class="btn btn-primary float-right" href="../index.php"><i class="fa fa-home"></i>HOME </a>
          <h1 class="text-center" style="text-shadow:1px 2px 3px green">Provide Your Login Details To Access The System!</h1><hr><br>
          <div class="d-flex justify-content-center">
          	<?php if(isset($usernameerr)){ ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-danger fade hide" data-delay="2000"><?php echo $usernameerr; ?></div><?php };?>
          		<?php if(isset($worngpass)){ ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-danger fade hide" data-delay="2000"><?php echo $worngpass; ?></div><?php };?>
          		<?php if(isset($status_inactive)){ ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-danger fade hide" data-delay="2000"><?php echo $status_inactive; ?></div><?php };?>
          </div>
          <div class="row animate__animated animate__pulse">
            <div class="col-md-4 offset-md-4">
             	<form method="POST" action="" style="box-shadow:1px 2px 3px 4px navy;padding:12px;">
				  <div class="form-group row">
				    <div class="col-sm-12">
				      <input type="text" class="form-control" name="username" value="<?= isset($username)? $username: ''; ?>" placeholder="Username" id="inputEmail3"> <?php echo isset($input_arr['input_user_error'])? '<label style="color:red;">'.$input_arr['input_user_error'].'</label>':''; ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-12">
				      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password"><label style="color:red;"><?php echo isset($input_arr['input_pass_error'])? '<label>'.$input_arr['input_pass_error'].'</label>':''; ?>
				    </div>
				  </div>
				  <div class="text-center">
				      <button type="submit" name="login" class="btn btn-success">Sign in</button>
				    </div></br>
				    
				  </div>
				</form>
            </div>
          </div>
    </div>
 <footer style="margin-top:170px;position:fixed;width:100%;">
    <?php 
require_once 'footer.php'; 
                  ?>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript">
    	$('.toast').toast('show')

    </script>
  </body>
</html>