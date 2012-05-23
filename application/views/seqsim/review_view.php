<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?><html>
<head>
	<title>Experiment Review</title>
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

$json = json_decode($json,true);

$proposal_successful = true;
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
		$current_payout = round($value*100);
	}
}

/**
 * This returns a div for the agent badge
 * @param  array  $powers           		Powers array
 * @param  int  $id                   		Badge id
 * @param  boolean $current_player=false 	Is this the current player
 */
function agent_badge($powers,$id,$current_player=false,$gray=false){
?>

<div class='agent_badge<?php
 		if ($current_player) {
	 		echo " current_player";
	 	} else {
		 	echo " style_" . ($id+1);
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
function group_badge($group,$current_player,$winning=false){
//var_dump($group['proportions']);
?>

<div class="group<?php if($winning) { echo " winning"; } ?>" style="margin:5px;">
	<?php
	arsort($group['proportions']);
	foreach ($group['proportions'] as $agent => $proportion) {

		$powers = array($agent=>($proportion*$group['power']));

		agent_badge($powers,$agent,($agent==$current_player));
	}
	?>
</div><br />

<?php
}

//echo $json['round'];
echo "Your Payout<br/>" . $current_payout . " in Experiment Currency.";
?>

<br/>
<p>You will be sent instructions via email within 24 hours regarding your payment.</p>
Return to the main page: <?php echo anchor("site/main/","Click Here"); ?>
<div class="center_col">
	<h1>Your Badge</h1><br/>
	<div style="display:inline-block;width:60px;height:60px;text-align:center;">
		<?php echo "<div class='mini_mini_badge current_player' style='text-align:center'>" . ($player+1); ?></div>
	</div><br/>
	
	<h1>Final Groups</h1><br/>
<?php 
$win = true;
foreach ($json['current_groups'] as $group) {
	group_badge($group,$agent_num,$win);
	$win = false;
}
?>
</div>
</body>
</html>