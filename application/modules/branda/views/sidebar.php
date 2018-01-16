<div class="sidebar-content">
	<div class="sidebar-category sidebar-category-visible">
		<div class="category-content no-padding">
			<ul class="navigation navigation-main navigation-accordion">
				<li class="navigation-header"><span>Menu</span> <i class="icon-menu" title="Main pages"></i></li>

				
				<li 
				<?php 
					if ($page == 'branda') {
						echo "class = active";
					}else{
						echo "";
					}
				 ?>
				><a href="<?php echo base_url();?>branda"><i class="icon-home4"></i> <span>Beranda</span></a></li>
				
				
				<li
				<?php 
					if ($page == 'lokasi_penjahit') {
						echo "class = active";
					}else{
						echo "";
					}
				 ?>
				><a href="<?php echo base_url();?>lokasi_penjahit"><i class="glyphicon glyphicon-map-marker"></i> <span>Lokasi Penjahit</span></a></li>
				<li
				<?php 
					if ($page == 'buku_tamu') {
						echo "class = active";
					}else{
						echo "";
					}
				 ?>
				><a href="<?php echo base_url();?>buku_tamu"><i class="glyphicon glyphicon-book"></i> <span>Buku Tamu</span></a></li>
				<li
				<?php 
					if ($page == 'tentang_kami') {
						echo "class = active";
					}else{
						echo "";
					}
				 ?>
				><a href="<?php echo base_url();?>tentang_kami"><i class="icon-user"></i> <span>Tentang Kami</span></a></li>
			</ul>
		</div>
	</div>
</div>