<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */

if($this->session->userdata('is_logged_in')!=true){
	redirect('login/index');
} else {
	// make sure to prompt for a confirmation before aborting a session.
	// $current[]['id']
	// $current[]['stage']
	// $current[]['round']
	// $current[]['proposer']
	// $current[]['members']['email']
	// $current[]['members']['agent_num']
	// $current[]['powers']
	// $current[]['controller']
	// $current[]['start_time']
	?>
	
<script type="text/javascript">
	function abort(id){
		var answer = confirm("Abort Session " + id + "?");
		if (answer){
			window.location = <?php echo '"' . site_url('site/abort/') . '/"'; ?> + id;
		}
		else{
			// do nothing
		}
	}
</script>

<?php echo anchor('site/userlist','User List','target="_blank"'); ?><br/>
<?php echo anchor('site/paymentlist','Payment List','target="_blank"'); ?>

<h1>Current Sessions</h1>
<table class="admin">
	<tr><th>Session ID</th><th>Stage (Round.Turn)</th><th>emails[agent_num]</th><th>Powers</th><th>Controller</th><th>Start_Time</th><th>ABORT</th></tr>
	<?php
	//var_dump($current);
	foreach ($current as $id => $session) {
		?>
	<tr>
		<td><?php echo $session['id']; ?></td>
		<td><?php 
			if(!array_key_exists('round', $session)){
				$session['round'] = 'not set';
			}
			if(!array_key_exists('proposer', $session)){
				$session['proposer'] = 'not set';
			}
			if(!array_key_exists('order', $session)){
				$session['order'] = 'not set';
			}
			echo $session['stage'] . " (" . $session['round'] . "." . ($session['proposer']+1) . ") - " . json_encode($session['order']); ?></td>
		<td><?php 
			echo "";
			$string = "";
			foreach ($session['members'] as $member) {
				$string = $string . "[" . ($member['agent_num']+1) . "] " . $member['email'] . "<br/>" . $member['nationality'] . ", " . $member['religion'] . "<br/>";
			}
			$string = rtrim($string,"<br/>");
			echo "$string";
		 ?></td>
		 <td><?php echo $session['powers']; ?></td>
		 <td><?php echo $session['controller'] ?></td>
		 <td  class='timestamp'>
		 	<?php echo $session['start_time']; ?>
		</td>
		<td><input style="color:red" type="button" onclick=<?php echo '"abort(' . $id . ')"'; ?> value="ABORT"></td>
	</tr>
		<?php
	}
	?>
	
</table>

<?php 
// $finished[]['id']
// $finished[]['stage']
// $finished[]['round']
// $finished[]['proposer']
// $finished[]['members']['email']
// $finished[]['members']['agent_num']
// $finished[]['members']['ai']
// $finished[]['powers']
// $finished[]['controller']
// $finished[]['end_time']
?>

<h1>Finished Sessions</h1>
<table class="admin">
	<tr><th>Session ID</th><th>Last Stage (Round.Turn)</th><th>emails[agent_num](%ai)</th><th>Powers</th><th>Treatment Controller</th><th>End Time</th></tr>
	<?php
	//var_dump($finished);
	foreach ($finished as $id => $session) {
		?>
	<tr>
		<td><?php echo $session['id']; ?></td>
		<td><?php echo $session['stage'] . " (" . $session['round'] . "." . ($session['proposer']+1) . ") - " . json_encode($session['order']); ?></td>
		<td><?php 
			echo "";
			$string = "";
			foreach ($session['members'] as $member) {
				$string = $string . "[" . ($member['agent_num']+1) . "] " . $member['email'] . " (" . $member['ai'] . "%)<br/>" . $member['nationality'] . ", " . $member['religion'] . "<br/>";
			}
			$string = rtrim($string,"<br/>");
			echo "$string";
		 ?></td>
		 <td><?php echo $session['powers']; ?></td>
		 <td><?php echo $session['controller'] ?></td>
		 <td  class='timestamp'>
		 	<?php echo $session['end_time']; ?>
		</td>
	</tr>
		<?php
	}
	?>
	
</table>

<h1>Schedule</h1>
<?php echo form_open('site/add_event',array('id' => 'schedform')); 
	$days = range(1,31);
	$months = range(1,12);
	$hours = range(0,23);
	$mins = range(0,59);
	$cur_day = date("j");
	$cur_month = date("n");
	//var_dump($schedule);
	?>
Add labtime: 
<input id="open" name="open" type="hidden" value="0"/>
<input id="close" name="close" type="hidden" value="0"/>

<?php 
	echo "OPEN - month: " . form_dropdown('month1',$months,$cur_month-1) . " day: " . form_dropdown('day1',$days,$cur_day-1);
	echo " hour: " . form_dropdown('hour1',$hours,1) . " minute: " . form_dropdown('min1',$mins,1) . " - ";
	echo "CLOSE - month: " . form_dropdown('month2',$months,$cur_month-1) . " day: " . form_dropdown('day2',$days,$cur_day-1);
	echo " hour: " . form_dropdown('hour2',$hours,1) . " minute: " . form_dropdown('min2',$mins,1) . " - ";
	echo form_submit('submit',"Add");
	echo form_close();
?>

<table class="admin">
	<tr><th>Open</th><th>Close</th><th>Controller</th><th>Powers</th><th>Characterstic</th><th>Allowed Types</th></tr>
	<?php 
	foreach ($schedule as $labtime) {
		echo "<tr><td class='timestamp'>" . $labtime['open'] . "</td><td class='timestamp'>" . $labtime['close'];
		echo "</td><td>";
		foreach ($labtime['treatments'] as $treatment) {
			echo $treatment['controller'] . "<br/>";
		}
		echo "</td><td>";
		foreach ($labtime['treatments'] as $treatment) {
			echo $treatment['powers'] . "<br/>";
		}
		echo "</td><td>";
		foreach ($labtime['treatments'] as $treatment) {
			if(array_key_exists('characteristic', $treatment)){
				echo $treatment['characteristic'] . "<br/>";
			} else {
				echo "<br/>";
			}
		}
		echo "</td><td>";
		foreach ($labtime['treatments'] as $treatment) {
			if(array_key_exists('allowed_types', $treatment)){
				echo $treatment['allowed_types'] . "<br/>";
			} else {
				echo "<br/>";
			}
		}
		echo "</td></tr>";
	}
	?>
</table>

<?php echo form_close(); ?>
<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var d=new Date();
		var n=d.toLocaleTimeString();
		var time = n.split(":");
		var hour = time[0]*1;
		var min = time[1]*1;
		
		$("#schedform select[name=hour1]").val(hour);
		$("#schedform select[name=hour2]").val(hour);
		$("#schedform select[name=min1]").val(min);
		$("#schedform select[name=min2]").val(min);

		$(".timestamp").each(function(){
			var timestamp = new Date();
			//alert($(this).text);
			timestamp.setTime($(this).text()*1000);
			$(this).html(timestamp.toLocaleString());
		});

		$("select").change(function(){
			var dOpen=new Date(2012,$("select[name=month1]").val(),$("select[name=day1]").val(),$("select[name=hour1]").val(),$("select[name=min1]").val());
			var dClose=new Date(2012,$("select[name=month2]").val(),$("select[name=day2]").val(),$("select[name=hour2]").val(),$("select[name=min2]").val());
			var timeOpen = dOpen.getTime();
			var timeClose = dClose.getTime();
			var localMil = dOpen.getTimezoneOffset()*60*1000;
			$("#open").val((timeOpen-localMil)/1000);
			$("#close").val((timeClose-localMil)/1000);
		});
	});
</script>
<?php
}?>