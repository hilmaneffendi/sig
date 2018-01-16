<script type="text/javascript">
	$(document).ready(function () {
    
    
	    $('#footer-time').text(getTime());
	    $('#footer-date').text(getDate());
	    setInterval(function () {
	        $('#footer-time').text(getTime());
	        $('#footer-date').text(getDate());
	    }, 1000);

	});

	function getDate() {
	    var result = moment().format('DD MMMM YYYY');
	    return result;
	}

	function getTime() {
	    var result = moment().format('hh:mm:ss A');
	    return result;
	}
</script>

<div class="panel panel-flat">
	<div class="table-responsive">
		<table class="table table-xlg text-nowrap">
			<tbody>
				<tr>
					<td class="col-md-3">
						<div class="media-left media-middle">
							<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-location4"></i></a>
						</div>
						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?php 
									echo $this->db->query('SELECT * FROM `t_penjahit`')->num_rows();

								 ?>	
								 <small class="display-block no-margin">Data Penjahit</small>
							</h5>
						</div>
					</td>
					<td class="col-md-3">
						<div class="media-left media-middle">
							<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-users2"></i></a>
						</div>
						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?php 
									echo $this->db->query('SELECT * FROM `t_penjahit` WHERE status_user =1')->num_rows();

								 ?>	
								<small class="display-block no-margin">Data User</small>
							</h5>
						</div>
					</td>
					<td class="col-md-3">
						<div class="media-left media-middle">
							<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-calendar3"></i></a>
						</div>
						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<?php echo date("j F Y"); ?><small class="display-block no-margin">Tanggal</small>
							</h5>
						</div>
					</td>
					<td class="col-md-3">
						<div class="media-left media-middle">
							<a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-xs btn-icon"><i class="icon-watch2"></i></a>
						</div>
						<div class="media-left">
							<h5 class="text-semibold no-margin">
								<span id="footer-time"></span> <small class="display-block no-margin">Jam</small>
							</h5>
						</div>
					</td>
				</tr>
			</tbody>
		</table>	
	</div>
</div>
