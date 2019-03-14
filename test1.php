<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "procure_application";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    echo 'error in conection';
}

$query="SELECT DISTINCT supplier_id FROM `vendor_category` WHERE cat_id NOT IN(1,3,6,8,9,11,13,15,16,17,18,19,34)";
$result = mysqli_query($conn, $query);
$nocat=array();
while ($all = mysqli_fetch_array($result)) {
	$ncat[]=$all;
}
foreach($ncat as $n){

	$nocat[]=$n['supplier_id'];
}



$query2="SELECT * FROM `e_vendor` ";
$result2 = mysqli_query($conn, $query2);
$allv=array();
while ($all = mysqli_fetch_array($result2)) {
	$allv[]=$all;
}


?>
<!DOCTYPE html>
<html>
 

<head>
	  
	<style>
	table{
		margin:auto;
		
	}
	thead th{
		padding-right:30px;
	}
	
	 


	</style>
</head>
	<table>
	 <thead>
	 <tr>
	 <th>S/N</th>
	 <th>Company Name</th>
	 </tr>
	 </thead>
	 <tbody>
	 
	 
	 

		<?php $x=1; foreach($allv as $v):
				if(in_array($v['supplier_id'],$nocat)):?>
				<tr>
				<td><?=$x;?></td>
				 <td> <?php echo $v['company_name'];?></td>
				</tr>
				
				
					
					

				<?php $x++; endif;endforeach;?>
	</tbody>
	</table>
</html>
