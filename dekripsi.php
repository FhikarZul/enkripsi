<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Potenza - Job Application Form Wizard with Resume upload and Branch feature">
    <meta name="author" content="Ansonika">
    <title>Kunci | Pengamanan File</title>

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

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">
	
	<!-- MODERNIZR MENU -->
	<script src="js/modernizr.js"></script>

</head>

<body>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->
	
	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div><!-- /loader_form -->
	
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
	              
	                <div id="social">
	          
	                </div>
	                <!-- /social -->
	                <div>
					<a href="proses-logout.php" ><img src="img/power-off.png" alt="" width="45" height="45"></a>
						<br>
						<br>
	                    <figure><img src="img/key.png" alt="" class="img-fluid" width="270" height="270"></figure>
	                    <h2>Pengamanan File</h2>
	                   
	                    <a href="index.php" class="btn_1 rounded yellow">Daftar Dokumen</a>
						
						<a href="index.php" class="btn_1 rounded mobile_btn yellow">Daftar Dokumen</a>
	                </div>
	                
	            </div>
	            <!-- /content-left-wrapper -->
	        </div>
	        <!-- /content-left -->
	        <div class="col-xl-8 col-lg-8 content-right" id="start">
	            <div id="wizard_container">

					<?php
						$id_file = $_GET['id'];
					
	                
	                echo '<form action="proses-dekripsi.php?id='.$id_file.'" method="post" enctype="multipart/form-data">';

					?> 
	                    <!-- Leave for security protection, read docs for details -->
	                    <div>
	                        <div>
	                            <h2 class="section_title">Masukkan Kunci</h2>
								
								<?php 
									if(isset($_GET['m'])){
										if($_GET['m'] == "berhasil"){
											
										}else if($_GET['m'] == "gagal"){
											echo '<b style="color: red"><p>Kunci Salah!</p></b>';
										}
									}
								?>


	                            <div class="form-group add_top_30">
	                                <label for="name">Kunci</label>
	                                <input type="text" name="kunci" id="name" class="form-control required" required>
	                            </div>

	                            
								
								<br>
	                            <button type="submit" class="btn_1 rounded green">Lanjut Dekripsi</button>
	                        </div>
	                        <!-- /step-->
							
							

	                    </div>
	                    <!-- /middle-wizard -->
	                    
	                </form>
	            </div>
	            <!-- /Wizard container -->
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

	
	
	<!-- COMMON SCRIPTS -->
	<script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/common_scripts.min.js"></script>
	<script src="js/velocity.min.js"></script>
	<script src="js/common_functions.js"></script>
	<script src="js/file-validator.js"></script>

	<!-- Wizard script-->
	<script src="js/func_1.js"></script>

</body>
</html>