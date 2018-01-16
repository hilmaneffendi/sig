
<script type="text/javascript">
        var centreGot = false;
    </script>
    <?php echo $map['js']; ?>
    <div class="profile-cover">
    <div class="profile-cover-img">
        <?php echo $map['html']; ?>
    </div>
    <div class="media" style="background-color: rgba(0,0,0,0.3)">
        <div class="media-left">
            <div class="thumb">
                <a href="#" class="profile-thumb">
                <img src="<?php echo base_url();?>assets/foto/<?php echo $foto; ?>" class="img-circle" alt="">
            </a>
                <div class="caption-overflow">
                    <span>
                        <a href="<?php echo base_url(); ?>assets/foto/<?php echo $foto; ?>" class="btn btn-flat border-white text-white btn-rounded btn-icon" data-popup="lightbox"><i class="icon-zoomin3"></i></a>
                    </span>
                </div>
            </div>
        </div>

        <div class="media-body" >
            <h1 ><?php echo $nama; ?> <small class="display-block"><?php echo $alamat; ?></small></h1>
        </div>
    </div>
</div>