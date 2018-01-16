<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Jenis Mesin</h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
	<button type="button" onclick="window.location.href='<?php echo base_url();?>jenis_mesin/form_add'" class="btn bg-teal-400 btn-labeled"><b><i class="icon-user-plus"></i></b> Tambah Data</button>
	<br><br>
		 <table class="table table-bordered table-hover datatable-highlight">
		<thead>
			<tr>
				<th class="text-center">No</th>
				<th class="text-center">Jenis Mesin</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$i = 0;
			foreach ($data_pengguna as $key) {
			$i++;	
				?>
				<tr>
					<td align="center"><?php echo $i; ?></td>
					<td align="left"><?php echo $key->nama; ?></td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-menu9"></i>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="<?php echo base_url(); ?>jenis_mesin/edit/<?php echo $key->id; ?>"><i class="icon-database-edit2"></i> Edit</a></li>
									<li><a href="<?php echo base_url(); ?>jenis_mesin/hapus/<?php echo $key->id; ?>"><i class="icon-trash-alt"></i> Hapus</a></li>
								</ul>
							</li>
						</ul>
					</td>
				</tr>
				<?php
			}

		 ?>
			
		</tbody>
	</table>


		
	</div>
</div>