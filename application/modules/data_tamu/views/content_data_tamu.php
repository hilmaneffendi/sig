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
				<th>Nama</th>
				<th>Email</th>
				<th>Pesan</th>
				<th>Waktu</th>
				<th class="text-center">Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		$i = 0;
			foreach ($data_tamu as $key) {
			$i++;	
				?>
				<tr>
					<td align="center"><?php echo $i; ?></td>
					<td align="left"><?php echo $key->nama; ?></td>
					<td align="left"><?php echo $key->email; ?></td>
					<td align="left"><?php echo $key->pesan; ?></td>
					<td align="left"><?php echo $key->tanggal.' : '.$key->jam;; ?></td>
					<td class="text-center">
						<button type="button" onclick="window.location.href='<?php echo base_url(); ?>data_tamu/hapus/<?php echo $key->id; ?>'" class="btn btn-danger btn-labeled btn-xs">
							<b><i class="icon-trash"></i></b> Hapus
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