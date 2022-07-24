<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=No">
    <meta name="description" content="Start your development with Rubic landing page.">
    <meta name="author" content="Devcrud">
    <title>Malayalam_Handwriting_Recognition</title>
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Rubic main styles -->
	<link rel="stylesheet" href="assets/css/rubic.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <nav id="scrollspy" class="navbar page-navbar navbar-dark navbar-expand-md fixed-top" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="navbar-brand" ><strong class="text-primary">Malayalam</strong><span class="text-light"> Handwriting Recognition</span></a>
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
	
	
	<section class="section" id="contact" style="min-height:700px;background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('./x1.jpg');height:100vh;background-size:cover;background-position:center">
        <div class="container ">
            <h6 class="display-4 has-line" style="color:snow">Malayalam Character Recognition </h6>
			
			<div class="row h-100 align-items-center text-center">
				 <div class="col-md-12">
				 
				 
				     <h6 class="display-4 has-line" style="color:snow">TESTING</h6>
					<form method="POST" enctype="multipart/form-data"><center>
						 <div class="col-md-6" style="color:snow">Upload Image</div><br>
						 <div class="col-md-6">	<input type="file" name="f1" class='form-control' required style="margin-left:180px;background:transparent;width:290px;border:none;color:snow"><br><br>	</div>
						<button type="submit" class="btn btn-primary btn-lg" name="test">Predict Now<br></button><br><br>	
					</form><center>
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
