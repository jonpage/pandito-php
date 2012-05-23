<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?><div id="google_translate_element"></div><script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    includedLanguages: 'ar,zh-CN,en,tl,iw,hi,ja,fa,es,th,tr,vi',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<h1>Exit Survey</h1>
<?php	echo validation_errors('<p class="error">','</p>'); ?>
	<?php
echo form_open('site/complete_survey');
?>
<div class="wide-fieldset">
	<fieldset>
<p>1) Which of the following (if any) affected your decisions?</p>
<input type="checkbox" name="affect[]" id="rel" value="religion" <?php echo set_checkbox('affect[]', 'religion'); ?> />
<?php
//echo form_checkbox(array('name' => 'affect', 'id' => 'rel', 'value' => 'religion', 'checked' => false));
echo form_label('Religion','rel');
echo " | ";
?>
<input type="checkbox" name="affect[]" id="race" value="race" <?php echo set_checkbox('affect[]', 'race'); ?> />
<?php
//echo form_checkbox(array('name' => 'affect', 'id' => 'race', 'value' => 'race', 'checked' => false));
echo form_label('Race/Ethnicity','race');
echo " | ";
?>
<input type="checkbox" name="affect[]" id="nat" value="nationality" <?php echo set_checkbox('affect[]', 'race'); ?> />
<?php
//echo form_checkbox(array('name' => 'affect', 'id' => 'nat', 'value' => 'nationality', 'checked' => false));
echo form_label('Nationality','nat');
?>
</fieldset>

<fieldset>
<p>2) I closely identify with being a member of my religious group. (Agree/Disagree)</p>
<input type="radio" name="religion_1" id="rel_1_sa" value="sa" <?php echo set_radio('religion_1', 'sa'); ?> />
<?php 
////echo form_radio(array('name' => 'religion_1', 'id' => 'rel_1_sa', 'value' => 'sa', 'checked' => false));
echo form_label('Strongly Agree','rel_1_sa');
echo "<br/>";
?>
<input type="radio" name="religion_1" id="rel_1_a" value="a" <?php echo set_radio('religion_1', 'a'); ?> />
<?php
////echo form_radio(array('name' => 'religion_1', 'id' => 'rel_1_a', 'value' => 'a', 'checked' => false));
echo form_label('Agree','rel_1_a'); 
echo "<br/>";
?>
<input type="radio" name="religion_1" id="rel_1_n" value="n" <?php echo set_radio('religion_1', 'n'); ?> />
<?php
////echo form_radio(array('name' => 'religion_1', 'id' => 'rel_1_n', 'value' => 'n', 'checked' => false));
echo form_label('Neither Agree/Disagree','rel_1_n'); 
echo "<br/>";
?>
<input type="radio" name="religion_1" id="rel_1_d" value="d" <?php echo set_radio('religion_1', 'd'); ?> />
<?php
////echo form_radio(array('name' => 'religion_1', 'id' => 'rel_1_d', 'value' => 'd', 'checked' => false));
echo form_label('Disagree','rel_1_d');
echo "<br/>";
?>
<input type="radio" name="religion_1" id="rel_1_sd" value="sd" <?php echo set_radio('religion_1', 'sd'); ?> />
<?php
////echo form_radio(array('name' => 'religion_1', 'id' => 'rel_1_sd', 'value' => 'sd', 'checked' => false));
echo form_label('Strongly Disagree','rel_1_sd'); 
?>

<p>3) I prefer to be with other people of the same religion as me. (Agree/Disagree)</p>
<input type="radio" name="religion_2" id="rel_2_sa" value="sa" <?php echo set_radio('religion_2', 'sa'); ?> />
<?php 
////echo form_radio(array('name' => 'religion_2', 'id' => 'rel_2_sa', 'value' => 'sa', 'checked' => false));
echo form_label('Strongly Agree','rel_2_sa');
echo "<br/>";
?>
<input type="radio" name="religion_2" id="rel_2_a" value="a" <?php echo set_radio('religion_2', 'a'); ?> />
<?php
////echo form_radio(array('name' => 'religion_2', 'id' => 'rel_2_a', 'value' => 'a', 'checked' => false));
echo form_label('Agree','rel_2_a'); 
echo "<br/>";
?>
<input type="radio" name="religion_2" id="rel_2_n" value="n" <?php echo set_radio('religion_2', 'n'); ?> />
<?php
//echo form_radio(array('name' => 'religion_2', 'id' => 'rel_2_n', 'value' => 'n', 'checked' => false));
echo form_label('Neither Agree/Disagree','rel_2_n'); 
echo "<br/>";
?>
<input type="radio" name="religion_2" id="rel_2_d" value="d" <?php echo set_radio('religion_2', 'd'); ?> />
<?php
//echo form_radio(array('name' => 'religion_2', 'id' => 'rel_2_d', 'value' => 'd', 'checked' => false));
echo form_label('Disagree','rel_2_d');
echo "<br/>";
?>
<input type="radio" name="religion_2" id="rel_2_sd" value="sd" <?php echo set_radio('religion_2', 'sd'); ?> />
<?php
//echo form_radio(array('name' => 'religion_2', 'id' => 'rel_2_sd', 'value' => 'sd', 'checked' => false));
echo form_label('Strongly Disagree','rel_2_sd'); 
?>

