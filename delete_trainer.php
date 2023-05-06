<?php ob_start();

include('connection.php');
$trainer_id=$_GET['id'];
$a=mysqli_query($con,"delete from trainer where id='".$trainer_id."'");
if($a)
{
	
	echo "<script>window.loaction.href='manage_trainer.php'</script>";
}


?>