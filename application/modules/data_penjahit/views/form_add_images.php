<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Input Detail Images</h5>
		<div class="heading-elements">
			<ul class="icons-list">
        		<li><a data-action="collapse"></a></li>
        		<li><a data-action="reload"></a></li>
        		<li><a data-action="close"></a></li>
        	</ul>
    	</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>data_penjahit/process_add_images">
				<input type="hidden" name="penjahit_id" value="<?php echo $this->uri->segment(3); ?>">
				<fieldset class="content-group">
					<div class="form-group">
						<label class="control-label col-lg-3">Foto <span class="text-danger">*</span></label>
						<div class="col-lg-2">
							<input type="file" name="foto" class="file-styled" required="required">
						</div>
						<button type="submit" class="btn btn-success">Add <i class="icon-diff-added position-right"></i></button>
					</div>
			</form>
		</div>
		<div class="row">
		    <?php 
		    $i = $this->uri->segment(3);
		    	$x = $this->db->query("SELECT * FROM `t_detail_foto` WHERE penjahit_id = $i")->result();
		    	foreach ($x as $key) {
		    		?>
		    		<div class="col-lg-2">
				        <div class="thumbnail">
				            <div class="thumb">
				                <img src="<?php echo base_url() ?>assets/foto/<?php echo $key->foto; ?>" alt="">
				                <div class="caption-overflow">
				                    <span>
				                        <a href="<?php echo base_url() ?>assets/foto/<?php echo $key->foto; ?>" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-images2"></i></a>
				                        <a href="<?php echo base_url() ?>data_penjahit/delete_images/<?php echo $key->id.'/'.$i; ?>" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-cross"></i></a>
				                    </span>
				                </div>
				            </div>
				        </div>
				    </div>
		    		<?php
		    	}
		     ?>
		</div>
		<div class="row">
			<button onclick="window.location.href='<?php echo base_url(); ?>data_penjahit/detail_penjahit/<?php echo $this->uri->segment(3); ?>'" class="btn btn-primary"><i class="icon-zoomin3"></i>View Detail</button>
		</div>
	</div>
</div>