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
        <h2 style="margin-top:0px">Users Read</h2> -->
        <table class="table">
	    <tr><td>Ip Address</td><td><?php echo $ip_address; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Activation Selector</td><td><?php echo $activation_selector; ?></td></tr>
	    <tr><td>Activation Code</td><td><?php echo $activation_code; ?></td></tr>
	    <tr><td>Forgotten Password Selector</td><td><?php echo $forgotten_password_selector; ?></td></tr>
	    <tr><td>Forgotten Password Code</td><td><?php echo $forgotten_password_code; ?></td></tr>
	    <tr><td>Forgotten Password Time</td><td><?php echo $forgotten_password_time; ?></td></tr>
	    <tr><td>Remember Selector</td><td><?php echo $remember_selector; ?></td></tr>
	    <tr><td>Remember Code</td><td><?php echo $remember_code; ?></td></tr>
	    <tr><td>Created On</td><td><?php echo $created_on; ?></td></tr>
	    <tr><td>Last Login</td><td><?php echo $last_login; ?></td></tr>
	    <tr><td>Active</td><td><?php echo $active; ?></td></tr>
	    <tr><td>First Name</td><td><?php echo $first_name; ?></td></tr>
	    <tr><td>Last Name</td><td><?php echo $last_name; ?></td></tr>
	    <tr><td>Company</td><td><?php echo $company; ?></td></tr>
	    <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        <!-- </body>
</html> -->
