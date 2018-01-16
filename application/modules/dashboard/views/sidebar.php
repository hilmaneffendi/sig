<?php
	$query 		= $this->db->get_where('t_member',array('user_id'=>$this->session->userdata('user_id')));
	$rowx 		= $query->row();
	$foto   	= $rowx->foto;    
	$nama   	= $rowx->nama;
	$level 		= $rowx->level;
	$username 	= $rowx->username;
?>
<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo base_url();?>dashboard"><img src="<?php echo base_url();?>assets/images/logo_.png" alt=""></a>
			<ul class="nav navbar-nav pull-right visible-xs-block">
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
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url();?>assets/foto/<?php echo $foto; ?>" alt="">
						<span><?php echo ucwords($nama); ?></span>
						<i class="caret"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?php echo base_url();?>profil"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="<?php echo base_url();?>dashboard/logout"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="page-container">
		<div class="page-content">
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="javascript:void(0)" class="media-left"><img src="<?php echo base_url();?>assets/foto/<?php echo $foto; ?>" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo ucwords($nama); ?></span>
									<div class="text-size-mini text-muted">
									<?php 
										if ($level !=0) {
											echo "Admin";
										}else{
											echo "User";
										}
									?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
								<li class="navigation-header"><span>Menu</span> <i class="icon-menu" title="Main pages"></i></li>
								<?php 
									if ($level == 1) {
										?>
											<li 
								<?php 
									if ($page == 'dashboard') {
										echo "class = 'active'";
									}else{
										echo "";
									}
								 ?>
								><a href="<?php echo base_url();?>dashboard"><i class="icon-home4"></i> <span> Dashboard</span></a></li>
								<li
								<?php 
									if ($page == 'profil') {
										echo "class = 'active'";
									}else{
										echo "";
									}
								 ?>
								><a href="<?php echo base_url();?>profil"><i class="icon-users"></i> <span> Profil</span></a></li>
								<li
								<?php 
									if ($page == 'jenis_penjahit' || $page == 'jenis_mesin') {
										echo "class = 'active'";
									}else{
										echo "";
									}
								 ?>
								>
									<a href="#" class="has-ul"><i class="icon-images2"></i> <span>Referensi Data</span></a>
									<ul 
									<?php 
										if ($page == 'jenis_penjahit' || $page == 'jenis_mesin') {
											echo "";
										}else{
											echo "class='hidden-ul' style='display: none;'";
										}
									 ?>
									>
										<li
										<?php 
											if ($page == 'jenis_penjahit') {
												echo "class = 'active'";
											}else{
												echo "";
											}
										 ?>
								 		><a href="jenis_penjahit">Jenis Penjahit</a></li>
										<li
										<?php 
											if ($page == 'jenis_mesin') {
												echo "class = 'active'";
											}else{
												echo "";
											}
										 ?>
								 		><a href="jenis_mesin">Jenis Mesin</a></li>
									</ul>
								</li>
								<li
								<?php 
									if ($page == 'slider') {
										echo "class = 'active'";
									}else{
										echo "";
									}
								 ?>
								><a href="<?php echo base_url();?>slider"><i class="icon-image-compare"></i> <span> Slider</span></a></li>
								<li
								<?php 
									if ($page == 'data_pengguna') {
										echo "class = 'active'";
									}else{
										echo "";
									}
								 ?>
								><a href="<?php echo base_url();?>data_pengguna"><i class="icon-users2"></i> <span> Data Pengguna</span></a></li>
								<li
								<?php 
									if ($page == 'data_penjahit') {
										echo "class = 'active'";
									}else{
										echo "";
									}
								 ?>
								><a href="<?php echo base_url();?>data_penjahit"><i class="icon-database4"></i> <span> Data Penjahit</span></a></li>
								<li
								<?php 
									if ($page == 'data_tamu') {
										echo "class = 'active'";
									}else{
										echo "";
									}
								 ?>
								><a href="<?php echo base_url();?>data_tamu"><i class="glyphicon glyphicon-book"></i> <span> Data Tamu</span></a></li>
								<li
								<?php 
									if ($page == 'tentang_kami_admin') {
										echo "class = 'active'";
									}else{
										echo "";
									}
								 ?>
								><a href="<?php echo base_url();?>tentang_kami_admin"><i class="icon-user"></i> <span> Tentang Kami</span></a></li>
										<?php
									}else{
										?>
											<li
								<?php 
									if ($page == 'profil') {
										echo "class = 'active'";
									}else{
										echo "";
									}
								 ?>
								><a href="<?php echo base_url();?>profil"><i class="icon-users"></i> <span> Profil</span></a></li>
								<li
								<?php 
									if ($page == 'lokasi_user') {
										echo "class = 'active'";
									}else{
										echo "";
									}
								 ?>
								><a href="<?php echo base_url();?>lokasi_user"><i class="icon-location3"></i> <span> Lokasi</span></a></li>
										<?php
									}
								 ?>
							</ul>
						</div>
					</div>
				</div>