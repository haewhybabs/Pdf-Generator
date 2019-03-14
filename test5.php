<?php

$servername = "xownsolutions.com";
$username = "pvguest";
$password = "Irn5e1@2";
$database = "guestbook";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "guestbook";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    echo 'error in conection';
}

$query="SELECT * FROM guests";
$result = mysqli_query($conn, $query);
while ($all = mysqli_fetch_array($result)) {
	$data[]=$all;
}


$count="SELECT COUNT(id) from guests";
$count_result= mysqli_query($conn, $count);

$total_count1 = mysqli_fetch_assoc($count_result);
foreach ($total_count1 as $key => $value) {
	$total=$value;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
.page1{
	margin-top: -480px;
	margin-left: 250px;
}/*
.page2{
	margin-top: -500px;
	margin-left: 600px;
}

.name1{
	color: #749841;
	font-size: 13px;
	font-weight: bold;
	padding-right: 20px;

}
.name2{
	color:  #6C4174;
	font-size: 13px;
	font-weight: bold;
}
.name3{
	color: #749841;
	font-size: 13px;
	font-weight: bold;
	/*padding-left: 17px;
	text-transform: uppercase;

};
*/

/*tr:nth-child(even) {
 background-color: #FDE9D9;
}

thead{
    background:#F79646; color:#fff;
}
*/
.name1{
	font-family: Lucida Calligraphy;

}
.table1 thead{
	/*position: absolute;*/
	/*background:#F79646 !important;*/
}

	
.table1 td{
	padding-top: 20px;
	text-align: center;
	
}
.table1 th{
	text-align: center;
	padding-left: 35px;
	/*border: 1px solid #ddd;*/
	/*padding-right: 15px;*/
}
.table1{
	margin-left: 15px;
}
.table1 td{
	padding-left: 35px;
}
.table1{
	
	
}


</style>
<body>
	<div>
		
	
		<img src="pdf_gen/Page1new.jpg" style="width:100%;">
		<img src="pdf_gen/companies.jpg">

		 <?php for($i=0; $i<$total; $i+=10):?>
		 	<img src="pdf_gen/content.jpg">
		 	<div class="page1">

				<table class="table1">
					<thead>
						<tr>
							
							<th>Full Name</th>
							<th>Company Name</th>
						</tr>
					</thead>

					<tbody>
						<?php for($p=1; $p<11; $p++):
							if ( ! isset($data[$p+$i])) {
							   $data[$p + $i] = null;
							   break;
							}
							?>
												
				
					
						
							<tr>
								
								<td class="name1"><strong><?=$data[$p+$i]['first_name'];?> <span class="name1"><?=$data[$p+$i]['last_name'];?></span></strong></td>
								
								<td class="name2"> <?=$data[$p+$i]['company'];?></td>
								
							</tr>
											
										
										
										
									
						<?php endfor;?>
					</tbody>
				   
				</table>
			</div>
		<?php endfor;?>


    <div style="page-break-before: always;">
    	<img src="pdf_gen/lastpage.jpg">
    	
    </div>
	

</body>