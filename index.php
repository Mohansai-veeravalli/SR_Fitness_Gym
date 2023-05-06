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
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


        <!-- Left Panel -->
<?php include('sidebar.php'); ?>
    <!-- /#left-panel -->

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
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Success</span> Welconme To S.R. FITNESS DASHBOARD
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>


           <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                           
                        </div>
                        <h4 class="mb-0">
						
						<span class="count"><?php $r=mysqli_query($con,"select * from member");
						$c=0;
						while($s=mysqli_fetch_array($r))
                            
							{
								$c++;
								
							}
							?><?php echo $c; ?></span>
                        </h4>
                        <p class="text-light">Total Member</p>

                        <div class="" style="height:70px;" height="70">
                         
                        </div>

                    </div>

                </div>
            </div>
            <!--/.col-->

              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                           
                        </div>
                        <h4 class="mb-0">
                            <span class="count"><?php $r1=mysqli_query($con,"select * from member where amount_status='paid'");
						$c1=0;
						while($s=mysqli_fetch_array($r1))
                            
							{
								$c1++;
								
							}
							?><?php echo $c1; ?></span>
                        </h4>
                        <p class="text-light">Paid Member</p>

                        <div class="" style="height:70px;" height="70">
                           
                        </div>

                    </div>

                </div>
            </div>
            <!--/.col-->

             <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                           
                        </div>
                        <h4 class="mb-0">
                            <span class="count"><?php $r2=mysqli_query($con,"select * from member where amount_status='balance'");
						$c2=0;
						while($s=mysqli_fetch_array($r2))
                            
							{
								$c2++;
								
							}
							?><?php echo $c2; ?></span>
                        </h4>
                        <p class="text-light">Balanced Member</p>

                        <div class="" style="height:70px;" height="70">
                          
                        </div>

                    </div>

                </div>
            </div>
            <!--/.col-->
               <?php 
date_default_timezone_set('Asia/Kolkata');
  $current_month=date('Y-m');	
  
$total_amount=0;  
	 $r3=mysqli_query($con,"select * from member order by id DESC");
	
					while($s=mysqli_fetch_array($r3))
					{
						$bdy=explode('-',$s['starting_date']);  //curretn month
					    $bdy_m[0]=$bdy[0];
					    // $bdy_m[1]=$bdy[1];
						
					 $new_bdy=implode('-',$bdy_m);
						
						
						if($new_bdy==$current_month)
						{ 
					         if($s['advance_payment']=="")
							 {
								
								 $amnt=0;
								 
							 }
							 else{
								
								 $amnt=$s['advance_payment'];
								 
							 }
					$total_amount=$total_amount + $amnt;
			
							
						}
					}?>
             <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                           
                        </div>
                        <h4 class="mb-0">
                            <span class="count">          
							<?php echo $total_amount; ?></span>
                        </h4>
                        <p class="text-light">Total Income This Month(Paid)</p>

                        <div class="" style="height:70px;" height="70">
                          
                        </div>

                    </div>

                </div>
            </div>
			
			
			   <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">

                        <p class="text-light">Total Remaining SMS</p>

                        <div class="" style="height:70px;" height="70">
                         
                        </div>

                    </div>

                </div>
            </div>
            <!--/.col-->

                            


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>
</html>
