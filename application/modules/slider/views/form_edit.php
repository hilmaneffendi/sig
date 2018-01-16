<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Edit Data Slider</h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
			<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>slider/update_data">
			<?php  echo form_hidden('id',$id); ?>
			<fieldset class="content-group">
				<div class="form-group">
					<label class="control-label col-lg-3">Judul <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<input type="text" name="judul" value="<?php echo $judul; ?>" class="form-control" required="required" placeholder="Nama">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Keterangan <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<textarea name="keterangan" cols="40" rows="5"  placeholder="Keterangan" class="form-control" required="required"><?php echo $keterangan; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Foto <span class="text-danger">*</span></label>
					<div class="col-lg-3">
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
					<label class="control-label col-lg-3"></label>
					<div class="col-lg-3">
						<input type="file" name="foto" class="file-styled" >
					</div>
				</div>
			</fieldset>

			
			<div class="text-right">
				<button onclick="history.go(-1)" class="btn btn-default" id="reset">Batal <i class="icon-cancel-square position-right"></i></button>
				<button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
			</div>
		</form>
	</div>
</div>