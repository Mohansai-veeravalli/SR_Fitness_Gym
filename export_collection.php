<?php
header("Content-type: text/xls");
header("Content-Disposition: attachment; filename=GYM_collection_Report.xls");
include('connection.php');
?>


<?php
$from_date=$_POST['f1_d'];
$till_date=$_POST['t1_d'];
							
if($from_date=="" || $till_date=="")
{
	
	
	echo "you have not set any searching criterea";
	
}
else{
	

?>
                <table id="example" border="1" bordercolor="#333" class="table table-bordered table-striped table-condensed cf">
                    <thead>
					
                      <tr>
                        <th>Reg Id</th>
                        <th>Name</th>
                      
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Amount Status</th>
                        <th>Advance payment</th>
                        <th> Pending Amount</th>
                     
                     
                       
                      </tr>
                    </thead>
                    <tbody>
                     <?php  $r=mysqli_query($con,"select * from member where starting_date between '".$from_date."' and '".$till_date."' order by id desc");
					while($s=mysqli_fetch_array($r))
					{
						
					 	
						?>
					
                      <tr>
					     <td><?php echo $s['id'] ; ?></td>
                        <td><?php echo $s['name'] ; ?></td>
                     
                        <td><?php echo $s['starting_date'] ; ?></td>
                        <td><?php echo $s['ending_date'] ; ?></td>
                        <td><?php echo $s['amount_status'] ; ?></td>
                        <td><?php echo $s['advance_payment'] ; ?></td>
                        <td><?php echo $s['pending_payment'] ; ?></td>
                       
                         </tr>
					  
					<?php } ?>
                    </tbody>
                  </table>
<?php } ?>        