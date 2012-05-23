<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?><div id="login_form">
	<h1>Login</h1>
	<?php 
	echo form_open('login/validate_credentials');
	echo $message;
	echo "Email:<br/>";
	echo form_input('email', '');
	echo "Password:<br/>";
	echo form_password('password','');
	echo form_submit('submit','Login');
	echo anchor('login/signup','Create Account');
	?>
</div>