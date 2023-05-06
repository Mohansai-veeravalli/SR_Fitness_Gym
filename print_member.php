<?php ob_start();
session_start();

if(!isset($_SESSION['email']))
{
	header('location:login.php');
}
include('connection.php');

$receipt=$_GET['receipt'];

?>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

/* Style the table */
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

/* Style table headers and table data */
th, td {
  text-align: center;
  padding: 10px;
 
}

th:first-child, td:first-child {
  text-align: left;
}

/* Zebra-striped table rows */
tr:nth-child(even) {
  background-color: #f2f2f2
   border: 1px solid black;
}

.fa-check {
  color: green;
}

.fa-remove {
  color: red;
}


</style>

<script>
$(function(){
	
	window.print();
});

</script>
</head>
</body>

<?php
$r=mysqli_query($con,"select * from member where receipt='".$receipt."' limit 1");
while($s=mysqli_fetch_array($r))
{
	
	//echo $s['name'];
	




?>
<center><h1>S.R. FITNESS</h1>Ganesh nagar,salt pan Road Wadla(East) Mumbai 400037</center>
<hr style="height:3px solid black">
<table style="border:none">

  <tr><td></td><td></td><td> Date :<?php date_default_timezone_set('Asia/Kolkata');
  echo date('d-m-Y');		  ?></td></tr>
  <tr><td>Name : Mrs./Miss./Mr <?php echo $s['name']; ?></td><td></td>
    <td>Receipt No: <?php echo $s['receipt']; ?></td>    <td> 
  

  </tr>
  <tr><td>address : <?php echo $s['address']; ?></td></tr>
    <tr>
	
	</table>
	
	<table style="border:2">
	<tr><th style="border:1px solid black">Gym Subscripiton </th><th style="border:1px solid black">Date Of transaction</th><th style="border:1px solid black">Amount Status</th><th style="border:1px solid black">Amount(given)</th><th style="border:1px solid black">Amount(Due)</th></tr>
	<tr><td style="border:1px solid black"> <?php echo $s['subscription']; ?> </td><td style="border:1px solid black">From <?php echo $s['starting_date']; ?>    To <?php echo $s['ending_date']; ?>  </td><td style="border:1px solid black"><?php echo $s['amount_status']; ?> </td><td style="border:1px solid black"><?php echo $s['advance_payment']; ?> </td><td style="border:1px solid black"><?php echo $s['pending_payment']; ?> </td></tr>
	<tr>
	
	
	</table>
   
   <br><br><br>
   <table style="border:none">
   
   <tr><td>Member Sign..............</td><td></td><td></td><td>Accountant Sign........</td></tr>
   </table>
<?php } ?>
</body>