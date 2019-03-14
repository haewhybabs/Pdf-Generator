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
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style>
	  .coverpage{
	  	background: url('<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/pdf_generator/generate_pdf/assets/pdf_gen/CoverPage.jpg');
	  	height: 100%; 
	    background-position: center;
	    background-repeat: no-repeat;
	    background-size: contain;
	  }
	  body, html {
		  height: 100%;
	  }
	  .page1{
	  	background: url('<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/pdf_generator/generate_pdf/assets/pdf_gen/InnerLeft.jpg');
	  	height: 100%; 
	    background-position: center;
	    background-repeat: no-repeat;
	    background-size:  contain;

	  }

	  .page2{
	  	background: url('<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/pdf_generator/generate_pdf/assets/pdf_gen/innerRight.jpg');
	  	height: 100%; 
	    background-position: center;
	    background-repeat: no-repeat;
	    background-size: contain;

	  }
	  .backpage{

	  	background: url('<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/pdf_generator/generate_pdf/assets/pdf_gen/BackPage.jpg');
	  	height: 100%; 
	    background-position: center;
	    background-repeat: no-repeat;
	    background-size: contain;

	  }
	  .page1_settings{
	  	text-align: right;
	  	padding-top: 200px;

	  }
	  .page2_settings{
	  	text-align: left;
	  	padding-top: 200px;

	  }
	  .setup{
	  	text-align: justify;
	  	margin-left: 50%;
	  	margin-top: 180px;
	  }

	  .setin{
	  	text-align: justify;
	  	margin-left: 10%;
	  	margin-top: 180px;
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
</head>

	<body>
		<div class="coverpage">
			
		</div>

		<!-- Bring up your first loop man -->

		<?php for($i=0; $i<$total; $i+=30):?>
    
		<div class="page1" style="page-break-before: always;">
			<div class="page1_settings">
				<div class="container">
					<div class="setup">
						<table style="border: none;">
							<tbody>
								<?php for($p=0; $p<15; $p++):
									if ( ! isset($data[$p])) {
									   $data[$p] = null;
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
			<div class="page2_settings">
				<div class="container">
					<div class="setin">		
						<table style="border: none;">
							<tbody>
								<?php for($p=15; $p<30; $p++):
									if ( ! isset($data[$p])) {
									   $data[$p] = null;
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

		<!-- And this is the end of the loop boss-->

		<div class="backpage" style="page-break-before: always;">
			
		</div>
		


	</body>
</html>
