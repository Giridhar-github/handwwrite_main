<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=No">
    <meta name="description" content="Start your development with Rubic landing page.">
    <meta name="author" content="Devcrud">
    <title>Output</title>
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
                        <a class="nav-link btn btn-primary text-dark shadow-none ml-md-4" href="index.php">Home</a>
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
				 <img src="input/test.jpg"></img>
				 
				     <h6 class="display-4 has-line">OUTPUT</h6>

				</div>
			</div>
			<?php
			
			$myfile = fopen("out.txt", "r") or die("Unable to open file!");
			$out=fread($myfile,filesize("out.txt"));
fclose($myfile);
$out=trim($out);

echo "<h2><center>$out</center></h2>";

//echo "<img src='.\sample\".$out.".jpg' alt='' width='45' height='32'>";//aa.jpg' alt='' width='45' height='32'>"
//echo "<img src='.\sample\aa.jpg' alt='' width='45' height='32'>";
echo "<center><img src='./sample/$out.jpg' alt='' width='45' height='32'></center>";

			
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
