<?php 
	foreach ($about as $key) {
		?>
			<div class="row">
				<div class="col-lg-9">
					<div class="tabbable">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="activity">
									<div class="timeline-container">
										<div class="timeline-row">
											<div class="panel panel-flat timeline-content">
												<div class="panel-heading">
													<h6 class="panel-title"><?php echo $key->judul; ?></h6>
													<div class="heading-elements">
														<ul class="icons-list">
									                		<li><a data-action="reload"></a></li>
									                	</ul>
								                	</div>
												</div>
												<div class="panel-body">
													<div class="chart-container">
														<div class="chart has-fixed-height" >
															<?php echo $key->deskripsi; ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<!-- User thumbnail -->
					<div class="thumbnail">
						<div class="thumb thumb-rounded thumb-slide">
							<img src="<?php echo base_url(); ?>assets/foto/<?php echo $key->foto; ?>" alt="">
							<div class="caption">
								<span>
									<a href="<?php echo base_url(); ?>assets/foto/<?php echo $key->foto; ?>" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
								</span>
							</div>
						</div>
				    	<div class="caption text-center">
				    		<h6 class="text-semibold no-margin"><?php echo ucwords($key->nama); ?> </h6>
				    		<span><?php echo $key->email ?></span><br>
				    		<span><?php echo $key->telepon ?></span>
				    	</div>
			    	</div>
			    	<!-- /user thumbnail -->
				</div>
			</div>
		<?php
	}
 ?>
