<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Input Data Penjahit</h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>
	<div class="panel-body">
			<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>data_penjahit/insert_data">
			<fieldset class="content-group">
				<div class="form-group">
					<label class="control-label col-lg-3">Nama <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" required="required" placeholder="Nama">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Jenis Penjahit <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<select name="jenis_penjahit" class="form-control" required="required">
                            <option value="">Pilih</option>
                            <?php 
                            	$p = $this->db->query("SELECT * FROM `t_jenis_penjahit` ")->result();
                            	foreach ($p as $key) {
                            		?>
                            			<option value="<?php echo $key->id; ?>"><?php echo $key->nama; ?></option>
                            		<?php
                            	}
                             ?>
                        </select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Jenis Mesin <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<select name="jenis_mesin" class="form-control">
                            <option value="">Pilih</option>
                            <?php 
                            	$p = $this->db->query("SELECT * FROM `t_jenis_mesin` ")->result();
                            	foreach ($p as $key) {
                            		?>
                            			<option value="<?php echo $key->id; ?>"><?php echo $key->nama; ?></option>
                            		<?php
                            	}
                             ?>
                        </select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Jadwal Toko <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<input type="text" name="jadwal_toko" class="form-control" required="required" placeholder="Jadwal Toko">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Lama Pengerjaan <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<input type="text" name="lama_pengerjaan" class="form-control" required="required" placeholder="Lama Pengerjaan">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Info Harga <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<input type="text" name="info_harga" class="form-control" required="required" placeholder="Info Harga">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Alamat <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<input type="text" name="alamat" id="us2-address"  class="form-control" required="required" placeholder="Alamat">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3"> </label>
					<div class="col-lg-9">
						<div class="panel panel-flat">
							<div id="us2" style="width: 100%; height: 500px;"></div> 
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Latitude <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<input type="text" name="latitude" id="us2-lat"  class="form-control" required="required" placeholder="Latitude">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Longitude <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<input type="text" name="longitude"  id="us2-lon"  class="form-control" required="required" placeholder="Longitude">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Foto <span class="text-danger">*</span></label>
					<div class="col-lg-2">
						<input type="file" name="foto" class="file-styled" required="required">
					</div>
				</div>
                <script>
                    $('#us2').locationpicker({
                        location: {
                            latitude: -7.359738,
                            longitude: 108.162712
                        },
                        radius: 300,
                        inputBinding: {
                            latitudeInput: $('#us2-lat'),
                            longitudeInput: $('#us2-lon'),
                            radiusInput: $('#us2-radius'),
                            locationNameInput: $('#us2-address')
                        },
                        enableAutocomplete: true
                    });
                </script>
			</fieldset>
			<div class="text-right">
				<button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
				<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
			</div>
		</form>
	</div>
</div>