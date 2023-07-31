<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index1.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index1.php?page='.$corepage[0]);
     }
    }
?>

<h1><a href="index.php"><i class="fas fa-tachometer-alt"></i>  Dashboard</a> <small>Satistics Overview</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Dashboard</li>
  </ol>
</nav>


<div class="row student">
  <div class="col-sm-4">
     <div class="card text-white bg-primary mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-briefcase fa-3x"></i>
          </div>
          <div class="col-sm-8">
		  <?php $showuser = $_SESSION['user_login']; $haha = mysqli_query($db_con,"SELECT * FROM `users` WHERE `username`='$showuser';"); $showrow=mysqli_fetch_array($haha); ?>
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php $id=$showrow['national_id']; $case=mysqli_query($db_con,"SELECT * FROM `casefile` WHERE status='New'&& national_id=$id"); $case= mysqli_num_rows($case); echo $case; ?></span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">New Cases</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
        <div class="row">
          <div class="col-sm-8">
            <p class="">All Cases</p>
          </div>
          <div class="col-sm-4">
            <a href="new-cases.php"><i class="fa fa-arrow-right float-sm-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="col-sm-4">
     <div class="card text-white bg-info mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-list-alt fa-3x"></i>
          </div>
          <div class="col-sm-8">
		  <?php $showuser = $_SESSION['user_login']; $haha = mysqli_query($db_con,"SELECT * FROM `users` WHERE `username`='$showuser';"); $showrow=mysqli_fetch_array($haha); ?>
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php $id=$showrow['national_id']; $case1=mysqli_query($db_con,"SELECT * FROM `casefile` WHERE status='Inprocess' && national_id=$id"); $case1= mysqli_num_rows($case1); echo $case1; ?></span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">Processed Cases</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
         <a href="index.php?page=inprocess-cases">
        <div class="row">
          <div class="col-sm-8">
            <p class="">All Cases</p>
          </div>
          <div class="col-sm-4">
           <i class="fa fa-arrow-right float-sm-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div> 
<?php $showuser = $_SESSION['user_login']; $haha = mysqli_query($db_con,"SELECT * FROM `users` WHERE `username`='$showuser';"); $showrow=mysqli_fetch_array($haha); ?>
  <div class="col-sm-4">
     <div class="card text-white bg-warning mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-4">
            <i class="fa fa-list fa-3x"></i>
          </div>
          <div class="col-sm-8">
            <div class="float-sm-right">&nbsp;<span style="font-size: 30px"><?php $id=$showrow['national_id'];$case1=mysqli_query($db_con,"SELECT * FROM `casefile` WHERE status='Closed' && national_id=$id"); $case1= mysqli_num_rows($case1); echo $case1; ?></span></div>
            <div class="clearfix"></div>
            <div class="float-sm-right">Closed Cases</div>
          </div>
        </div>
      </div>
      <div class="list-group-item-primary list-group-item list-group-item-action">
         <a href="index.php?page=inprocess-cases">
        <div class="row">
          <div class="col-sm-8">
            <p class="">All Cases</p>
          </div>
          <div class="col-sm-4">
           <i class="fa fa-arrow-right float-sm-right"></i>
          </div>
        </div>
        </a>
      </div>
    </div>
  </div>
  </div>
  </div>

<hr> 

<script>
script type="text/javascript">
  function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to Activate this User?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>