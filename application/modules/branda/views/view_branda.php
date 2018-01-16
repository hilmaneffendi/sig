<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIG - PENJAHIT KOTA TASIKMALAYA</title>
	<link rel="icon" href="<?php echo base_url();?>assets/map.ico" type="image/gif" sizes="16x16">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/colors.css" rel="stylesheet" type="text/css">
	<link  href="<?php echo base_url();?>assets/css/slider.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/switch.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/form_validation.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/slider.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/components_thumbnails.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/media/fancybox.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/datatables_advanced.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/user_pages_team.js"></script>
	<!-- googlemap -->
	<script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyC8J0gLuSSz7iPCU7uURWYwygxXu03FOl8&sensor=false&libraries=places'></script>
    <script src="<?php echo base_url();?>assets/js/locationpicker.jquery.js"></script>
	
</head>
<body>
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo base_url();?>branda"><img src="<?php echo base_url();?>assets/images/logo_.png" alt=""></a>
			<ul class="nav navbar-nav pull-right visible-xs-block">
				<!-- login -->
				<li><a data-toggle="collapse" data-target="#navbar-mobile" class="collapsed" aria-expanded="false"><i class="icon-lock"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li>
					<a class="sidebar-control sidebar-main-toggle hidden-xs">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown" onclick="window.location.href='<?php echo base_url(); ?>login'">
					<i class="icon-key"></i>
						<span>Login</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="page-container">
		<div class="page-content">
			<div class="sidebar sidebar-main">
				<?php 
					$this->load->view('sidebar');
				 ?>
			</div>
			<div class="content-wrapper">
				<div class="page-header">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">SISTEM INFORMASI GEOGRAFIS</span> - Penjahit Kota Tasikmalaya</h4>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url();?>javascript:void(0)"><i class="<?php echo $icon; ?>"></i> <?php echo $menu; ?></a></li>
						</ul>
					</div>
				</div>
				<div class="content">
					<?php 
						$this->load->view($content);
					 ?>
					&copy; 2016. <a href="javascript:void(0)">SIG - Penjahit Kota Tasikmalaya</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
