<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Data Penjahit</h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>
	<div class="panel-body">
	<button type="button" onclick="window.location.href='<?php echo base_url();?>data_penjahit/form_input'" class="btn bg-teal-400 btn-labeled"><b><i class="icon-user-plus"></i></b> Tambah Data</button>
	</div>
	<table class="table table-bordered table-hover datatable-highlight">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Foto</th>
				<th>Aalamat</th>
				<th>User</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$i = 0;
			foreach ($list_penjahit as $key) {
				if ($key['alamat'] != '') {
				$i++;	
					?>
						<tr>
							<td align="center"><?php echo $i; ?></td>
							<td align="left"><?php echo $key['nama']; ?></td>
							<td align="center"><img src="assets/foto/<?php echo $key['foto']; ?>" class="img-circle img-sm" alt=""></td>
							<td align="left"><?php echo $key['alamat']; ?></td>
							<td align="center">
								<?php 
									if ($key['status_user'] == 1) {
										?>
											<button type="button" onclick="window.location.href='javascript:void(0)'" class="btn btn-success btn-labeled btn-xs">
												<b><i class="icon-user-check"></i></b> User Aktif
											</button>
										<?php
									}else{
										?>
											<button type="button" onclick="window.location.href='<?php echo base_url(); ?>data_penjahit/form_user/<?php echo $key['user_id']; ?>'" class="btn btn-danger btn-labeled btn-xs">
												<b><i class="icon-user-cancel"></i></b> Non User
											</button>
										<?php
									}
								 ?>
							</td>
							<td class="text-center">
								<ul class="icons-list">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<i class="icon-menu9"></i>
										</a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="<?php echo base_url(); ?>data_penjahit/detail_penjahit/<?php echo $key['id']; ?>"><i class="icon-folder6"></i> Detail</a></li>
											<?php 
												if ($key['status_user'] !=0) {
													?>
														<li><a href="<?php echo base_url(); ?>data_penjahit/form_user/<?php echo $key['user_id']; ?>"><i class="icon-pencil5"></i> Edit User</a></li>
													<?php
												}
											 ?>
											<li><a href="<?php echo base_url(); ?>data_penjahit/edit_penjahit/<?php echo $key['id']; ?>"><i class="icon-database-edit2"></i> Edit Penjahit</a></li>
											<li><a href="<?php echo base_url(); ?>data_penjahit/hapus_penjahit/<?php echo $key['user_id']; ?>"><i class="icon-trash-alt"></i> Hapus</a></li>
										</ul>
									</li>
								</ul>
							</td>
						</tr>
					<?php
				}
			}
		 ?>
		</tbody>
	</table>
</div>
<!-- /highlighting rows and columns -->