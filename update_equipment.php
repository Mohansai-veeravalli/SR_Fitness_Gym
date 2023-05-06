<?php ob_start();
include('connection.php');
$id=$_GET['id'];

$r=mysqli_query($con,"update equipment set name='".$_POST['name']."',quantity='".$_POST['quantity']."',per_cost='".$_POST['per_cost']."',
total_cost='".$_POST['total_cost']."' where id='".$id."'");
if($r){
	
	echo'<script>alert("Equipment has been updated");window.location.href="manage_equipment.php"; </script>';
	
	
}
else{
	
	echo'<script>alert("Something went wrong");window.location.href="manage_equipment.php"; </script>';
	
	
}


?>