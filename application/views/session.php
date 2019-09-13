
<table border="1">

	<tr>
	    <td>sr no.</td>
		<td>vegetable name</td>
		<td>vegetable unit</td>
		<td>vegetable quantity</td>
		<td>vegetable rate</td>
	</tr>
 <tr>total</tr>

<?php
for($i=0;$i<count($avvegies);$i++)
{
  	?>
  	
  	<tr>
  	<td><?php echo $count?></td>
  	<td><?php echo $avvegies[$i]['veg_name'];?></td>
  	<td><?php echo  $avvegies[$i]['vunit_unit']?></td>
  	<td><?php echo  $avvegies[$i]['qty']?></td>
  	<td><?php echo  $avvegies[$i]['vr_rate_per_unit']?></td>
  	<td></td>
  	
  	
  	</tr>
  	
  	
  	</table>
 
 <?php
}
?>