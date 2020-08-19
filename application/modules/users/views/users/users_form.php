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
        <h2 style="margin-top:0px">Users <?php echo $button ?></h2> -->
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Ip Address <?php echo form_error('ip_address') ?></label>
            <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Ip Address" value="<?php echo $ip_address; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Activation Selector <?php echo form_error('activation_selector') ?></label>
            <input type="text" class="form-control" name="activation_selector" id="activation_selector" placeholder="Activation Selector" value="<?php echo $activation_selector; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Activation Code <?php echo form_error('activation_code') ?></label>
            <input type="text" class="form-control" name="activation_code" id="activation_code" placeholder="Activation Code" value="<?php echo $activation_code; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Forgotten Password Selector <?php echo form_error('forgotten_password_selector') ?></label>
            <input type="text" class="form-control" name="forgotten_password_selector" id="forgotten_password_selector" placeholder="Forgotten Password Selector" value="<?php echo $forgotten_password_selector; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Forgotten Password Code <?php echo form_error('forgotten_password_code') ?></label>
            <input type="text" class="form-control" name="forgotten_password_code" id="forgotten_password_code" placeholder="Forgotten Password Code" value="<?php echo $forgotten_password_code; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Forgotten Password Time <?php echo form_error('forgotten_password_time') ?></label>
            <input type="text" class="form-control" name="forgotten_password_time" id="forgotten_password_time" placeholder="Forgotten Password Time" value="<?php echo $forgotten_password_time; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Remember Selector <?php echo form_error('remember_selector') ?></label>
            <input type="text" class="form-control" name="remember_selector" id="remember_selector" placeholder="Remember Selector" value="<?php echo $remember_selector; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Remember Code <?php echo form_error('remember_code') ?></label>
            <input type="text" class="form-control" name="remember_code" id="remember_code" placeholder="Remember Code" value="<?php echo $remember_code; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Created On <?php echo form_error('created_on') ?></label>
            <input type="text" class="form-control" name="created_on" id="created_on" placeholder="Created On" value="<?php echo $created_on; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Last Login <?php echo form_error('last_login') ?></label>
            <input type="text" class="form-control" name="last_login" id="last_login" placeholder="Last Login" value="<?php echo $last_login; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Active <?php echo form_error('active') ?></label>
            <input type="text" class="form-control" name="active" id="active" placeholder="Active" value="<?php echo $active; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">First Name <?php echo form_error('first_name') ?></label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Last Name <?php echo form_error('last_name') ?></label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Company <?php echo form_error('company') ?></label>
            <input type="text" class="form-control" name="company" id="company" placeholder="Company" value="<?php echo $company; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Phone <?php echo form_error('phone') ?></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
	</form>
    <!-- </body>
</html> -->
