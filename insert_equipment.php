<?php ob_start();
include('connection.php');

$r=mysqli_query($con,"insert into equipment(name,quantity,per_cost,total_cost) values('".$_POST['name']."','".$_POST['quantity']."','".$_POST['per_cost']."','".$_POST['total_cost']."')");
		//echo "insert into trainer(name,age,gender,salary_package,mobile,email,doj) values('".$_POST['name']."','".$_POST['age']."','".$_POST['gender']."','".$_POST['salary_package']."','".$_POST['mobile']."','".$_POST['email']."','".$_POST['doj']."')";
		if($r)
			{
				
				echo'<script>alert("Equipment has been added");window.location.href="add_equipment.php"; </script>';
				
			}
			else{
				
				echo'<script>alert("Something went wrong");window.location.href="add_equipment.php"; </script>';
			}

?>