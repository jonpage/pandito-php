<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?><html>
<head>
	<title>Results Stage</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style2.css" />
</head>
<body>
<?php


/**
 * Sorts coalitions in descending order of power
 * @param  array $coal1 [description]
 * @param  array $coal2 [description]
 * @return int
 */
function compare_coal_power($coal1,$coal2){
	// must return an integer
	$val = $coal1['power']-$coal2['power'];

	if($val>0){
		return -1;
	} elseif ($val<0) {
		return 1;
	} else {
		return 0;
	}
} 


$proposal_successful = true;
$json = json_decode($json,true);
if (isset($json['voters'])) {
	foreach ($json['voters'] as $voter) {
		if($json['votes'][$voter]==0){
			$proposal_successful = false;
		}
	}
}

 
if($proposal_successful){	
	
	$json['current_groups'] = $json['proposed_groups'];

}

// sort current groups so the first has the highest power
usort($json['current_groups'], 'compare_coal_power');

// determine current player's current payout
$current_payout = 0;
foreach ($json['current_groups'][0]['proportions'] as $agent => $value) {
	if ($agent == $agent_num) {
		//$current_payout = round($value*100);
		$current_payout = round(100/count($json['current_groups'][0]['proportions']));
	}
}


function legend($json){
	$legend_array = array();
	foreach ($json['charcolors'] as $key => $value) {
		$legend_array[$value] = $json['chars'][$key];
	}

	$legend = array_unique($legend_array);

	echo "<div class='legend'>";
	foreach ($legend as $key => $value) {
		echo "<div class='legend_element style_$key'>$value</div>";
	}
	echo "</div>";
}

/**
 * This returns a div for the agent badge
 * @param  array  $powers           		Powers array
 * @param  int  $id                   		Badge id
 * @param  boolean $current_player=false 	Is this the current player
 */
function agent_badge($json,$powers,$id,$current_player=false,$gray=false){
?>

<div class='agent_badge<?php
 		if ($current_player) {
	 		echo " current_player_char style_" . $json['charcolors'][$id];
	 	} else {
		 	echo " style_" . $json['charcolors'][$id];
		}
		if ($gray) {
			echo " gray";
		}
		?>'>
	<div class='badge_num'><?php echo ($id+1); ?></div>
	<div class='badge_tower_container'>
		<div class='tower_spacer' style="height:<?php echo ((.5-$powers[$id])*40+1); ?>px">&nbsp;</div>
		<div class='badge_tower' style="height:<?php echo ($powers[$id]*40); ?>px">&nbsp;</div>
	</div>
	<div class='badge_power'>(<?php echo round($powers[$id]*100); ?>)</div>
</div>

<?php
}

/**
 * This returns a div for a group badge
 * @param  array  $group          The coalition object
 * @param  int  $current_player Agent number of the current player
 * @param  boolean $winning=false  Indicator of winning
 */
function group_badge($json,$group,$current_player,$winning=false){
//var_dump($group['proportions']);
?>

<div class="group<?php if($winning) { echo " winning"; } ?>" style="margin:5px;">
	<?php
	if($winning){?>
		<img src=<?php echo '"' . base_url('img/dollar.png') . '"'; ?> width="64" style="float:left;margin:5px">
	<?php } else { ?>
		<img src=<?php echo '"' . base_url('img/no_dollar.png') . '"'; ?> width="64" style="float:left;margin:5px">
	<?php }
	arsort($group['proportions']);
	foreach ($group['proportions'] as $agent => $proportion) {

		$powers = array($agent=>($proportion*$group['power']));

		agent_badge($json,$powers,$agent,($agent==$current_player));
	}
	?>
</div><br />

<?php
}


/**
 * This function echos a timeline from session data
 * @return [type]
 */
function timeline($json){
	foreach ($json['order'] as $turn => $player) {
		if($player == $json['proposer']){
			$turn_class = " turn";
		} else {
			$turn_class = "";
		}
		if($player==$json['proposer']){
			echo "<div class='mini_mini_badge current_player_char$turn_class style_" . $json['charcolors'][$player] . "'>" . ($player+1) . "</div>";
		} else {
			echo "<div class='mini_mini_badge style_" . $json['charcolors'][$player] . "$turn_class'>" . ($player+1) . "</div>";
		}
	}
	echo " &nbsp; &nbsp; ";
	// display for rounds
	for ($i=1; $i <= 3; $i++) {
		if($json['proposer']==count($json['order'])&&$json['stage']=='results'){
			if($i<$json['round']){
				echo "<div class='round'>&nbsp;</div>";
			} else {
				echo "<div class='round future_round'>&nbsp;</div>";
			}
		} else {
			if($i<=$json['round']){
				echo "<div class='round'>&nbsp;</div>";
			} else {
				echo "<div class='round future_round'>&nbsp;</div>";
			}
		}
	}
}


	//echo "Coalition forms";
	//var_dump($_SESSION['active_proposal']);
	//echo "Proposer:";
	//var_dump($_SESSION['turn']);

//	$_SESSION['stage'] = 'propose';
	// display for case where coalition wins
?>

