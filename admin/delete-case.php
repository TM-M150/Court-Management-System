
<?php 

if (isset($_SESSION['user_login'])) {
	$id = base64_decode($_GET['id']);
	$photo = base64_decode($_GET['file1']);
	if(mysqli_query($db_con,"DELETE FROM `casefile` WHERE `id` = '$id'")){
		unlink('images/'.$photo);
		header('Location: index.php?page=all-cases&delete=success');
	}else{
		header('Location: index.php?page=all-cases&delete=error');
	}
}else{
	header('Location: login.php');
 }
