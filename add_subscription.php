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

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

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
                            <li><a href="#">Subscription</a></li>
                            <li class="active">Add or Manage </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                 
						  
		<?php
$error_message="";		
if(isset($_POST['subscription']))
{
	
	$chk=mysqli_query($con,"select * from subscription where name='".$_POST['name']."'");
	
	$count=mysqli_num_rows($chk);
	if($count>0)
	{
		
		$error_message=" <font color=red>This subscription already exists</font>";
		
	}
	else{
		
		
	
		$r=mysqli_query($con,"insert into subscription(name) values('".$_POST['name']."')");
			if($r)
			{
				 $error_message= "<font color=green>Subscription has been added</font>";
				
			}
			else{
				
				$error_message= "<font color=green>Something went wrong</font>";
			}
	}
	
}

                 
?>
                 

              
                 

                

                  <div class="col-lg-12">
				  
				 
				  
                    <div class="card">
                      <div class="card-header">Subscription Form</div>
                      <div class="card-body card-block">
                        <form action="" method="post" class="" >
                          <div class="form-group">
                            <div class="input-group">
                              <input type="text" id="username2" name="name" placeholder="Enter New Subscription Here"  autocomplete="off" required class="form-control">
                              <div class="input-group-addon"><i class="fa fa-plus"></i></div>
                            </div>
                          </div>
                        
                       
                          <div class="form-actions form-group"><button type="submit" name=subscription class="btn btn-secondary btn-sm">Submit</button> <?php echo $error_message; ?></div>
                        </form>
                      </div>
                    </div>
					
					
                  </div>

                 

                </div>
 

            </div><!-- .animated -->
        </div><!-- .content -->

 <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Subscription Detail</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
					
                      <tr>
                        <th>Subscription Id</th>
                        <th>Subscription Name</th>
                     
                      </tr>
                    </thead>
                    <tbody>
                     <?php  $r=mysqli_query($con,"select * from subscription order by id desc");
					while($s=mysqli_fetch_array($r))
					{
						
					 	
						?>
					
                      <tr>
					     <td><?php echo $s['id'] ; ?></td>
                        <td><?php echo $s['name'] ; ?></td>
                      
                       
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


</body>
</html>
