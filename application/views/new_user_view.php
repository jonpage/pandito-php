<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */

if($success==true){
	echo "You have been registered. Check soon for your confirmation email.";
} else {
	echo "You have not been successfully registered.";
	echo "<br/>" . anchor('login/create_user');
}