<?php require_once 'db_con.php';
session_start();
if (!isset($_SESSION['user_login'])) {
  header('Location: login.php');
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
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/fontawesome.min.js"></script>
    <script src="../js/script.js"></script>
    <title>Court Case Management System</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php"><i class="fa fa-balance-scale fa-2x"></i> THE JUDICIARY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse justify-content-end" id="navbarSupportedContent">
    <?php $showuser = $_SESSION['user_login']; $haha = mysqli_query($db_con,"SELECT * FROM `staff` WHERE `username`='$showuser';"); $showrow=mysqli_fetch_array($haha); ?>
    <ul class="nav navbar-nav ">
      <li class="nav-item"><a class="nav-link" href="index.php?page=user-profile"><i class="fa fa-user"></i> Welcome <?php echo $showrow['name']; ?>!</a></li>
     
      <li class="nav-item"><a class="nav-link" href="index.php?page=user-profile"><i class="fa fa-user"></i> Your Profile</a></li>
      <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
    </ul>
  </div>
</nav>
<br>
    <div class="container" style="box-shadow:2px 3px 24px navy;border-radius:15px;width:1180px;">
        <div class="row">
          <div class="col-md-3" >
            <div class="list-group" style="box-shadow:2px 1px 8px blue;border-radius:9px;">
              <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active">
               <i class="fas fa-tachometer-alt"></i> Dashboard
              </a>
			                <a href="index.php?page=add-casefile" class="list-group-item list-group-item-action"><i class="fa fa-lock"></i> File New Case</a>
              <a href="index.php?page=all-cases" class="list-group-item list-group-item-action"><i class="fa fa-list"></i> All Cases</a>
              <a href="index.php?page=add-staff" class="list-group-item list-group-item-action"><i class="fa fa-user-plus"></i> Add Add Staff</a>
              <a href="index.php?page=all-staff" class="list-group-item list-group-item-action"><i class="fa fa-users"></i>View All Staff</a>
              <a href="index.php?page=all-users" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All clients</a>
              <a href="index.php?page=registry" class="list-group-item list-group-item-action"><i class="fa fa-file"></i> Registries</a>
              <a href="index.php?page=casetype" class="list-group-item list-group-item-action"><i class="fa fa-folder"></i> Types of Cases</a>


              <a href="index.php?page=user-profile" class="list-group-item list-group-item-action"><i class="fa fa-user"></i> Your Profile</a>
            </div>
          </div>
          <div class="col-md-9">
             <div class="content">
                 <?php 
                   if (isset($_GET['page'])) {
                    $page = $_GET['page'].'.php';
                    }else{
                      $page = 'dashboard.php';
                    }

                    if (file_exists($page)) {
                      require_once $page;
                    }else{
                      require_once '404.php';
                    }
                  ?>
             </div>
        </div>
        </div>  
    </div>
    
    <footer>
      <div class="container">
      <p style="text-align:center;">Copyright &copy; <?php echo date('Y') ?>:Court Case Management System</p>
      </div>
    </footer>
    <script type="text/javascript">
      jQuery('.toast').toast('show');
    </script>

  </body>
</html>