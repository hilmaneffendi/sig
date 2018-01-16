<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Tambah Jenis Mesin</h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>

	<div class="panel-body">
			<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>jenis_mesin/proses_add">
			<fieldset class="content-group">
				<div class="form-group">
					<label class="control-label col-lg-3">Jenis Mesin <span class="text-danger">*</span></label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" required="required" placeholder="Jenis Mesin">
					</div>
				</div>
			</fieldset>

			
			<div class="text-right">
				<button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
				<button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
			</div>
		</form>
	</div>
</div>