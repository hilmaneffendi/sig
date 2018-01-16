<div class="panel panel-flat">
<div class="panel-body">
    <div class="profile-cover">
        <div class="profile-cover-img">
            <div id="us2" style="width: 100%; height: 100%;"></div> 
        </div>
        <div class="media">
            <div class="media-left">
                <a href="#" class="profile-thumb">
                    <img src="<?php echo base_url();?>assets/foto/<?php echo $foto; ?>" class="img-circle" alt="">
                </a>
            </div>

            <div class="media-body">
                <h1 style="color: black"><?php echo $nama; ?> <small class="display-block" style="color: black"><?php echo $alamat; ?></small></h1>
            </div>
        </div>
    </div>
     <script>
        $('#us2').locationpicker({
            location: {
                latitude: <?php echo $latitude; ?>,
                longitude: <?php echo $longitude; ?>
            },
            radius: 300,
            inputBinding: {
                latitudeInput: $('#us2-lat'),
                longitudeInput: $('#us2-lon'),
                radiusInput: $('#us2-radius'),
                locationNameInput: $('#us2-address')
            },
            enableAutocomplete: true
        });
    </script>
</div>
</div>