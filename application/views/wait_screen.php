<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */

/** 
 *	This file will use some combination of javascript, jQuery, or long-polling 
 *	to see when all participants are ready to move on to the next screen
 *	  
 *	For now, simply wait for the user to click continue
 */
$stage++;
echo "Thanks for waiting.<br/>";
echo anchor('session/active/'.$stage,'Continue'); 