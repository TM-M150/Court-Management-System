
<?php 
session_start();
if (isset($_SESSION['user_login'])) {
	$id = base64_decode($_GET['id']);

		$query = "UPDATE `users` SET `status`='active' WHERE `id`= $id";
			if (mysqli_query($db_con,$query)) {
		
		header('Location: index.php?page=dashboard&activate=success');
	}else{
		header('Location: index.php?page=dashboard&activate=error');
	}
}else{
	header('Location: login.php');
 }
