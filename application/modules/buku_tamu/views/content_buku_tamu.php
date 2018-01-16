<div class="panel panel-flat">
<div class="panel-heading">
<h5 class="panel-title">Input Kritik & Saran</h5>
<div class="heading-elements">
<ul class="icons-list">
<li><a data-action="collapse"></a></li>
<li><a data-action="reload"></a></li>
<li><a data-action="close"></a></li>
</ul>
</div>
</div>
<div class="panel-body">
<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>buku_tamu/process_input">
<fieldset class="content-group">
<legend class="text-bold"></legend>
<div class="form-group">
<label class="control-label col-lg-2">Nama *</label>
<div class="col-lg-10">
<input type="text" name="nama" class="form-control" required="required" placeholder="Nama">
</div>
</div>
<div class="form-group">
<label class="control-label col-lg-2">Email *</label>
<div class="col-lg-10">
<input type="email" name="email" class="form-control" required="required" placeholder="Email">
</div>
</div>
<div class="form-group">
<label class="control-label col-lg-2">Pesan *</label>
<div class="col-lg-10">
<textarea name="pesan" cols="40" rows="5" placeholder="Pesan" class="form-control" required="required"></textarea>
</div>
</div>
<div class="row">
<div class="col-xs-6">
</div>
<div class="col-xs-6 text-right">
<button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-circle-right2"></i></b> Send</button>
</div>
</div>
</fieldset>
</form>
</div>
</div>
<?php
foreach ($buku_tamu as $key) {
?>
<div class="timeline timeline-left content-group">
<div class="timeline-container">
<div class="timeline-row">
<div class="timeline-icon">
<div class="bg-info-400">
<i class="icon-comments"></i>
</div>
</div>
<div class="panel panel-flat timeline-content">
<div class="panel-heading">
<b><?php echo html_entity_decode($key->nama); ?> - </b> <i><?php echo $key->email; ?> </i>
</div>
<div class="panel-body">
<ul class="media-list chat-list content-group">
<li class="media reversed">
<div class="media-body">
<div class="media-content"><?php echo $key->pesan; ?></div>
<span class="media-annotation display-block mt-10">
<?php echo date('d F Y',strtotime($key->tanggal)) ; ?>
<a href="#"><i class="icon-calendar2"></i></a>
</span>
<span class="media-annotation display-block mt-10">
<?php echo $key->jam; ?>
<a href="#"><i class="icon-watch2"></i></a>
</span>
</div>
<div class="media-right">
<a href="javascript:void(0)">
<img src="assets/foto/fb.png" class="img-circle" alt="">
</a>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<?php
}
?>