<p>4) How many Experimental Currency Units would you have given up to join a group with someone of your own religion?</p>
<?php echo form_input( array(
              'name'        => 'rel_amount',
              'id'          => 'rel_amount',
              'value'       => set_value('rel_amount', '0'),
              'maxlength'   => '5',
              'size'        => '5'
            )); ?>
</fieldset>

<fieldset>
<p>5) I closely identify with being a member of my race/ethnicity. (Agree/Disagree)</p>
<input type="radio" name="race_1" id="race_1_sa" value="sa" <?php echo set_radio('race_1', 'sa'); ?> />
<?php 
////echo form_radio(array('name' => 'race_1', 'id' => 'race_1_sa', 'value' => 'sa', 'checked' => false));
echo form_label('Strongly Agree','race_1_sa');
echo "<br/>";
?>
<input type="radio" name="race_1" id="race_1_a" value="a" <?php echo set_radio('race_1', 'a'); ?> />
<?php
//echo form_radio(array('name' => 'race_1', 'id' => 'race_1_a', 'value' => 'a', 'checked' => false));
echo form_label('Agree','race_1_a'); 
echo "<br/>";
?>
<input type="radio" name="race_1" id="race_1_n" value="n" <?php echo set_radio('race_1', 'n'); ?> />
<?php
//echo form_radio(array('name' => 'race_1', 'id' => 'race_1_n', 'value' => 'n', 'checked' => false));
echo form_label('Neither Agree/Disagree','race_1_n'); 
echo "<br/>";
?>
<input type="radio" name="race_1" id="race_1_d" value="d" <?php echo set_radio('race_1', 'd'); ?> />
<?php
//echo form_radio(array('name' => 'race_1', 'id' => 'race_1_d', 'value' => 'd', 'checked' => false));
echo form_label('Disagree','race_1_d');
echo "<br/>";
?>
<input type="radio" name="race_1" id="race_1_sd" value="sd" <?php echo set_radio('race_1', 'sd'); ?> />
<?php
//echo form_radio(array('name' => 'race_1', 'id' => 'race_1_sd', 'value' => 'sd', 'checked' => false));
echo form_label('Strongly Disagree','race_1_sd'); 
?>

<p>6) I prefer to be with other people of the same race/ethnicity as me. (Agree/Disagree)</p>
<input type="radio" name="race_2" id="race_2_sa" value="sa" <?php echo set_radio('race_2', 'sa'); ?> />
<?php 
////echo form_radio(array('name' => 'race_2', 'id' => 'race_2_sa', 'value' => 'sa', 'checked' => false));
echo form_label('Strongly Agree','race_2_sa');
echo "<br/>";
?>
<input type="radio" name="race_2" id="race_2_a" value="a" <?php echo set_radio('race_2', 'a'); ?> />
<?php
//echo form_radio(array('name' => 'race_2', 'id' => 'race_2_a', 'value' => 'a', 'checked' => false));
echo form_label('Agree','race_2_a'); 
echo "<br/>";
?>
<input type="radio" name="race_2" id="race_2_n" value="n" <?php echo set_radio('race_2', 'n'); ?> />
<?php
//echo form_radio(array('name' => 'race_2', 'id' => 'race_2_n', 'value' => 'n', 'checked' => false));
echo form_label('Neither Agree/Disagree','race_2_n'); 
echo "<br/>";
?>
<input type="radio" name="race_2" id="race_2_d" value="d" <?php echo set_radio('race_2', 'd'); ?> />
<?php
//echo form_radio(array('name' => 'race_2', 'id' => 'race_2_d', 'value' => 'd', 'checked' => false));
echo form_label('Disagree','race_2_d');
echo "<br/>";
?>
<input type="radio" name="race_2" id="race_2_sd" value="sd" <?php echo set_radio('race_2', 'sd'); ?> />
<?php
//echo form_radio(array('name' => 'race_2', 'id' => 'race_2_sd', 'value' => 'sd', 'checked' => false));
echo form_label('Strongly Disagree','race_2_sd'); 
?>

<p>7) How many Experimental Currency Units would you have given up to join a group with someone of your own race/ethnicity?</p>
<?php echo form_input( array(
              'name'        => 'race_amount',
              'id'          => 'race_amount',
              'value'       => set_value('race_amount', '0'),
              'maxlength'   => '5',
              'size'        => '5'
            )); ?>
