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

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add New Member &nbsp;&nbsp;&nbsp;&nbsp;<button><a href="add_member.php">Add New</a></button></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Member</a></li>
                            <li class="active">Add Member</li>
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
if(isset($_POST['add_member']))
{
	$error_message="";	
	$chk=mysqli_query($con,"select * from member where email='".$_POST['email']."'");
	
	$count=mysqli_num_rows($chk);
	if($count>0)
	{
		
		$error_message=" <font color=red>This Member  email already exists</font>";
		
	}
	else{
		$temp = explode(".",$_FILES["file"]["name"]);
$newfilename_file = rand(100000,897688) . '.' .end($temp);

move_uploaded_file($_FILES["file"]["tmp_name"],"images/".$newfilename_file);

//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
$file_path="images/".$newfilename_file;
		
		$_POST['img']=$file_path;
	
		$r=mysqli_query($con,"insert into member(profile_image,name,email,gender,address,dob,receipt,occupation,contact_number,alternate_number,identity_proof,identity_number,subscription,starting_date,ending_date,amount_status,advance_payment,pending_payment,personal_trainer,facility) values('".$file_path."','".$_POST['name']."','".$_POST['email']."','".$_POST['gender']."','".$_POST['address']."','".$_POST['dob']."','".$_POST['receipt']."','".$_POST['occupation']."','".$_POST['contact_number']."','".$_POST['alternate_number']."'
		,'".$_POST['identity_proof']."','".$_POST['identity_number']."','".$_POST['subscription']."','".$_POST['starting_date']."','".$_POST['ending_date']."','".$_POST['amount_status']."','".$_POST['advance_payment']."'
		,'".$_POST['pending_payment']."','".$_POST['personal_trainer']."','".$_POST['facility']."')");
		
		
			if($r)
			{
				
				 $error_message= "<font color=green>Member has been added</font>";
				
			}
			else{
				
				$error_message= "<font color=green>Something went wrong</font>";
			}
	}
	
}

                 
?>
                 

                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Personal Information</strong> <?php echo $error_message; ?> &nbsp;&nbsp;&nbsp;
						
						<?php if(isset($_POST['email'])){?> 
     <?php  
		 
		 if($r=='Member has been added')
		 {
			 
		 ?>
	 

						<button><a href="print_member.php?email=<?php echo $_POST['email']; ?>" target="_blank">Print</a></button> <?php 
						}} ?>
                      </div>
                      <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                         

                        <div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Receipt No.</label></div>
                            <div class="col-md-2"><input type="number" id="text-input" name="receipt" placeholder="Enter number" value="<?php if(isset($_POST['receipt'])){echo $_POST['receipt'] ;}?>" class="form-control" required></div>
                                              
						</div>
 <div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Profile pic</label></div>
                        
  <div class="col-12 col-md-9"><!--<img src="<?php //echo $image ;?>" height=120px width=120px>-->
							<!--<input type="file" id="file-input" name="file-input" class="form-control-file">-->
							 <img src="<?php if($file_path!=""){echo $file_path ; }?>" height=100px width=140px id=img>    
											
											
											
											 <img src="" height=100px width=140px id=img1 style="display:none" >
										  
										     <button id=btn type=button value=change onclick="change()">Upload Profile Pic</button>
											   <button id=btn1 type=reset value=change onclick="cancel()" style="display:none">cancel</button>
                
											 <input type='file' name="file" id="imgInp" style="display:none"  />
											
							</div>


						</div>

						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Full Name</label></div>
                            <div class="col-md-4"><input type="text" id="text-input" name="name" placeholder="Enter full name" value="<?php if(isset($_POST['name'])){echo $_POST['name'] ;}?>" class="form-control" required></div>
                            <div class="col-md-2"><label for="email-input" class=" form-control-label">Email </label></div>
                            <div class="col-md-4"><input type="text" id="email-input" name="email" placeholder="Enter Email" value="<?php if(isset($_POST['email'])){echo $_POST['email'] ;}?>" class="form-control"></div>
                                               
						</div>
                         <div class="row form-group">
                           <div class="col-md-2"><label class=" form-control-label">Gender</label></div>
                            <div class="col-md-4">
                              <div class="form-check-inline form-check">
                                <label for="inline-radio1" class="form-check-label ">
                                  <input type="radio" id="inline-radio1" name="gender" value="male" <?php  if(isset($_POST['gender'])){ echo ($_POST['gender']=='male')?'checked':'' ;} ?> class="form-check-input">Male
                                </label>
                                <label for="inline-radio2" class="form-check-label ">
                                  <input type="radio" id="inline-radio2" name="gender" value="female"class="form-check-input">Female
                                </label>
                               
                              </div>
                            </div>
							<div class="col-md-2"><label for="text-input" class=" form-control-label">Address</label></div>
                            <div class="col-md-4"><textarea id="text-input" name="address" placeholder="Write address here" class="form-control"><?php if(isset($_POST['address'])){echo $_POST['address'] ;}?></textarea></div>
                             
                          </div> 
						  
						  	
						  
						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">DOB </label></div>
                            <div class="col-md-4"><input type=date id="text-input" name="dob" placeholder="dob" value="<?php if(isset($_POST['dob'])){echo $_POST['dob'] ;}?>" class="form-control"></div>
                            <div class="col-md-2"><label for="email-input" class=" form-control-label">Occupation</label></div>
                            <div class="col-md-4"><input type="text" id="email-input" name="occupation" placeholder="Enter occupation" value="<?php if(isset($_POST['occupation'])){echo $_POST['occupation'] ;}?>" class="form-control"></div>
                                               
						</div>
						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Contact Number </label></div>
                            <div class="col-md-4"><input type="text" id="text-input" name="contact_number" placeholder="Enter contact number" value="<?php if(isset($_POST['contact_number'])){echo $_POST['contact_number'] ;}?>" class="form-control"></div>
                            <div class="col-md-2"><label for="email-input" class=" form-control-label">Alternate Number</label></div>
                            <div class="col-md-4"><input type="text" id="email-input" name="alternate_number" placeholder="Enter alternate contact number" value="<?php if(isset($_POST['alternate_number'])){echo $_POST['alternate_number'] ;}?>" class="form-control"></div>
                                               
						</div>
						
					
						
						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Identity Proof </label></div>
                           <div class="col-md-4">
                              <select name="identity_proof" id="select" class="form-control">
							  <?php if(isset($_POST['identity_proof'])){
								  ?>
								    <option ><?php echo $_POST['identity_proof']; ?></option>
								 <?php  
							  }
							  ?>
							  <option value="no identity selected">Select Proof</option>
							  <?php $r=mysqli_query($con,"select * from identity_proof");
							  
							  while($s=mysqli_fetch_array($r))
							  {
								  ?>
								  
								   <option ><?php echo $s['name']; ?></option> 
								  
								  <?php
								  
								  
								  
							  }?>
                                
                              </select>
                            </div>  <div class="col-md-2"><label for="email-input" class=" form-control-label">Identity Number</label></div>
                            <div class="col-md-4"><input type="text" id="email-input" name="identity_number" value="<?php if(isset($_POST['identity_number'])){echo $_POST['identity_number'] ;}?>" placeholder="Enter Identity Number" class="form-control"></div>
                                               
						</div>
						  
						
                         
						  
					<div class="card-header">
                        <strong>GyM Information</strong> 
                      </div>
					  <br><br>
                        	<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Subscription</label></div>
                            <div class="col-md-4">
                              <select name="subscription" id="select" class="form-control" required>
							    <?php if(isset($_POST['subscription'])){
								  ?>
								    <option ><?php echo $_POST['subscription']; ?></option>
								 <?php  
							  }
							  ?>
							  <option value="no subscription selected">Select Subscripiton</option>
							  <?php $r=mysqli_query($con,"select * from subscription");
							  
							  while($s=mysqli_fetch_array($r))
							  {
								  ?>
								  
								   <option ><?php echo $s['name']; ?></option> 
								  
								  <?php
								  
								  
								  
							  }?>
                                
                              </select>
                            </div>           
						</div>
                        
						  
						  
						  
						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Starting Date </label></div>
                            <div class="col-md-4"><input type="date" id="text-input" name="starting_date" placeholder="Text" value="<?php if(isset($_POST['starting_date'])){echo $_POST['starting_date'] ;}?>" class="form-control"></div>
 <div class="col-md-2"><label for="text-input" class=" form-control-label">End Date </label></div>
                            <div class="col-md-4"><input type="date" id="text-input" name="ending_date" placeholder="Text" value="<?php if(isset($_POST['ending_date'])){echo $_POST['ending_date'] ;}?>" class="form-control"></div>
                           
						</div>
						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Amount Status </label></div>
   <div class="col-md-4">
                              <select name="amount_status" id="select" class="form-control" required>
							    <?php if(isset($_POST['amount_status'])){
								  ?>
								    <option ><?php echo $_POST['amount_status']; ?></option>
								 <?php  
							  }
							  ?>
							  <option value="No amount status Selected">Select Status</option>
							  <?php $r=mysqli_query($con,"select * from amount_status");
							  
							  while($s=mysqli_fetch_array($r))
							  {
								  ?>
								  
								   <option ><?php echo $s['name']; ?></option> 
								  
								  <?php
								  
								  
								  
							  }?>
                                
                              </select>
                            </div>                             
						                   
						</div>
						
						<div class="row form-group">
						  <div class="col-md-2"><label for="email-input" class=" form-control-label">Advance Payment(Rs)</label></div>
                            <div class="col-md-4"><input type="number" id="email-input" name="advance_payment" value="<?php if(isset($_POST['advance_payment'])){echo $_POST['advance_payment'] ;}?>" placeholder="advance payment amount" class="form-control"></div>
                            
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Pending Amount(Rs)</label></div>
                            <div class="col-md-4"><input type="number" id="text-input" name="pending_payment" value="<?php if(isset($_POST['pending_payment'])){echo $_POST['pending_payment'] ;}?>" placeholder="pending amount" class="form-control"></div>
                                              
						</div>
						
						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Personal Trainer </label></div>
                            
 <div class="col-md-4">
                              <select name="personal_trainer" id="select" class="form-control" required>
						  <?php if(isset($_POST['personal_trainer'])){
								  ?>
								    <option ><?php echo $_POST['personal_trainer']; ?></option>
								 <?php  
							  }
							  ?>
							 <option value="No trainer selected">Select Status</option>
							  <?php $r=mysqli_query($con,"select * from trainer");
							  
							  while($s=mysqli_fetch_array($r))
							  {
								  ?>
								  
								   <option ><?php echo $s['name']; ?></option> 
								  
								  <?php
								  
								  
								  
							  }?>
                                
                              </select>
                            </div>

							 <div class="col-md-2"><label for="text-input" class=" form-control-label">Facility </label></div>
                            
 <div class="col-md-4">
                              <select name="facility" id="select" class="form-control" required>
							    <?php if(isset($_POST['facility'])){
								  ?>
								    <option ><?php echo $_POST['facility']; ?></option>
								 <?php  
							  }
							  ?>
							  <option value="No facility selected">Select facility</option>
							  <?php $r=mysqli_query($con,"select * from facility");
							  
							  while($s=mysqli_fetch_array($r))
							  {
								  ?>
								  
								   <option ><?php echo $s['name']; ?></option> 
								  
								  <?php
								  
								  
								  
							  }?>
                                
                              </select>
                            </div>                  
						</div>
						  
						
                          
                       
                      </div>
                      <div class="card-footer">
                        <button type="submit" name="add_member" class="btn btn-primary btn-sm">
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
