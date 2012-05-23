<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */

// This page should display the user's available sessions
// and preferences

// use this to see if a session is open now
$this->load->helper('date');
$now = now();
//echo $now . "<br/>";
// 

if($this->session->userdata('is_logged_in')!=true){
	redirect('login/index');
} else {
	echo anchor('login/logout',"Logout");
	?>

<ul>
	<li>Read the Instructions: <?php 
	echo anchor('site/instructions',"Click Here",'target="_blank"'); 
	if($instructions==1){
		echo " - [COMPLETED]";
	}
	?></li>
	<li>Demo the Experiment: <a href=<?php echo "'http://wispt.com/test/index.php?email=" . $this->session->userdata('email') . "'"; ?> target="_blank">Click Here</a> - <?php if($demo==1){echo "[COMPLETED]";} ?></li>
	<?php 
	echo "<li>Complete the Quiz: ";
	echo anchor('site/quiz',"Click Here",'target="_blank"'); 
	if($quiz==1){
		echo " - [COMPLETED]";
	}
	echo "</li>";
	//var_dump($payments);
	
	// see if all "available" sessions are closed (i.e. they have been completed)
	$all_done = true;
	if($lab_times!==false){
		foreach ($lab_times as $time) {
			if(array_key_exists('closed', $time)){
				$unfinished = strpos($time['closed'],"0");
				if($unfinished!==false){
					$all_done = false;
				}
			} else {
				$all_done = false;
			}
		}
	}
	

	// only show exit link IF there are payments that do not have a corresponding exit survey
	// AND there are no experiments available to join (or wait till there are no (Available sessions))
	if($payments!=false && $all_done){
		?>
		<li>Complete the exit survey to receive your payout: <br/>
			- Number of experiments: <?php echo $payments['experiments']; ?><br/>
			- Payout (does not include participation fee): <?php echo $payments['total']; ?> Experimental Currency Units<br/>
			<?php echo anchor('site/exit_survey','Click Here'); ?>			
		</li><?php
	} elseif ($lab_times !== false){
		?>
		<li>Once all available sessions have closed, you will need to complete an exit survey. The link for the survey will appear here when it is available.
		<?php
	}
	?>
</ul>

	<?php
	//var_dump($instructions);
//	var_dump($demo);
if($instructions==1&&$demo==1&&$quiz==1){
	echo "<h2>Available experiments:</h2>";
	?>
<div class="schedule_container">
		<?php 
		//var_dump($lab_times);
		//var_dump($now);
	if($lab_times!==false){
		echo "<table style='margin-left:auto;margin-right:auto;'>";

		$first = true;
		foreach ($lab_times as $time) {

			$treatment_ids = explode(",",trim($time['treatment_ids'],"()"));
			$filtered_treatments = array();
			if(array_key_exists('closed',$time)){
				$closed_ids = explode(",",trim($time['closed'],"()"));
				foreach ($treatment_ids as $key => $value) {
					if(array_key_exists($value,$treatments)){
						$filtered_treatments[] = array("treat"=>$value,"closed"=>$closed_ids[$key]);
					}
				}
			} else {
				foreach ($treatment_ids as $key => $value) {
					if(array_key_exists($value,$treatments)){
						$filtered_treatments[] = array("treat"=>$value,"closed"=>0);
					}
				}
			}
			
			//echo "<br/>Treatment_IDs<br/>";
			//var_dump($treatment_ids);
			//echo "<br/>Treatments<br/>";
			//var_dump($treatments);
			

			if(count($filtered_treatments)>0){ // this treatment is available to the user

				$this_id = array_rand($filtered_treatments);
				?>
		<tr>
			<td><?php

				if($time['open_time']<$now && $filtered_treatments[$this_id]['closed'] == 0){
						echo anchor($treatments[intval($filtered_treatments[$this_id]['treat'])]['controller'] . "/index/" . $filtered_treatments[$this_id]['treat'],"Join");
				} elseif($time['open_time']<$now && $filtered_treatments[$this_id]['closed'] == 1) {
						echo anchor($treatments[intval($filtered_treatments[$this_id]['treat'])]['controller'] . "/index/" . $filtered_treatments[$this_id]['treat'],"Review") . " <strong>[Completed]</strong>";
				}

			?></td><td>OPEN: </td><td>
<script type="text/javascript">
	var open = new Date();
	open.setTime(<?php echo $time['open_time']; ?>000);
	document.write(open.toLocaleString());
</script>

			</td><td>
		</tr>
		<tr>
			<td></td><td>CLOSE: </td><td>
	
<script type="text/javascript">
	var close = new Date();
	close.setTime(<?php echo $time['close_time']; ?>000);
	document.write(close.toLocaleString());
</script>
			</td>
		</tr>
		<?php	
		echo "<tr><td></td><td></td><td style='text-align:center;'>-----</td></tr>";
		$first = false;
			}
		}
		echo "</table>";
	}
	
} else {
	echo "<h2>Finish the Instructions and the Demo to see available sessions.</h2>";
	?>


	<?php
}
		?>
</div>
<br/>
	<a href="mailto:jrpage@hawaii.edu?subject=PandoSupport">Support</a><br/>
<script type="text/JavaScript">
	<!--
	function timedRefresh(timeoutPeriod) {
		setTimeout("location.reload(true);",timeoutPeriod);
	}
	timedRefresh(30000);
	//   -->
	</script>
	<?php
	if(isset($admin)){
		if($admin===true){
			echo anchor('site/admin','Admin','target="_blank"');
		}
	}
	
	
	// display the available sessions
/*	
	echo "<table>";
	foreach ($treatments as $treatment_id => $treatment) {
		echo "<tr><td>Treatment (" . $treatment_id . ")</td><td>";
		if($treatment['played']){
			echo "played";
		} else {
			echo anchor($treatment['controller']."/index/".$treatment_id,"Join");
		}
		echo "</td></tr>"; 
	}
	echo "</table>";
*/
}