</fieldset>

<fieldset>
<p>8) I closely identify with my nationality. (Agree/Disagree)</p>
<input type="radio" name="nationality_1" id="nat_1_sa" value="sa" <?php echo set_radio('nationality_1', 'sa'); ?> />
<?php 
////echo form_radio(array('name' => 'nationality_1', 'id' => 'nat_1_sa', 'value' => 'sa', 'checked' => false));
echo form_label('Strongly Agree','nat_1_sa');
echo "<br/>";
?>
<input type="radio" name="nationality_1" id="nat_1_a" value="a" <?php echo set_radio('nationality_1', 'a'); ?> />
<?php
//echo form_radio(array('name' => 'nationality_1', 'id' => 'nat_1_a', 'value' => 'a', 'checked' => false));
echo form_label('Agree','nat_1_a'); 
echo "<br/>";
?>
<input type="radio" name="nationality_1" id="nat_1_n" value="n" <?php echo set_radio('nationality_1', 'n'); ?> />
<?php
//echo form_radio(array('name' => 'nationality_1', 'id' => 'nat_1_n', 'value' => 'n', 'checked' => false));
echo form_label('Neither Agree/Disagree','nat_1_n'); 
echo "<br/>";
?>
<input type="radio" name="nationality_1" id="nat_1_d" value="d" <?php echo set_radio('nationality_1', 'd'); ?> />
<?php
//echo form_radio(array('name' => 'nationality_1', 'id' => 'nat_1_d', 'value' => 'd', 'checked' => false));
echo form_label('Disagree','nat_1_d');
echo "<br/>";
?>
<input type="radio" name="nationality_1" id="nat_1_sd" value="sd" <?php echo set_radio('nationality_1', 'sd'); ?> />
<?php
//echo form_radio(array('name' => 'nationality_1', 'id' => 'nat_1_sd', 'value' => 'sd', 'checked' => false));
echo form_label('Strongly Disagree','nat_1_sd'); 
?>

<p>9) I prefer to be with other people of the same nationality as me. (Agree/Disagree)</p>
<input type="radio" name="nationality_2" id="nat_2_sa" value="sa" <?php echo set_radio('nationality_2', 'sa'); ?> />
<?php 
////echo form_radio(array('name' => 'nationality_2', 'id' => 'nat_2_sa', 'value' => 'sa', 'checked' => false));
echo form_label('Strongly Agree','nat_2_sa');
echo "<br/>";
?>
<input type="radio" name="nationality_2" id="nat_2_a" value="a" <?php echo set_radio('nationality_2', 'a'); ?> />
<?php
//echo form_radio(array('name' => 'nationality_2', 'id' => 'nat_2_a', 'value' => 'a', 'checked' => false));
echo form_label('Agree','nat_2_a'); 
echo "<br/>";
?>
<input type="radio" name="nationality_2" id="nat_2_n" value="n" <?php echo set_radio('nationality_2', 'n'); ?> />
<?php
//echo form_radio(array('name' => 'nationality_2', 'id' => 'nat_2_n', 'value' => 'n', 'checked' => false));
echo form_label('Neither Agree/Disagree','nat_2_n'); 
echo "<br/>";
?>
<input type="radio" name="nationality_2" id="nat_2_d" value="d" <?php echo set_radio('nationality_2', 'd'); ?> />
<?php
//echo form_radio(array('name' => 'nationality_2', 'id' => 'nat_2_d', 'value' => 'd', 'checked' => false));
echo form_label('Disagree','nat_2_d');
echo "<br/>";
?>
<input type="radio" name="nationality_2" id="nat_2_sd" value="sd" <?php echo set_radio('nationality_2', 'sd'); ?> />
<?php
//echo form_radio(array('name' => 'nationality_2', 'id' => 'nat_2_sd', 'value' => 'sd', 'checked' => false));
echo form_label('Strongly Disagree','nat_2_sd'); 
?>
<p>10) How many Experimental Currency Units would you have given up to join a group with someone of your own nationality?</p>
<?php echo form_input( array(
              'name'        => 'nat_amount',
              'id'          => 'nat_amount',
              'value'       => set_value('nat_amount', '0'),
              'maxlength'   => '5',
              'size'        => '5'
            )); ?>
</fieldset>

<fieldset>
<p>11) What else influenced your decisions in the experiment(s)?</p>
<?php echo form_textarea( array(
              'name'        => 'free_resp',
              'id'          => 'free_resp',
              'value'       => set_value('free_resp', 'Type your response here.'),
              'rows'   => '5',
              'cols'        => '60'
            )); ?>
</fieldset>

<fieldset>
<?php echo form_submit('submit','Submit'); ?>
</fieldset>

</div>
<?php echo form_close(); ?>