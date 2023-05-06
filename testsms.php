<?php



//------Compose Group SMS-----------
if(isset($_POST['compose_new']))
{
include('connection.php');
//$api_key = '55E01BD3D7D38B';
//$from = 'SRFITS';

$send_msg =$_POST['newsms'];

$result= mysqli_query($con,"select RIGHT(contact_number,10) AS mobiles from member order by id desc");

while($row=mysqli_fetch_array($result))
{
	
	 echo $con=$row['mobiles'].',';
	 
			

	 //$api_url = "http://kutility.in/app/smsapi/index.php?key=".$api_key."&routeid=415&type=text&contacts=".$contact."&senderid=".$from."&msg=".$sms_text;
$response = file_get_contents( $api_url);
	 
 

}


}
?>
