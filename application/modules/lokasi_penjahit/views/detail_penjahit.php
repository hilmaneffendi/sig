<script type="text/javascript">
        var centreGot = false;
</script>
<?php echo $map['js']; ?>
<div class="row">
    <div class="profile-cover">
        <div class="profile-cover-img">
            <?php echo $map['html']; ?>
        </div>
        <div class="media" style="background-color: rgba(0,0,0,0.3)">
            <div class="media-left">
                <div class="thumb">
                    <a href="<?php echo base_url() ?>#" class="profile-thumb">
                    <img src="<?php echo base_url() ?>assets/foto/<?php echo $foto; ?>" class="img-circle" alt="">
                </a>
                    <div class="caption-overflow">
                        <span>
                            <a href="<?php echo base_url() ?>assets/foto/<?php echo $foto; ?>" class="btn btn-flat border-white text-white btn-rounded btn-icon" data-popup="lightbox"><i class="icon-images2"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="media-body" >
                <h1 ><?php echo $nama; ?> <small class="display-block"><?php echo $alamat; ?></small></h1>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br>
<div class="panel panel-flat">
    <div class="panel-body">
        <h5 class="panel-title"> Detail Penjahit</h5>
    <hr>
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-lg-3"><b>Jenis Penjahit</b></label>
                    <div class="col-lg-9">:
                        <?php echo $nama_jenis; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-lg-3"><b>Jenis Mesin</b></label>
                    <div class="col-lg-9">:
                        <?php echo $nama_mesin; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-lg-3"><b>Jadwal Toko</b></label>
                    <div class="col-lg-9">:
                        <?php echo $jadwal_toko; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-lg-3"><b>Lama Pengerjaan</b></label>
                    <div class="col-lg-9">:
                        <?php echo $lama_pengerjaan; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-lg-3"><b>Info Harga</b></label>
                    <div class="col-lg-9">:
                        <?php echo $info_harga; ?>
                    </div>
                </div>
            </div>
        <hr>
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
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
             ?>
        </div>
    </div>
</div>
