<!-- <!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">S01_thaj <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">TahunAjaran <?php echo form_error('TahunAjaran') ?></label>
            <input type="text" class="form-control" name="TahunAjaran" id="TahunAjaran" placeholder="TahunAjaran" value="<?php echo $TahunAjaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">SaldoAwal <?php echo form_error('SaldoAwal') ?></label>
            <input type="text" class="form-control" name="SaldoAwal" id="SaldoAwal" placeholder="SaldoAwal" value="<?php echo $SaldoAwal; ?>" />
        </div>
	    <input type="hidden" name="idthaj" value="<?php echo $idthaj; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('s01_thaj') ?>" class="btn btn-default">Cancel</a>
	</form>
    <!-- </body>
</html> -->
