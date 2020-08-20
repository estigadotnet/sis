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
        <h2 style="margin-top:0px">D02_ssw <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Iddkls <?php echo form_error('iddkls') ?></label>
            <input type="text" class="form-control" name="iddkls" id="iddkls" placeholder="Iddkls" value="<?php echo $iddkls; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Idssw <?php echo form_error('idssw') ?></label>
            <input type="text" class="form-control" name="idssw" id="idssw" placeholder="Idssw" value="<?php echo $idssw; ?>" />
        </div>
	    <input type="hidden" name="iddssw" value="<?php echo $iddssw; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('d02_ssw') ?>" class="btn btn-default">Cancel</a>
	</form>
    <!-- </body>
</html> -->
