<div class="panel panel-flat">
	<div class="panel-body">
	    <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
	        <div class="carousel-inner">
	        <?php 
	        	$query = $this->db->query("SELECT * FROM `t_slider` ")->result();
	        	foreach ($query as $key) {
	        	?>
		            <div class="<?php echo $key->class; ?>">
		                <div class="container-fluid">
		                    <div class="row">
		                        <div class="col-md-3">
		                        	<div class="thumb">
										<img style="height: 250px; width: 350px" src="<?php echo base_url(); ?>assets/foto/<?php echo $key->foto; ?>" alt="">
										<div class="caption-overflow">
											<span>
												<a href="<?php echo base_url(); ?>assets/foto/<?php echo $key->foto; ?>" class="btn btn-flat border-white text-white btn-rounded btn-icon" data-popup="lightbox"><i class="icon-zoomin3"></i></a>
											</span>
										</div>
									</div>
		                        </div>
		                        <div class="col-md-9">
		                            <h2><?php echo $key->judul; ?></h2>
		                            <p><?php echo $key->keterangan; ?></p>
		                        </div>
		                    </div>
		                </div>            
		            </div> 
	        	<?php
	        	}
	         ?>
	            
	        </div>
	        <div class="controls">
	            <ul class="nav">
	            <?php 
		        	$query = $this->db->query("SELECT * FROM `t_slider` ")->result();
		        	foreach ($query as $key) {
		        		?>
			                <li data-target="#custom_carousel" data-slide-to="<?php echo $key->urut; ?>" 
			                <?php 
			                	if ($key->urut == 0) {
			                		echo "class=\"active\"";
			                	}else{
			                		echo "";
			                	}
			                 ?>
			                >
			                	<a href="#"><img style="height: 50px; width: 50px;" src="<?php echo base_url(); ?>assets/foto/<?php echo $key->foto; ?>">
			                		<small><?php echo $key->judul; ?></small>
			                	</a>
			                </li>
			                <?php
			        	}
			         ?>
	            </ul>
	        </div>
	    </div>
	</div>
</div>