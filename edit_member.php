<?php ob_start();
session_start();
include('connection.php');


if(!isset($_SESSION['email']))
{
	header('location:login.php');
}
$member_id=$_GET['member_id'];

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
                        <h1>Edit  Member</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Member</a></li>
                            <li class="active">Edit Member</li>
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
if(isset($_POST['update']))
{
	if(!empty($_FILES["file"]["name"]))
	{
		
	$temp = explode(".",$_FILES["file"]["name"]);
$newfilename_file = rand(100000,897688) . '.' .end($temp);

move_uploaded_file($_FILES["file"]["tmp_name"],"images/".$newfilename_file);

//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
$file_path="images/".$newfilename_file;
	
	$chk=mysqli_query($con,"update member set name='".$_POST['name']."',receipt='".$_POST['receipt']."',email='".$_POST['email']."',gender='".$_POST['gender']."',address='".$_POST['address']."',dob='".$_POST['dob']."',occupation='".$_POST['occupation']."',
contact_number= '".$_POST['contact_number']."' ,profile_image='".$file_path."',alternate_number='".$_POST['alternate_number']."' ,identity_proof= '".$_POST['identity_proof']."' ,identity_number= '".$_POST['identity_number']."',subscription= '".$_POST['subscription']."',starting_date='".$_POST['starting_date']."' ,ending_date='".$_POST['ending_date']."' ,amount_status='".$_POST['amount_status']."' ,advance_payment='".$_POST['advance_payment']."' ,pending_payment= '".$_POST['pending_payment']."',personal_trainer='".$_POST['personal_trainer']."' ,facility='".$_POST['facility']."' 	where id='".$member_id."'");
	}
	else{
		//echo "scond";
		$chk=mysqli_query($con,"update member set name='".$_POST['name']."',receipt='".$_POST['receipt']."',email='".$_POST['email']."',gender='".$_POST['gender']."',address='".$_POST['address']."',dob='".$_POST['dob']."',occupation='".$_POST['occupation']."',
contact_number= '".$_POST['contact_number']."',alternate_number='".$_POST['alternate_number']."' ,identity_proof= '".$_POST['identity_proof']."' ,identity_number= '".$_POST['identity_number']."',subscription= '".$_POST['subscription']."',starting_date='".$_POST['starting_date']."' ,ending_date='".$_POST['ending_date']."' ,amount_status='".$_POST['amount_status']."' ,advance_payment='".$_POST['advance_payment']."' ,pending_payment= '".$_POST['pending_payment']."',personal_trainer='".$_POST['personal_trainer']."' ,facility='".$_POST['facility']."' 	where id='".$member_id."'");
	
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
                        <strong>Memeber Personal Information</strong> <?php echo $error_message; ?>
                      </div>
                      <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                         
                          <?php 
 $sql=mysqli_query($con,"select * from member where id='".$member_id."'");
 while($data=mysqli_fetch_array($sql))
 {
	 

	
	 
 


?>
	<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Receipt No. </label></div>
                            <div class="col-md-4"><input type=text id="number" name="receipt" placeholder="Receipt No." value="<?php echo $data['receipt'] ;?>" class="form-control"></div>
                                               
						</div>
 <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Place Image</label></div>
                            <div class="col-12 col-md-9"><!--<img src="<?php //echo $image ;?>" 
							=120px width=120px>-->
							<!--<input type="file" id="file-input" name="file-input" class="form-control-file">-->
							 <img src="<?php echo $data['profile_image'] ;?>" height=100px width=140px id=img>    
											
											
											
											 <img src="" height=100px width=140px id=img1 style="display:none" >
										  
										     <button id=btn type=button value=change onclick="change()">change</button>
											   <button id=btn1 type=reset value=change onclick="cancel()" style="display:none">cancel</button>
                
											 <input type='file' name="file" id="imgInp" style="display:none"  />
											<input type=hidden name=id value=<?php echo $member_id; ?> >
							
							
							
							
							
							
							
							
							
							</div>
                          </div>

						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Full Name</label></div>
                            <div class="col-md-4"><input type="text" id="text-input" name="name" placeholder="Enter full name" value="<?php echo $data['name']; ?>" class="form-control" required></div>
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Email </label></div>
                            <div class="col-md-4"><input type="text" id="email-input" name="email" placeholder="Enter Email" value="<?php echo $data['email']; ?>" class="form-control" ></div>
                                               
						</div>
                         <div class="row form-group">
                           <div class="col-md-2"><label class=" form-control-label">Gender</label></div>
                            <div class="col-md-4">
                              <div class="form-check-inline form-check">
                                <label for="inline-radio1" class="form-check-label ">
                                  <input type="radio" id="inline-radio1" name="gender" value="male" <?php echo ($data['gender']=='male')?'checked':'' ?> class="form-check-input">Male
                                </label>
                                <label for="inline-radio2" class="form-check-label ">
                                  <input type="radio" id="inline-radio2" name="gender" value="female" <?php echo ($data['gender']=='female')?'checked':'' ?> class="form-check-input">Female
                                </label>
                               
                              </div>
                            </div>
							<div class="col-md-2"><label for="text-input" class=" form-control-label">Address</label></div>
                            <div class="col-md-4"><textarea id="text-input" name="address" placeholder="Write address here" class="form-control"><?php echo $data['address']; ?></textarea></div>
                             
                          </div> 
						  
						  
						  
						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">DOB </label></div>
                            <div class="col-md-4"><input type=date id="text-input" name="dob" placeholder="dob" value="<?php echo $data['dob']; ?>" class="form-control"></div>
                            <div class="col-md-2"><label for="email-input" class=" form-control-label">Occupation</label></div>
                            <div class="col-md-4"><input type="text" id="email-input" name="occupation" placeholder="Enter occupation" value="<?php echo $data['occupation']; ?>" class="form-control"></div>
                                               
						</div>
						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Contact Number </label></div>
                            <div class="col-md-4"><input type="text" id="text-input" name="contact_number" placeholder="Enter contact number" value="<?php echo $data['contact_number']; ?>" class="form-control"></div>
                            <div class="col-md-2"><label for="email-input" class=" form-control-label">Alternate Number</label></div>
                            <div class="col-md-4"><input type="text" id="email-input" name="alternate_number" placeholder="Enter alternate contact number" value="<?php echo $data['alternate_number']; ?>" class="form-control"></div>
                                               
						</div>
						
					
						
						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Identity Proof </label></div>
                           <div class="col-md-4">
                              <select name="identity_proof" id="select" class="form-control">
							  <option ><?php echo $data['identity_proof']; ?></option>
							  <?php $r=mysqli_query($con,"select * from identity_proof");
							  
							  while($s=mysqli_fetch_array($r))
							  {
								  ?>
								  
								   <option ><?php echo $s['name']; ?></option> 
								  
								  <?php
								  
								  
								  
							  }?>
                                
                              </select>
                            </div>  <div class="col-md-2"><label for="email-input" class=" form-control-label">Identity Number</label></div>
                            <div class="col-md-4"><input type="text" id="email-input" name="identity_number" placeholder="Enter Identity Number" value="<?php echo $data['identity_number']; ?>" class="form-control"></div>
                                               
						</div>
						  
						
                         
						  
					<div class="card-header">
                        <strong>GyM Information</strong> 
                      </div>
					  <br><br>
                        	<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Subscription</label></div>
                            <div class="col-md-4">
                              <select name="subscription" id="select" class="form-control" required>
							  <option ><?php echo $data['subscription'] ;?></option>
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
                            <div class="col-md-4"><input type="date" id="text-input" name="starting_date" placeholder="Text" value="<?php echo $data['starting_date']; ?>" class="form-control"></div>
 <div class="col-md-2"><label for="text-input" class=" form-control-label">End Date </label></div>
                            <div class="col-md-4"><input type="date" id="text-input" name="ending_date" placeholder="Text" value="<?php echo $data['ending_date']; ?>" class="form-control"></div>
                           
						</div>
						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Amount Status </label></div>
   <div class="col-md-4">
                              <select name="amount_status" id="select" class="form-control" required>
							  <option ><?php echo $data['amount_status']; ?></option>
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
                            <div class="col-md-4"><input type="number" id="email-input" name="advance_payment" value="<?php echo $data['advance_payment']; ?>" placeholder="advance payment amount" class="form-control"></div>
                            
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Pending Amount(Rs)</label></div>
                            <div class="col-md-4"><input type="number" id="text-input" name="pending_payment" value="<?php echo $data['pending_payment']; ?>" placeholder="pending amount" class="form-control"></div>
                                              
						</div>
						
						<div class="row form-group">
                            <div class="col-md-2"><label for="text-input" class=" form-control-label">Personal Trainer </label></div>
                            
 <div class="col-md-4">
                              <select name="personal_trainer" id="select" class="form-control" required>
							  <option ><?php echo $data['personal_trainer']; ?></option>
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
							  <option ><?php echo $data['facility']; ?></option>
							  <?php $r=mysqli_query($con,"select * from facility");
							  
							  while($s=mysqli_fetch_array($r))
							  {
								  ?>
								  
								   <option value="<?php  echo $s['id']; ?>"><?php echo $s['name']; ?></option> 
								  
								  <?php
								  
								  
								  
							  }?>
                                
                              </select>
                            </div>                  
						</div>
						  
						
                          
                       
                      </div>
                      <div class="card-footer">
                        <button type="submit" name="update" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
						
                      </div>
					  
 <?php } ?>
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
