<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Edit Tentang Kami</h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
			<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>tentang_kami_admin/update_data">
			<?php  echo form_hidden('id',$id); ?>
			<fieldset class="content-group">
				<div class="form-group">
					<label class="control-label col-lg-3">Nama <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control" required="required" placeholder="Nama">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Email <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<input type="text" name="email" value="<?php echo $email; ?>" class="form-control" required="required" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Telepon <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<input type="text" name="telepon" value="<?php echo $telepon ?>"  class="form-control" placeholder="Telepon">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Deskripsi <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<textarea name="deskripsi" cols="40" rows="5" placeholder="Deskripsi" class="form-control" required="required"><?php echo $deskripsi ?></textarea>
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
				<button type="submit" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
			</div>
		</form>
	</div>
</div>