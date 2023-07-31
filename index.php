<?php require_once 'admin/db_con.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Court Management System</title>
  </head>
  <body >
    <div  style="background: #007BFF;color:#fff;padding: 20px 0px 5px 5px;	width:100%;">
	
	<div  style="float:right;">
      <a class="btn btn-primary  "  href="admin/login.php">Login</a> 
         		  <a class="btn btn-primary " href="admin/register.php">Register</a>
				   
</div>
        <h1 class="text-center"> Court Management System</h1>
   </div>  
   <style>
   img {
  
}
   </style>
 <div  style='background-image: url("back.png");  background-repeat: no-repeat;background-size:100% auto;height:auto;opacity: 0.5;padding-top:62px;padding-bottom:170px;'>   

          <div class="row">
            <div class="col-md-4 offset-md-4" ">
              <form method="POST">
            <table class="text-center infotable" style="background:white;color:navy;font-size:23px;box-shadow:1px 2px 13px white; border-radius:12px;" >
              <tr>
                <th colspan="2">
                  <p class="text-center">Check Case Status.</p>
                </th>
              </tr>
              
              <tr>
                <td>
                  <p><label for="roll">Case File Number</label></p>
                </td>
                <td>
                  <input class="form-control" type="text"  id="roll" placeholder="Enter Case file Number" name="roll" autocomplete="off">
                </td>
              </tr>
              <tr>
                <td colspan="2" class="text-center">
                  <input class="btn btn-danger" type="submit" name="showinfo">
                </td>
              </tr>
            </table>
          </form>
            </div>
          </div>
        <br>
        <?php if (isset($_POST['showinfo'])) {
        
          $roll = $_POST['roll'];
          if (!empty($roll)) {
            $query = mysqli_query($db_con,"SELECT * FROM `casefile` WHERE `caseno`='$roll'");
            if (!empty($row=mysqli_fetch_array($query))) {
              if ($row['caseno']==$roll) {
                $stroll= $row['caseno'];
                $stname= $row['name'];
                $stclass= $row['status'];
                $city= $row['hearing'];
                $photo= $row['file1'];
                $pcontact= $row['hearing'];
              ?>
        <div class="row">
          <div class="col-sm-6 offset-sm-3">
            <table class="table table-bordered" style="background:white;color:navy;font-size:23px;">
              <tr>
                
                <td>Fullname/Institution</td>
                <td><?= isset($stname)?$stname:'';?></td>
              </tr>
              <tr>
                <td>Case Number</td>
                <td><?= isset($stroll)?$stroll:'';?></td>
              </tr>
              <tr>
                <td>Status</td>
                <td><?= isset($stclass)?$stclass:'';?></td>
              </tr>
              <tr>
                <td>Date of Hearing</td>
                <td><?= isset($city)?$city:'';?></td>
              </tr>
              <tr>
                <td>Other Details</td>
                <td style="text-align:top-left;padding:7px;width:auto;"colspan="5" ><p>
					<?php
					include("connection.php");
					$roll = $_POST['roll'];
$res=mysqli_query($con,"SELECT caseno FROM casefile  where id=$roll");
while($row=mysqli_fetch_array($res))
	
{
	$roll = $_POST['roll'];
	 ?>
	 <?php	}?>
	 <?php
$res=mysqli_query($con,"SELECT * FROM caseprogress  where caseno=$roll");
while($row=mysqli_fetch_array($res))
	
{		
 ?>
<p><?php echo $row['details']; ?></p>
					<hr >
					<?php	}?>
					</td>
              </tr>
            </table>
          </div>
        </div>  
      <?php 
          }else{
                echo '<p style="color:red;background:white;padding:12px;width:20%;font-weight:bold;">Please Input Valid Case Number</p>';
              }
            }else{
              echo '<p style="color:red;background:white;padding:12px;width:20%;font-weight:bold;">Your Input Doesn\'t Match!</p>';
            }
            }else{?>
              <script type="text/javascript">alert("Data Not Found!");</script>
            <?php }
          }; ?>
    </div>
 <footer style="margin-bottom:-230px;margin-top:-2px; text-align:center;padding:15px;">
      <div class="containere">
       Copyright &copy; <?php echo date('Y') ?>:Court Case Management System 
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>