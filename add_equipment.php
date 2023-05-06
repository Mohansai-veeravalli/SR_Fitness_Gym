<?php ob_start();
session_start();

if(!isset($_SESSION['email']))
{
	header('location:login.php');
}
include('connection.php');





?>
<!doctype html>
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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
<script>
function get_total_cost()
{
	
	
	per=document.getElementById('per_unit').value;
	quan=document.getElementById('quantity').value;
	//alert(per);
	//alert(quan);
	ttl=per*quan;
	//alert(ttl);
	document.getElementById('total_cost').value=ttl;
}

</script>
</head>
<body>
        <!-- Left Panel -->

   <?php include('sidebar.php'); ?><!-- /#left-panel -->

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
                            <li><a href="#">Forms</a></li>
                            <li class="active">Basic</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
       



                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Add New Equipment</strong> 
                      </div>
                      <div class="card-body card-block">
                        <form action="insert_equipment.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                          
                        


						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label"> Name</label></div>
                            <div class="col-md-4"><input type="text" id="text-input" name="name" placeholder=" name" class="form-control" required></div>
                            <div class="col-md-2"><label for="email-input" class=" form-control-label">Quantity</label></div>
                            <div class="col-md-4"><input type="number" id="quantity" name="quantity"  onkeyup="get_total_cost()"  class="form-control"></div>
                                               
						</div>
                        
						  
						  
						  
						<div class="row form-group">
						 <div class="col-md-2"><label for="text-input" class=" form-control-label">Per Unit Cost </label></div>
                            <div class="col-md-4"><input type="text" id="per_unit" name="per_cost" onkeyup="get_total_cost()"  class="form-control"></div>
                           
                              <div class="col-md-2"><label for="email-input" class=" form-control-label">Totl Cost</label></div>
                            <div class="col-md-4"><input type="text" id="total_cost" name="total_cost" required  class="form-control"></div>
                                               
						</div>
						
						
						  <button type="submit" name=equipment class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
						
					
						  
					
					 
						  
						  
						  
					
						  
						
                        </form>
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


</body>
</html>
