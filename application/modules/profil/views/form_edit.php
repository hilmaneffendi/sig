<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Edit Data Penjahit</h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
			<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>data_penjahit/update_data">
			<?php  echo form_hidden('id',$id); ?>
			<fieldset class="content-group">	
				<div class="form-group">
					<label class="control-label col-lg-3">Nama <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control" required="required" placeholder="Nama">
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
					<label class="control-label col-lg-3"></label>
					<div class="col-lg-2">
						<div class="thumbnail no-padding">
							<div class="thumb">
								<img src="<?php echo base_url();?>assets/foto/<?php echo $foto; ?>" alt="">
								<div class="caption-overflow">
									<span>
										<a href="<?php echo base_url();?>assets/foto/<?php echo $foto; ?>" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
									</span>
								</div>
							</div>
				    	</div>
					</div>
				</div>	
				<div class="form-group">
					<label class="control-label col-lg-3">Foto <span class="text-danger">*</span></label>
					<div class="col-lg-2">
						<input type="file" name="foto" class="file-styled" >
					</div>
				</div>



                <script>
                    $('#us2').locationpicker({
                        location: {
                            latitude: <?php echo $latitude; ?>,
                            longitude: <?php echo $longitude; ?>
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
				<button onclick="history.go(-1)" class="btn btn-default" id="reset">Batal <i class="icon-cancel-square position-right"></i></button>
				<button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
			</div>
		</form>
	</div>
</div>