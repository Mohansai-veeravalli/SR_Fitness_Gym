<?php ob_start();
session_start();

if(!isset($_SESSION['email']))
{
	header('location:login.php');
}
include('connection.php');

$email=$_GET['email'];

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
$r=mysqli_query($con,"select * from member where email='".$email."' limit 1");
while($s=mysqli_fetch_array($r))
{
	
	//echo $s['name'];
	




?>

<table>
<caption>Memebr Information</caption>
  <tr>
    <td><b><font color=red>Personal Information</font></b></td>
    <td></td>

  </tr>
  <tr>
    <td>Member Img</td>
    <td><img src="<?php echo $s['profile_image']; ?>" width=50 height=50> </td>

  </tr>
    <tr>
    <td>Name</td>
    <td><?php echo $s['name']; ?> </td>

  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $s['email']; ?> </td>

  </tr>
  <tr>
    <td>Weight(Kg)</td>
    <td><?php echo $s['weight']; ?> </td>

  </tr>
  <tr>
    <td>Height</td>
    <td><?php echo $s['height']; ?> </td>

  </tr>
  <tr>
    <td>DOB</td>
    <td><?php echo $s['dob']; ?> </td>

  </tr>
  <tr>
    <td>Occupation</td>
    <td><?php echo $s['occupation']; ?> </td>

  </tr>
  <tr>
    <td>Contact_Number</td>
    <td><?php echo $s['contact_number']; ?> </td>

  </tr>
  <tr>
    <td>Alternate_number</td>
    <td><?php echo $s['alternate_number']; ?> </td>

  </tr>
  <tr>
    <td>Address</td>
    <td><?php echo $s['address']; ?> </td>

  </tr>
  <tr>
    <td>Idenitity Proof</td>
    <td><?php echo $s['identity_proof']; ?> </td>

  </tr>
  <tr>
    <td>Identity Number</td>
    <td><?php echo $s['identity_number']; ?> </td>

  </tr>
  
  <tr>
    <td><b><font color=red>Gym Information</font></b></td>
    <td> </td>

  </tr>
  <tr>
    <td>Subscripiton</td>
    <td><?php echo $s['subscription']; ?> </td>

  </tr>
  <tr>
    <td>starting Date</td>
    <td><?php echo $s['starting_date']; ?> </td>

  </tr>
  <tr>
    <td>Ending Date</td>
    <td><?php echo $s['ending_date']; ?> </td>

  </tr>
  <tr>
    <td>Amount</td>
    <td><?php echo $s['amount']; ?> </td>

  </tr>
  <tr>
    <td>Amount Status</td>
    <td><?php echo $s['amount_status']; ?> </td>

  </tr>
  <tr>
    <td>Advance Payment</td>
    <td><?php echo $s['advance_payment']; ?> </td>

  </tr>
  <tr>
    <td>Pending Amount</td>
    <td><?php echo $s['pending_payment']; ?> </td>

  </tr>
  
  <tr>
    <td>Personal Trainer</td>
    <td><?php echo $s['personal_trainer']; ?> </td>

  </tr>
  
  <tr>
    <td>Facilty</td>
    <td><?php echo $s['facility']; ?> </td>

  </tr>
  
  
</table>
<?php } ?>
</body>