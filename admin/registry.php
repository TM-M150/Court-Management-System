<?php require_once 'db_con.php'; 
	
	if (isset($_POST['register'])) {

    $refno=$_POST['refno'];
    $reg_name=$_POST['reg_name'];
    
   

     
    $query=mysqli_query($db_con, "insert into regcategory(refno,reg_name)value('$refno','$reg_name')");
    if ($query) {
		
		 
		echo "<script>alert('Registry has been added.');</script>";
    	
    		echo "<script>window.location.href = 'index.php?page=registry'</script>";   
    
  }
  else
    {
  echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	
    }

  
}
  ?>


<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Add Registry </h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Registry</li>
  </ol>
</nav>

	
<div class="col-sm-12">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto"> Insert Alert</strong>
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
		 					<?php $showuser = $_SESSION['user_login']; $haha = mysqli_query($db_con,"SELECT * FROM `staff` WHERE `username`='$showuser';"); $showrow=mysqli_fetch_array($haha); ?>
					<?php $showuser = $_SESSION['user_login']; $haha = mysqli_query($db_con,"SELECT * FROM `users` WHERE `username`='$showuser';"); $showrow=mysqli_fetch_array($haha); ?>
					
		 <?php if($showrow['level']=="user"){
			 } else {?>
       <table style>
	   
             	<form method="POST" enctype="multipart/form-data" style="box-shadow:1px 2px 3px 4px navy;padding:22px;width:100%;">
				
				 <tr>
				  <div class="form-group">
				  <label for="name">Reference No.</label>
				      <input type="text" class="form-control"  value="<?php $rn = rand(1000000, 9999999); echo $rn;?>" name="refno" placeholder="refno" id="inputEmail3" readonly><?= isset($input_error['refno'])? '<label for="inputEmail3" class="error">'.$input_error['refno'].'</label>':'';  ?>
				    </div></tr>
					 <tr>
				   <div class="form-group">
				   <label for="reg_name">Registry Name</label>
				      <input type="text" class="form-control" value="<?= isset($reg_name)? $reg_name:'' ?>" name="reg_name" placeholder="reg_name" id="inputEmail3"><?= isset($input_error['reg_name'])? '<label class="error">'.$input_error['reg_name'].'</label>':'';  ?>
				     
				    </div>
					 </tr>
					 				
					
				
				&nbsp;&nbsp;
				
				  <tr>
					<div class="form-group">
					</br>
					 
					
				      <button type="submit" name="register"  class="btn btn-primary text-center">Add Registry!</button>
				    </div>
				</tr>
				</form>
				 </table>
				 <?php } ?>
            </div>
</div>

</br>
</br>

<div class="tab">
<?php

$res=mysqli_query($db_con,"SELECT * FROM regcategory");
while($row=mysqli_fetch_array($res))
{
    
    ?>
  <button class="tablinks" onclick="openCity(event, '<?php echo $row['reg_name']; ?>')"><?php echo $row['reg_name']; ?></button>

 <?php }?> 
</div>

<!-- Tab content -->
<div id="<?php echo $row['reg_name']; ?>" class="tabcontent">
  <h3>London</h3>
  <p>London is the capital city of England.</p>
</div>

<div id="Paris" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p>
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>
<style>
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: navy;
  color:white;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
<script>
function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
} 
</script>