<?php ob_start();
session_start();

if(!isset($_SESSION['email']))
{
	header('location:login.php');
}
include('connection.php'); 


?><!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GYM Software</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
<script>

function delete_call()
{
	
	if(confirm("Are You Sure to delete ?"))
	{
		
		
		
	}else{
		
		return false;
		
	}
	
}
</script>
</head>
<body>
        <!-- Left Panel -->

   <?php include('sidebar.php');?><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include('header.php'); ?><!-- /header -->
        <!-- Header-->
		
		
<?php
$message="";
 if(isset($_GET['delete_id']))
{
	$trainer_id=$_GET['delete_id'];
$a=mysqli_query($con,"delete from trainer where id='".$trainer_id."'");
if($a)
{
$message="<font color=green>Record Deleted Successfully</font>";
	
}
else{
	$message="<font color=red>Something Went Wrong !!</font>";
}

	
	
}?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Subscripiton</a></li>
                            <li class="active">Expiring Today </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Member Subscrption Expiring Today<?php echo $message; ?></strong>
                        </div>
                        <div class="card-body">
                   <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
					
                      <tr>
                        <th>Reg Id</th>
                        <th>Name</th>
                        <th>Subscription</th>
                     
                        <th>End Date</th>
                        <th>Amount Status</th>
                        <th>Advance payment</th>
                        <th> Pending Amount</th>
                        <th> Facility</th>
                        <th> Trainer</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
date_default_timezone_set('Asia/Kolkata');
	$today_date=date('Y-m-d',strtotime('-10 days'));
  $yesterday_date=date('Y-m-d',strtotime('+7 days'));				
  
	 $r=mysqli_query($con,"select * from member where ending_date between'".$today_date."' and '".$yesterday_date."' order by id desc");
					while($s=mysqli_fetch_array($r))
					{
						
					 	
						?>
					
                      <tr>
					     <td><?php echo $s['id'] ; ?></td>
                        <td><?php echo $s['name'] ; ?></td>
                        <td><?php echo $s['subscription'] ; ?></td>
                      
                        <td><?php echo $s['ending_date'] ; ?></td>
                        <td><?php echo $s['amount_status'] ; ?></td>
                        <td><?php echo $s['advance_payment'] ; ?></td>
                        <td><?php echo $s['pending_payment'] ; ?></td>
                        <td><?php echo $s['facility'] ; ?></td>
                        <td><?php echo $s['personal_trainer'] ; ?></td>
                       <td><a href="edit_member.php?member_id=<?php echo $s['id']; ?>"><font color=gren>Renew</font></a>
                      </tr>
					  
					<?php } ?>
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>


</body>
</html>
