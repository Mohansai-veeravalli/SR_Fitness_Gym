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
                            <li><a href="#">Enquiry</a></li>
                            <li class="active">Add New </li>
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
if(isset($_POST['enquiry']))
{
	
	if($_POST['email']=="")
	{
		
		
		$error_message=" <font color=red> Enquiry email can not be empty</font>";
	}
	else{
	$chk=mysqli_query($con,"select * from enquiry where email='".$_POST['email']."'");
	
	//echo "select * from trainer where email='".$_POST['email']."'";
	$count=mysqli_num_rows($chk);
	if($count>0)
	{
		
		$error_message=" <font color=red>Enquiry email id already exists</font>";
		
	}
	else{
		
		
	
		$r=mysqli_query($con,"insert into enquiry(name,email,occupation,enquiry_date,mobile) values('".$_POST['name']."','".$_POST['email']."','".$_POST['occupation']."','".$_POST['enquiry_date']."','".$_POST['mobile']."')");
		//echo "insert into trainer(name,age,gender,salary_package,mobile,email,doj) values('".$_POST['name']."','".$_POST['age']."','".$_POST['gender']."','".$_POST['salary_package']."','".$_POST['mobile']."','".$_POST['email']."','".$_POST['doj']."')";
		if($r)
			{
				//echo"doj".$_POST['doj'];
				$error_message= "<font color=green>Enquiry has been added</font>";
				
			}
			else{
				
				$error_message= "<font color=green>Something went wrong</font>";
			}
	}
	
}
}
                 
?>

                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Add New Enquiry</strong> 
                      </div>
                      <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                          
                        


						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label"> Name</label></div>
                            <div class="col-md-4"><input type="text" id="text-input" name="name" placeholder="Enter name" class="form-control" required></div>
                            <div class="col-md-2"><label for="email-input" class=" form-control-label">Email Id</label></div>
                            <div class="col-md-4"><input type="email" id="email-input" name="email"  placeholder="Enter Email" required class="form-control"></div>
                                              
						</div>
                         
						  
						  <div class="row form-group">
                            <div class="col-md-2"><label for="email-input" class=" form-control-label">Mobile</label></div>
                            <div class="col-md-4"><input type="text" id="email-input" name="mobile"  placeholder="Enter contact no" required class="form-control"></div>
                              <div class="col-md-2"><label class=" form-control-label">Gender</label></div>
                            <div class="col-md-4">
                              <div class="form-check-inline form-check">
                                <label for="inline-radio1" class="form-check-label ">
                                Male  <input type="radio" id="inline-radio1" name="gender" value="male" class="form-check-input">
                                </label>
                                <label for="inline-radio2" class="form-check-label ">
                                 Female <input type="radio" id="inline-radio2" name="gender" value="female" class="form-check-input">
                                </label>
                               
                              </div>
                            </div>      
						</div>
						  
						
						<div class="row form-group">
                            <div class="col-md-2"><label for="email-input" class=" form-control-label">Occupation</label></div>
                            <div class="col-md-4"><input type="text" id="email-input" name="occupation"  placeholder="Enter occupation" required class="form-control"></div>
                               <div class="col-md-2"><label for="text-input" class=" form-control-label">Enquiry Date</label></div>
                            <div class="col-md-4"><input type="date" id="text-input" name="enquiry_date" required placeholder="enquiry date" class="form-control"></div>
                                      
						</div>
						
						  <button type="submit" name=enquiry class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
						<?php echo $error_message; ?>
						
					
						  
					
					 
						  
						  
						  
					
						  
						
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
