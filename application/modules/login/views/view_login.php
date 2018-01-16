<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN || SIG - Penjahit Kota Tasikmalaya</title>
	<link rel="icon" href="<?php echo base_url();?>assets/map.ico" type="image/gif" sizes="16x16">
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/switch.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/login.js"></script>
		<!-- /theme JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/pages/form_validation.js"></script>
</head>
<body class="login-cover">
	<!-- Page container -->
	<div class="page-container login-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Content area -->
				<div class="content">
					<!-- Tabbed form -->
					<div class="tabbable panel login-form width-400">
						<ul class="nav nav-tabs nav-justified">
							<li class="active"><a href="<?php echo base_url();?>#basic-tab1" data-toggle="tab"><h6><i class="icon-checkmark3 position-left"></i> Already a user?</h6></a></li>
							<li><a href="<?php echo base_url();?>#basic-tab2" data-toggle="tab"><h6><i class="icon-plus3 position-left"></i> Create an account</h6></a></li>
						</ul>
						<div class="tab-content panel-body">
							<div class="tab-pane fade in active" id="basic-tab1">
								<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>login/cek_login">
									<div class="text-center">
										<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
										<h5 class="content-group">Login to your account </h5>
									</div>
									<div class="form-group has-feedback has-feedback-left">
										<input type="text" class="form-control" placeholder="Username" name="username" required="required">
										<div class="form-control-feedback">
											<i class="icon-user text-muted"></i>
										</div>
									</div>
									<div class="form-group has-feedback has-feedback-left">
										<input type="password" class="form-control" placeholder="Password" name="password" required="required">
										<div class="form-control-feedback">
											<i class="icon-lock2 text-muted"></i>
										</div>
									</div>
									<div class="form-group">
										<button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
									</div>
									<button type="button" onclick="window.location.href='<?php echo base_url(); ?>'" class="btn btn-success btn-labeled btn-xs">
												<b><i class="icon-map"></i></b> Go Location
									</button>
								</form>
							</div>
							<div class="tab-pane fade" id="basic-tab2">
								<form method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>login/register">
									<div class="text-center">
										<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
										<h5 class="content-group">Create new account</h5>
									</div>
									<div class="form-group has-feedback has-feedback-left">
										<input type="text" class="form-control"  placeholder="Your name"  name="nama" required="required">
										<div class="form-control-feedback">
											<i class="icon-pencil7 text-muted"></i>
										</div>
									</div>
									<div class="form-group has-feedback has-feedback-left">
										<input type="text" class="form-control" placeholder="Your username"  name="username" required="required">
										<div class="form-control-feedback">
											<i class="icon-user-check text-muted"></i>
										</div>
									</div>
									<div class="form-group has-feedback has-feedback-left">
										<input type="password" class="form-control" placeholder="Create password"  name="password" required="required">
										<div class="form-control-feedback">
											<i class="icon-user-lock text-muted"></i>
										</div>
									</div>
									<div class="form-group has-feedback has-feedback-left">
										<input type="file" name="foto" class="file-styled" required="required">
									</div>
									<button type="submit" class="btn bg-indigo-400 btn-block">Register <i class="icon-circle-right2 position-right"></i></button>
								</form>
							</div>
						</div>
					</div>
					<!-- /tabbed form -->
					<!-- Footer -->
					<div class="footer text-white">
						&copy; 2016. <a href="javascript:void(0)">SIG - Penjahit Kota Tasikmalaya</a>
					</div>
					<!-- /footer -->
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->
</body>
</html>
