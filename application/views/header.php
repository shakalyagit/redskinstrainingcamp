<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
	<title>Redskins Training Camp Registration</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/AdminLTE.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/superadmin.css">
	<!-- jQuery 2.1.4 -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.js"></script>
<script type="text/javascript">
  
  document.onreadystatechange = function () {
 var state = document.readyState
  //console.log("The State is------>" + state );
   
 if (state == 'uninitialized') {
 $("#myLoader").show();

 
    
 } else if (state == 'complete') {

     setTimeout(function(){
       
        $("#myLoader").hide();
      
     },1000);
 }
}
</script>	

<style type="text/css">

		.main-header .logo{

			overflow: visible;

		}

		.logo-lg

		{

			position: relative;



		}

		/*.sidebar { margin-top: 62px;}*/

		.layershadow{position: absolute;

			left: 17px;

			top: 0px;

			background: white;

			border-bottom-left-radius: 10%;

			border-bottom-right-radius: 10%;

			width: 175px;

			height: 130px;

			padding: 4px;

			box-shadow: 0px 0px 6px 0px rgba(0, 0, 0, 0.57);

		}

		.content-wrapper{padding-top: 18px;}

	</style>

</head>



<body class="hold-transition skin-blue sidebar-mini">
<div id="myLoader" class="myLoader"></div>
	<div class="wrapper new-wrapper">
		<header class="main-header custom-header">
			<!-- Logo -->
			<a href="<?php echo base_url(); ?>" class="logo">
				<span class="logo-lg"><img height="55" src="<?php echo base_url(); ?>assets/img/mobile_logo.png" class="pnglogo"> </span>
			</a>
			<nav class="navbar navbar-static-top nav-color" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle sdr" data-toggle="offcanvas" role="button">/
					<img src="<?php echo base_url(); ?>assets/img/sidebar-toggle-light.png">
				</a>
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu managemargin">
					<ul class="nav navbar-nav">
					<li class="dropdown notifications-menu">
						</li>

						<li class="dropdown notifications-menu">

							
							<?php
								$logged_in = $this->session->userdata('logged_in');
								$userName = $logged_in['userName']
							?>
							<a href="#" class="dropdown-toggle padding15" data-toggle="dropdown">
								<span style="color:black;" >Welcome <?php echo $userName; ?>! </span>
								<img src="<?php echo base_url(); ?>assets/img/login.png"> <i class="fa fa-angle-down" aria-hidden="true"></i>

							</a>
							<ul class="dropdown-menu">

								<li>

								<ul class="menu">

										<li>

											<a href="<?php echo base_url(); ?>dashboard/logout">

												<span class="flL"><i class="fa fa-sign-out text-red"></i>&nbsp;&nbsp;Log Out</span>

											</a>

										</li>

									</ul>

								</li>

							</ul>

						</li>

					</ul>

				</div>
			</nav>
			
		</header>
<!-- Left side column. contains the logo and sidebar -->