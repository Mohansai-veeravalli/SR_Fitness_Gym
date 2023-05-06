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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
<script>
	
	$(function(){
		//$('.btn').hide();
		
		$("#imgInp").change(function(){
    readURL(this);
});
	
	$('#imgInp').hide();
	$('#img1').hide();
	
	$('#btn1').hide();
	
	});
	
	
	function change()
	{
		
	$('#imgInp').click();
	$('#imgInp').show();
	$('#btn').hide();
	
		$('#btn1').show();
		
	}
	
	
	function cancel()
	{
	
	$('#imgInp').hide();
	$('#btn').show();
	
     $('#btn1').hide();
	  $('#img1').hide();
	 $('#img').show();
	
	}
	

	
	
	
	</script>
	
	<script>
function readURL(input) {

$('#img').hide();
$('#img1').show();
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img1').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
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

     

        <div class="content mt-3">  
            <div class="animated fadeIn">


                <div class="row">
               
	<?php
$error_message="";		
if(isset($_POST['update_profile']))
{
		
	
	if(!empty($_FILES["file"]["name"]))
	{
		
	$temp = explode(".",$_FILES["file"]["name"]);
$newfilename_file = rand(100000,897688) . '.' .end($temp);

move_uploaded_file($_FILES["file"]["tmp_name"],"images/".$newfilename_file);

//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
$file_path="images/".$newfilename_file;
	
	$chk=mysqli_query($con,"update admin set user_name='".$_POST['new_user']."',password='".$_POST['new_password']."',profile_image='".$file_path."'");
	}
	else{
		//echo "scond";
			$chk=mysqli_query($con,"update admin set user_name='".$_POST['new_user']."',password='".$_POST['new_password']."',profile_image='".$file_path."'");
	
	}
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
                        <strong>Admin Information</strong> <?php echo $error_message; ?> &nbsp;&nbsp;&nbsp;
						
						
      
		 
		 
                      </div>
                      <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                         

                        
 <div class="row form-group">
                          


						</div>
						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Old User Name</label></div>
                            <div class="col-md-4"><input type="text" id="text-input" name="old_user" placeholder="Old User Name" value="<?php if(isset($_POST['old_user'])){echo $_POST['old_user'] ;}?>" class="form-control" required></div>
                                              
						</div>

						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Old Password</label></div>
                            <div class="col-md-4"><input type="text" id="text-input" name="old_password" placeholder="Enter Old Password" value="<?php if(isset($_POST['old_password'])){echo $_POST['old_password'] ;}?>" class="form-control" required></div>
                                              
						</div>
                        
						  <div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">New User Name</label></div>
                            <div class="col-md-4"><input type="text" id="text-input" name="new_user" placeholder="Enter New User" value="<?php if(isset($_POST['new_user'])){echo $_POST['new_user'] ;}?>" class="form-control" required></div>
                                              
						</div>
						  	
						  
						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">New Password</label></div>
                            <div class="col-md-4"><input type=text id="text-input" name="new_password" placeholder="New Password" value="<?php if(isset($_POST['new_password'])){echo $_POST['new_password'] ;}?>" class="form-control" required></div>
                                               
						</div>
						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Confirm Password</label></div>
                            <div class="col-md-4"><input type="text" id="text-input" name="confirm_password" placeholder="Confirm Password" value="<?php if(isset($_POST['confirm_password'])){echo $_POST['confirm_password'] ;}?>" class="form-control" required></div>
                                               
						</div>
						  <div class="col-md-2"><label for="text-input" class=" form-control-label">Change Profile pic</label></div>
                        
  <div class="col-12 col-md-9"><!--<img src="<?php //echo $image ;?>" height=120px width=120px>-->
							<!--<input type="file" id="file-input" name="file-input" class="form-control-file">-->
							 <img src="<?php if($file_path!=""){echo $file_path ; }?>" height=100px width=140px id=img>    
											
											
											
											 <img src="" height=100px width=140px id=img1 style="display:none" >
										  
										     <button id=btn type=button value=change onclick="change()">Upload Profile Pic</button>
											   <button id=btn1 type=reset value=change onclick="cancel()" style="display:none">cancel</button>
                
											 <input type='file' name="file" id="imgInp" style="display:none"  />
											
							</div>
					</div>
                      <div class="card-footer">
                        <button type="submit" name="update_profile" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
                      </div>
					   </form>
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
