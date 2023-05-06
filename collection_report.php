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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	
	function check_form()
	{
		
		

	
	}
	
	</script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

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
                            <li><a href="#">Transaction</a></li>
                            <li class="active">Paid Transaction</li>
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
                            <strong class="card-title">Paid Transaction Detail</strong>
                        </div>
						
						<div class="card-header">
                            <strong class="card-title"><form action="" method=post onsubmit="return check_form()">
							From Date :<input type=date id=f_d1 name=f_d value="<?php if(isset($_POST['s_r']) || isset($_POST['export_data'])){echo $_POST['f_d'];}?>"> &nbsp;&nbsp;&nbsp; 
							Till Date :<input type=date id=t_d1 name=t_d value="<?php if(isset($_POST['s_r']) || isset($_POST['export_data'])){echo $_POST['t_d'];}?>">
<input type=submit name=s_r value=Search style="background-color:blue;color:white" >							
							
								
							</form>
							
							
							
							</strong>
							
							
                        </div>
						
						<div class="card-header">
                            <strong class="card-title">
							                         <form action="export_collection.php" method=post>
							<input type=hidden name=f1_d value="<?php if(isset($_POST['s_r']) || isset($_POST['export_data'])){echo $_POST['f_d'];}?>"> &nbsp;&nbsp;&nbsp;
			<input type=hidden name=t1_d value="<?php if(isset($_POST['s_r']) || isset($_POST['export_data'])){echo $_POST['t_d'];}?>">
						
							
								<button  name=export_data style="width:150px;margin-left:50px;margin-top:10px;background-color:blue;color:white">Export To Excel</button>
							</form>
							
							
								</strong>
							
							
                        </div>
						<?php if(isset($_POST['s_r']))
							
							{
								
								$from_date=$_POST['f_d'];
$till_date=$_POST['t_d'];
							
if($from_date=="" || $till_date=="")
{
	
	echo "<script>alert('Date field for searching criterea can not be empty');window.location.href='collection_report.php'; </script>";
	
	
}
							
								?>
						<div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
					
                      <tr>
                        <th>Reg Id</th>
                        <th>Name</th>
                        <th>Subscription</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Amount Status</th>
                        <th>Advance payment</th>
                        <th> Pending Amount</th>
                        <th> Facility</th>
                        <th> Trainer</th>
                        <th> Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php  $r=mysqli_query($con,"select * from member where starting_date between '".$from_date."' and '".$till_date."' order by id desc");
					// echo "select * from member where starting_date between '".$from_date."' and '".$till_date."' order by id desc";
					while($s=mysqli_fetch_array($r))
					{
						
					 	
						?>
					
                      <tr>
					     <td><?php echo $s['id'] ; ?></td>
                        <td><?php echo $s['name'] ; ?></td>
                        <td><?php echo $s['subscription'] ; ?></td>
                        <td><?php echo $s['starting_date'] ; ?></td>
                        <td><?php echo $s['ending_date'] ; ?></td>
                        <td><?php echo $s['amount_status'] ; ?></td>
                        <td><?php echo $s['advance_payment'] ; ?></td>
                        <td><?php echo $s['pending_payment'] ; ?></td>
                        <td><?php echo $s['facility'] ; ?></td>
                        <td><?php echo $s['trainer'] ; ?></td>
                        <td><a href="print_member.php?email=<?php echo $s['email']; ?>" target="_blank"><font color=ORANGE>Print</font></a>&nbsp;<a href="edit_member.php?member_id=<?php echo $s['id'];?>"><font color=blue>View/Edit</font></a></td>
                      </tr>
					  
					<?php } ?>
                    </tbody>
                  </table>
                        </div> <?php } 
						
						
						?>
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
