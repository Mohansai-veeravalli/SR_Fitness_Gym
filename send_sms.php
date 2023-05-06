<?php
if(isset($_GET['cn']))
{
$cn=$_GET['cn'];
$enddt=$_GET['duedt'];
$name=$_GET['name'];
$time = strtotime($enddt);
$enddt = date('d-m-Y', $time); 
$api_key = '55E01BD3D7D38B';
$contacts = $cn;
$from = 'SRFITS';
//$send_msg = "Pay remaining balanace of you GYM Membership fee on or before ".$enddt.".";
$send_msg = "Dear ".$name."A friendly reminder that your membership at SR Fitness is about to expire.Renew or Update your membership as soon as possible to continue.";

$sms_text = urlencode($send_msg);
$api_url = "http://kutility.in/app/smsapi/index.php?key=".$api_key."&routeid=415&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;
//Submit to server
$response = file_get_contents( $api_url);
//echo $response;
echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Reminder Message send to Selected Member')
 window.location.href='package_expiry.php';
</SCRIPT>");}

//----------Birthday SMS---------------
if(isset($_GET['id']))
{
$id=$_GET['id'];	
$contacts=$_GET['con'];
$name=$_GET['name'];
$api_key = '55E01BD3D7D38B';

$from = 'SRFITS';
//$send_msg = "Pay remaining balanace of you GYM Membership fee on or before ".$enddt.".";
$send_msg = "Never believed a macho man could be graceful until you mate someone. Happy birthday, dear ".$name." Best wishes from SR Fitness.";

$sms_text = urlencode($send_msg);
$api_url = "http://kutility.in/app/smsapi/index.php?key=".$api_key."&routeid=415&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;
//Submit to server
$response = file_get_contents( $api_url);
//echo $response;
echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Birthday Message send to Selected Member')
 window.location.href='birthday_sms.php';
</SCRIPT>");
}


//------Compose Group SMS-----------
if(isset($_POST['compose_new']))
{
include('connection.php');
$api_key = '55E01BD3D7D38B';
$from = 'SRFITS';

$send_msg =$_POST['newsms'];

$result= mysqli_query($con,"select * from member");

while($row=mysqli_fetch_array($result))
{
	
	 $contact= $row['contact_number'];
	

	 $sms_text = urlencode($send_msg);
	 
	 $api_url = "http://kutility.in/app/smsapi/index.php?key=".$api_key."&routeid=415&type=text&contacts=".$contact."&senderid=".$from."&msg=".$sms_text;
$response = file_get_contents( $api_url);
	 
 

}

echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Group Message send to All Member')
 window.location.href='compose_new_sms.php';
</SCRIPT>");
}
?>
