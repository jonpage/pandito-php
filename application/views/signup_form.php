<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?><h1>Create an Account</h1>

<?php	echo validation_errors('<p class="error">','</p>'); ?>
<fieldset>
<legend>Account Setup</legend>

<?php 
echo form_open('login/create_user');
echo form_label('Email','email');
echo form_input('email',set_value('email'));
echo form_label('Confirm Email','email2');
echo form_input('email2',set_value('email2'));
echo form_label('Password','password');
echo form_password('password',set_value('password'));
echo form_label('Confirm Password','password2');
echo form_password('password2',set_value('password'));
?>

</fieldset>

<fieldset>
	<legend>Questionnaire</legend>
	<?php
		echo form_label('Nationality','nationality');
		echo "<br/>";
		$query = $this->db->query('SELECT DISTINCT `name` FROM `countries` ORDER BY `name`');
		$countries = array();
		$countries['Select One'] = 'Select One';
		if($query->num_rows()>0){
			foreach($query->result() as $row){
			   $countries[$row->name] = $row->name;
			}
		}
		echo form_dropdown('nationality', $countries, set_value('nationality'));
		echo "<br/>";

		echo form_label('Religious Affiliation','religion');
		echo "<br/>";
		$religions = array(
			'Select One'	=>	'Select One',
			'Agnostic'		=>	'Agnostic',
			'Atheist'		=>	'Atheist',
			'Buddhist'		=>	'Buddhist',
			'Christian'		=>	'Christian',
			'Hindu'			=>	'Hindu',
			'Jewish'		=>	'Jewish',
			'Muslim'		=>	'Muslim',
			'Other'			=>	'Other',			
			'Unaffiliated'	=>	'Unaffiliated'
		);
		echo form_dropdown('religion', $religions, set_value('religion'));
		echo "<br/>";

		echo form_label('Gender','gender');
		echo "<br/>";
		$gender = array(
			'Select One'	=>	'Select One',
			'Male' 			=>	'Male',
			'Female'		=>	'Female'
		);
		echo form_dropdown('gender', $gender, set_value('gender'));
		//echo "<br/>";

		//echo form_label('Ethnicity','ethnicity');
		//echo "<br/>";
		//echo form_input('ethnicity',set_value('ethnicity'));
	?>
</fieldset>

<fieldset style="border:none;">
	<?php 
	// reCAPTCHA
	//require_once('recaptchalib.php');
	//$publickey = "6LfZmM8SAAAAAFu_I52gxp1RKxa6zgKxiVD48_84";
	//echo recaptcha_get_html($publickey);
	//echo "<br/><br/>";
	echo form_submit('submit','Create Account');

	?>
	
</fieldset>


<?php echo form_close();