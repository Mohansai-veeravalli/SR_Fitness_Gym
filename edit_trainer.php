<?php ob_start();
session_start();
include('connection.php');
if(!isset($_SESSION['email']))
{
	header('location:login.php');
}
$trainer_id=$_GET['id'];
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
                            <li><a href="#">Trainer</a></li>
                            <li class="active">Edit</li>
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
if(isset($_POST['trainer']))
{
	
	
	$chk=mysqli_query($con,"update trainer set name='".$_POST['name']."',email='".$_POST['email']."',age='".$_POST['age']."',gender='".$_POST['gender']."',package_yearly='".$_POST['salary_package']."',mobile='".$_POST['mobile']."',doj='".$_POST['doj']."' where id='".$trainer_id."'");
	
	if($chk)
	{
		
		$error_message="<font color=green>Successfully updated</font>";
	}
	else{
		
		$error_message="<font color=red>Something went wrong</font>";
	
	}
	
	

}
                 
?>


                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Update Trainer Profile</strong> 
                      </div>
                      <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                          
                        <?php 
 $sql=mysqli_query($con,"select * from trainer where id='".$trainer_id."'");
 while($data=mysqli_fetch_array($sql))
 {
	 

	
	 
 


?>


						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Trainer Name</label></div>
                            <div class="col-md-4"><input type="text" id="text-input" name="name"  value="<?php echo $data['name']; ?>" placeholder="trainer name" class="form-control" required></div>
                            <div class="col-md-2"><label for="email-input" class=" form-control-label">age</label></div>
                            <div class="col-md-4"><input type="number" id="email-input" name="age" value="<?php echo $data['age']; ?>" required placeholder="Enter age eg:24" class="form-control"></div>
                                               
						</div>
                         <div class="row form-group">
                           <div class="col-md-2"><label class=" form-control-label">Gender</label></div>
                            <div class="col col-md-9">
                              <div class="form-check-inline form-check">
                                <label for="inline-radio1" class="form-check-label ">
								
                                  <input type="radio" id="inline-radio1" name="gender" value="male" class="form-check-input" <?php echo ($data['gender']=='male')?'checked':'' ?> >Male
                           </label>
                                <label for="inline-radio2" class="form-check-label ">
                                  <input type="radio" id="inline-radio2" name="gender" value="female" class="form-check-input" <?php echo ($data['gender']=='female')?'checked':'' ?>>Female
                                </label>
                               
                              </div>
                            </div>
                          </div> 
						  
						  
						  
						<div class="row form-group">
						 <div class="col-md-2"><label for="text-input" class=" form-control-label">Mobile Number </label></div>
                            <div class="col-md-4"><input type="text" id="text-input" name="mobile" value="<?php echo $data['mobile']; ?>" required placeholder="Mobile Number" class="form-control"></div>
                           
                              <div class="col-md-2"><label for="email-input" class=" form-control-label">Package Yearly</label></div>
                            <div class="col-md-4"><input type="number" id="email-input" name="salary_package" value="<?php echo $data['package_yearly']; ?>" required placeholder="Enter salary package" class="form-control"></div>
                                               
						</div>
						<div class="row form-group">
                            <div class="col-md-2"><label for="email-input" class=" form-control-label">Email Id</label></div>
                            <div class="col-md-4"><input type="email" id="email-input" name="email" value="<?php echo $data['email']; ?>"  placeholder="Enter Email" required class="form-control"></div>
                               <div class="col-md-2"><label for="text-input" class=" form-control-label">DOJ</label></div>
                            <div class="col-md-4"><input type="date" id="text-input" name="doj"  value="<?php echo $data['doj']; ?>" required placeholder="doj" class="form-control"></div>
                                      
						</div>
						
						  <button type="submit" name=trainer class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
						<?php echo $error_message; ?>
						
					
						  
					
					 
						  
						  
						  
 <?php } ?>
						  
						
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