<div class="header">
<span class="header_text">Your Badge</span>
<?php echo '<div class="mini_badge header_badge current_player_char style_' . $json['charcolors'][$agent_num] . '">' . ($agent_num+1); ?></div>
<div class="header_spacer"></div>
<span class="header_text">Your Current Payout</span>
<div class="stats_left header_stats">C</div><div class="stats_right header_stats current_payout"><?php echo $current_payout; ?></div>
<div class="header_spacer"></div>
<span class="header_text">Timeline</span>
<?php
/* moved to seqsim_model
// don't increment on refresh
if($json['proposer'] == $json['order'][$json['turn']]){
	// increment turn, update stage, round (if appropriate)
	if($json['turn']+1>=$num_agents){
		// reset turn to 0
		$json['turn'] = 0;
		$json['round'] = $json['round'] + 1;
	} else {
		$json['turn'] = $json['turn'] + 1;
	}
}
*/
//$_SESSION['stage'] = 'propose';

//$_SESSION['current_coalition'] =  $_SESSION['active_proposal'];

?>
<div class='timeline'><?php timeline($json,$agent_num); ?></div>
</div>

<div class="left_col">
	<?php if (isset($json['voters'])) { ?>
	<h1>Votes</h1><br/>
	<?php  //var_dump($_SESSION['votes']); ?>
	<table style="text-align:center;display:inline-block;">
		<tr>
			<?php 
			$counter = 0;

			foreach ($json['votes'] as $agent => $vote) {
			
				if($counter==3){
					echo "</tr><tr>";
				}
				echo "<td>";
				if($agent==$agent_num){
					agent_badge($json,$json['powers'],$agent,true);
					//echo "<td><div class='mini_badge current_player' style='float:none;display:inline-block'>" . ($agent+1) . "</div></td>";
				} else {
					agent_badge($json,$json['powers'],$agent,false);
					//echo "<td><div class='mini_badge style_" . ($agent+1) . "' style='float:none;display:inline-block'>" . ($agent+1) . "</div></td>";
				}

				if($vote!=0){
					echo "<br /><button class='yes_button no_pointer button_shadow'>Yes</button>";
				} else {
					echo "<br /><button class='no_button no_pointer button_shadow'>No</button>";
				}

				echo "</td>";
				$counter = $counter + 1;
			
				
			}
			
			?>
		</tr>
	</table>
	<?php }?>
	<br/>
	<h1>Proposed By</h1><br/>
	<div style='display:inline-block'>
	<?php 
	if($json['proposer']==$agent_num){
						agent_badge($json,$json['powers'],$json['proposer'],true);
						//echo "<td><div class='mini_badge current_player' style='float:none;display:inline-block'>" . ($agent+1) . "</div></td>";
					} else {
						agent_badge($json,$json['powers'],$json['proposer'],false);
						//echo "<td><div class='mini_badge style_" . ($agent+1) . "' style='float:none;display:inline-block'>" . ($agent+1) . "</div></td>";
					}
	?>
	</div>

	<?php  legend($json);  ?>
</div>

<div class="center_col">
	<h3>Results Stage</h3>
	<h1>New Groups</h1><br/>
<?php 
$win = true;
foreach ($json['current_groups'] as $group) {
	group_badge($json,$group,$agent_num,$win);
	$win = false;
}
?>

	<?php 
	if($proposal_successful){
		echo "<h2>The proposal was accepted.</h2>";
	} else {
		echo "<h2>The proposal was rejected.</h2>";
	} 
	?>
</div>



<div class="right_col">
	<?php //var_dump($_SESSION['coals'][0]); ?>
<br /><br /><br /><br />

<br /><br />
<?php if($json['round']<=3){ ?>
Next Turn: <div class="mini_badge <?php 
if($json['order'][$json['turn']]==$agent_num){
	echo "current_player_char ";
}
echo "style_" . $json['charcolors'][$json['order'][$json['turn']]] . " "; 
?>button_shadow" style="float:none;display:inline-block;vertical-align:middle;"><?php echo ($json['order'][$json['turn']]+1); ?></div>
<?php } ?>
<br /><br /><br />
<?php if($json['round']<=3 && !$cycle){ ?>
<button class="continue_button yes_button hover">Continue</button>
<?php } else { ?>
<button class="review_button yes_button hover">Review Payout</button>
<?php } ?>
</div>

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<!-- originally from http://www.phpied.com/rgb-color-parser-in-javascript/ -->
<script type="text/javascript" src="js/rgbcolor.js"></script>
<script>window.jQuery || document.write('<script src="' + <?php echo "'" . base_url() . "'"; ?> + '/js/jquery-1.6.2.min.js"><\/script>')</script>


<script type="text/javascript">
	var t;
	function check_wait(){
		$.getScript(<?php echo '"' . site_url('seqsimchareq/timerjs/' . $treatment_id) . '"'; ?>);
	}

	$(document).ready(function(){
		
		$.ajaxSetup({
		  cache: true
		});
		
		t = setTimeout('check_wait()',1000);
		
	// animate hovering over a button
		$('button.hover').hover(function(){
			$(this).addClass('button_shadow');
		},function(){
			$(this).removeClass('button_shadow');
		});

		$('button.continue_button').click(function(){
			<?php echo 'window.location = "' . site_url('seqsimchareq/results_wait/' . $treatment_id) . '";';?>
			//$('.header_spacer:first').load(<?php echo "'" . site_url('seqsimchareq/results_wait/' . $treatment_id . "'");?>);
		});

		$('button.review_button').click(function(){
			<?php echo 'window.location = "' . site_url('seqsimchareq/review/' . $treatment_id) . '";';?>
		});
});
</script>
</body>
</html>