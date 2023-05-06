<?php
//------Compose Group SMS-----------

	include('connection.php');

$result= mysqli_query($con,"select * from member");


while($row=mysqli_fetch_array($result))
{
	
	echo $row['contact_number']."<br>";


}

?>
