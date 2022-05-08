<!DOCTYPE html>
<html lang="en">
 <!-- Session   -->
 <?php 
	    session_start();
    
      if($_SESSION['status']!="login"){
        header("location:login.php");
      }
	    
	  ?>
	  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Potenza - Job Application Form Wizard with Resume upload and Branch feature">
    <meta name="author" content="Ansonika">
    <title>Daftar Dokumen | Pengamanan File</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
	
	<!-- MODERNIZR MENU -->
	<script src="js/modernizr.js"></script>

</head>

<body>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	
	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div>
	
	<nav>
		<ul class="cd-primary-nav">
			<li><a href="index.html" class="animated_link">Version 1</a></li>
			<li><a href="index-2.html" class="animated_link">Version 2</a></li>
			<li><a href="index-3.html" class="animated_link">Version 3</a></li>
			<li><a href="about.html" class="animated_link">About Us</a></li>
			<li><a href="contacts.html" class="animated_link">Contact Us</a></li>
			<li><a href="#0" class="animated_link">sPurchase Template</a></li>
		</ul>
	</nav>
	<!-- /menu -->
	
	<div class="container-fluid">
	    <div class="row row-height">
	        <div class="col-xl-4 col-lg-4 content-left">
	            <div class="content-left-wrapper">
	              
	                <!-- /social -->
	                <div>
						<a href="proses-logout.php" ><img src="img/power-off.png" alt="" width="45" height="45"></a>
	                    <figure><img src="img/info_graphic_1.svg" alt="" class="img-fluid" width="270" height="270"></figure>
	                    <h2>Pengamanan File</h2>
	                   
	                    <a href="enkripsi-file.php" class="btn_1 rounded yellow">Enkripsi Dokumen</a>
	                    <a href="dekripsi-file.php" class="btn_1 rounded yellow">Dekripsi Dokumen</a>
						
	                </div>
	                
	            </div>
	            <!-- /content-left-wrapper -->
	        </div>
	        <!-- /content-left -->
			
	        <div class="col-xl-8 col-lg-8 content-right" id="start">
				
	            <div style="margin-left:120px"> 
				<h2>Daftar Dokumen</h2>
				<br>   
				<?php 
					if(isset($_GET['m'])){
						if($_GET['m'] == "berhasil"){
							echo '<b style="color: red"><p>Dekripsi Berhasil!</p></b>';
						}else if($_GET['m'] == "gagal"){
							echo '<b style="color: red"><p>Dekripsi Gagal!</p></b>';
						}
					}
				?>
				<table id="table_id" class="display"> 
					<thead>
						<tr>
							<th>#</th>
							<th>File PDF</th>
							<th>Tipe File</th>
							<th>Ukuran File</th>
							<th>Lama Proses</th>
							<th>Status</th>
							<th>Action</th>
							
						</tr>
					</thead>

					<tbody>
						<?php
							include 'config/koneksi.php';
						

							$sql = "SELECT * FROM `tb_files` ORDER BY id_file ASC";
							$query = mysqli_query($connect, $sql);
						
							$no = 1;
							while ($row = mysqli_fetch_array($query)){
								echo '<tr>
										<td>'.$no.'</td>
										<td>'.$row['file'].'</td>
										<td>'.$row['tipe_file'].'</td>
										<td>'.$row['size'].' kb</td>
										<td>'.$row['waktu_enkripsi'].' detik	</td>
								';

										if($row['status']=='0'){
											echo '<td>Enkripsi</td>
												  <td><a href="files/'.$row['file'].'" class="btn_1 rounded green" target="_blank" download>Download</a></td>
											';
										}else if($row['status']=='1'){

											echo '<td>Dekripsi</td>
												  <td><a href="files/'.$row['file'].'" class="btn_1 rounded green" target="_blank" download>Download</a></td>		
											';
										}
										
								echo '<td><a href="proses-hapus.php?id='.$row['id_file'].'" class="btn_1 rounded green" >Hapus</a></td>		
								  ';				
                            	echo '</tr>';
								$no++;
							}

						?>	
					</tbody>

					</table>


	           
	            <!-- /Wizard container -->
				</div>			
			</div>
	        <!-- /content-right-->
	    </div>
	    <!-- /row-->
	</div>
	<!-- /container-fluid -->

	<div class="cd-overlay-nav">
		<span></span>
	</div>
	<!-- /cd-overlay-nav -->

	<div class="cd-overlay-content">
		<span></span>
	</div>
	<!-- /cd-overlay-content -->

	
	<!-- /menu button -->
	

	
	<!-- COMMON SCRIPTS -->
	<script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/common_scripts.min.js"></script>
	<script src="js/velocity.min.js"></script>
	<script src="js/common_functions.js"></script>
	<script src="js/file-validator.js"></script>

	<!-- Wizard script-->
	<script src="js/func_1.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready( function () {
    		$('#table_id').DataTable();
		} );
	</script>								
</body>
</html>