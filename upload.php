<?php

$servername = "xownsolutions.com";
$username = "pvguest";
$password = "Irn5e1@2";
$database = "guestbook";

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

 .page1_settings{
	  	text-align: right;
	  	padding-top: 100px;

	  }
	  .page2_settings{
	  	text-align: left;
	  	padding-top: 100px;

	  }
	  .setup{
	  	text-align: justify;
	  	margin-left: 50%;
	  	margin-top: -450px;
	  }

	  .setin{
	  	text-align: justify;
	  	margin-left: 10%;
	  	margin-top: -450px;
	  }

	  .table-borderless > tbody > tr > td,
.table-borderless > tbody > tr > th,
.table-borderless > tfoot > tr > td,
.table-borderless > tfoot > tr > th,
.table-borderless > thead > tr > td,
.table-borderless > thead > tr > th {
    border: none;
}
.name1{
	color: #749841;
	font-size: 15px;
	font-weight: bold;
	padding-right: 20px;

}
.name2{
	color:  #6C4174;
	font-size: 15px;
	font-weight: bold;
}
.name3{
	color: #749841;
	font-size: 15px;
	font-weight: bold;
	padding-left: 17px;
	text-transform: uppercase;

}
	
</style>
<body>
	<div class="coverpage">
		<img src="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/generate_pdf/assets/pdf_gen/CoverPage.jpg">

	</div>

    <?php for($i=0; $i<$total; $i+=30):?>
	<div class="page1" style="page-break-before: always;">
		<img src="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/generate_pdf/assets/pdf_gen/innerRight.jpg">

		<div class="page2_settings">
				<div class="container">
					<div class="setin">
						<table style="border: none;">
							<tbody>
								<?php for($p=0; $p<15; $p++):
									if ( ! isset($data[$p+$i])) {
									   $data[$p+$i] = null;
									}
									?>
														
									<!-- <p class="name1"><?=$data[$p+$i]['first_name'];?> <span class="name2"> <?=$data[$p+$i]['company'];?></span></p> -->
							
								
									<tr>
										<td class="name1"><?=$data[$p+$i]['first_name'];?> <span class="name3"><?=$data[$p+$i]['last_name'];?></span></td>
										
										<td class="name2"> <?=$data[$p+$i]['company'];?></td>
										
									</tr>
													
												
												
												
											
								<?php endfor;?>
							</tbody>
						</table>
						
					</div>
					
				</div>

				
				
			</div>
		
	</div>

	<div class="page2" style="page-break-before: always;">
		<img src="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/generate_pdf/assets/pdf_gen/InnerLeft.jpg">

		<div class="page1_settings">
				<div class="container">
					<div class="setup">		
						<table style="border: none;">
							<tbody>
								<?php for($p=15; $p<30; $p++):
									if ( ! isset($data[$p+$i])) {
									   $data[$p+$i] = null;
									}
									?>
									<tr>
										<td class="name1"><?=$data[$p+$i]['first_name'];?> <span class="name3"><?=$data[$p+$i]['last_name'];?></span></td>
										
										<td class="name2"> <?=$data[$p+$i]['company'];?></td>
										
									</tr>		
								<?php endfor;?>
							</tbody>
						</table>
					</div>
					
				</div>

				
				
			</div>
		
	</div>
	<?php endfor;?>
		
	<div class="backpage" style="page-break-before: always;">
		<img src="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/generate_pdf/assets/pdf_gen/BackPage.jpg">
		
	</div>

</body>
</html>