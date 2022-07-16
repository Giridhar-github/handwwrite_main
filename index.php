<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=No">
    <meta name="description" content="Start your development with Rubic landing page.">
    <meta name="author" content="Devcrud">
    <title>Rubic Landing page | Free Bootstrap 4.1 landing page</title>
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Rubic main styles -->
	<link rel="stylesheet" href="assets/css/rubic.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <nav id="scrollspy" class="navbar page-navbar navbar-dark navbar-expand-md fixed-top" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="navbar-brand" ><strong class="text-primary">RU</strong><span class="text-light">BIC</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    
                   
                    <li class="nav-item">

                    </li>
                </ul>
            </div>
        </div>
    </nav>
	
	
	<section class="section" id="contact" style="min-height:700px;">
        <div class="container ">
            <h6 class="display-4 has-line">Malayalam Character Recognition </h6>

			<div class="row h-100 align-items-center text-center">
				 <div class="col-md-12">
				 
				 
				     <h6 class="display-4 has-line">TESTING</h6>
					<form method="POST" enctype="multipart/form-data">
						 <div class="col-md-6">Upload Image</div>
						 <div class="col-md-6">	<input type="file" name="f1" class='form-control' required><br><br>	</div>
						<button type="submit" class="btn btn-primary btn-lg" name="test">Predict Now<br></button><br><br>	
					</form>
				</div>
			</div>
			<?php

			if(isset($_POST['test']))
			{
				move_uploaded_file($_FILES['f1']['tmp_name'],"input/test.jpg");
					$python = `python test.py`;
					#echo"<h3>OUTPUT</h3>";
					#echo"<h4><pre>$python</pre></h4>";
					header("location:output.php");
			}
		
			?>
			
		
			
        </div>
    </section>
	
    
	<?php
	include("footer.php");
	?>
	
	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <!-- bootstrap 3 affix -->
	<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Rubic js -->
    <script src="assets/js/rubic.js"></script>

</body>
</html>
