<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Data Tamu</h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
		 <table class="table table-bordered table-hover datatable-highlight">
		<thead>
			<tr>
				<th>No</th>
				<th>Judul</th>
				<th>Keterangan</th>
				<th>Foto</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$i = 0;
			foreach ($slider as $key) {
			$i++;	
				?>
				<tr>
					<td align="center"><?php echo $i; ?></td>
					<td align="left"><?php echo $key->judul; ?></td>
					<td align="left"><?php echo $key->keterangan; ?></td>
					<td align="left"><!-- <img src="<?php echo $key->foto; ?>"> -->
						
								<div class="thumb">
									<img src="<?php echo base_url(); ?>assets/foto/<?php echo $key->foto; ?>" alt="">
									<div class="caption-overflow">
										<span>
											<a href="<?php echo base_url(); ?>assets/foto/<?php echo $key->foto; ?>" class="btn btn-flat border-white text-white btn-rounded btn-icon" data-popup="lightbox"><i class="icon-zoomin3"></i></a>
										</span>
									</div>
								</div>
					</td>
					<td class="text-center">
						<button type="button" onclick="window.location.href='<?php echo base_url(); ?>slider/edit_slider/<?php echo $key->id; ?>'" class="btn btn-primary btn-labeled btn-xs">
							<b><i class="icon-database-edit2"></i></b> Edit
						</button>
					</td>
				</tr>
				<?php
			}

		 ?>
			
		</tbody>
	</table>


		
	</div>
</div>