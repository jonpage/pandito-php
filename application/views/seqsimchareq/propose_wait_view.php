<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
//echo "This is propose_view<br/>";

$GLOBALS['json'] = $json;

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

/**
 * Displays a set of mini-badges corresponding to the given group id
 * @param  String $id Binary representation of a coalition
 */
function mini_group($json,$num_agents,$id,$coalitions,$highlight=false,$clickable=true){
	echo "<div id='$id' class='suggestion";
	if($highlight){
		echo " suggestion_selected";
	}
	if(!$clickable){
		echo " no_pointer";
	}
	echo "'>";
	//var_dump(str_split($id));
	//echo "<div>" . $coalitions[$id]['proportions'][$_SESSION['current_player']]. "</div>";
	
	//
	echo "<div class='stats_left'>C</div><div class='stats_right proposed_payout'>";
	/**
	 * Code for tie TODO
	 */
	//var_dump($json['proposer']);
	if(array_key_exists($json['proposer'],$coalitions[0]['proportions'])!=false){
		//echo round($coalitions[0]['proportions'][$json['proposer']]*100);
		echo round(100/count($json['proposer'],$coalitions[0]['proportions']));
	} else {
		echo 0;
	}
	echo "</div>";
	$member_array = str_split($id);
	// add zeros to the front if this array is too small
	$member_array = array_pad($member_array, -$num_agents, '0');
	//var_dump($member_array);
	foreach ($member_array as $agent => $in_group) {
		if($in_group==='1'){
			if($agent==$json['proposer']){
				echo "<div class='mini_badge current_player_char style_" . $json['charcolors'][$agent] . "'>" . ($agent+1) . "</div>";
			} else {
				echo "<div class='mini_badge style_" . $json['charcolors'][$agent] . "'>" . ($agent+1) . "</div>";
			}
			
		}
	}
	echo "</div>";
}

function compare_groups_set_proportions($group_set1,$group_set2){
//	if(isset($json)){
global $json;
$json_array = json_decode($json,true);
//var_dump($json_array);
//echo "Does this work?<br/>";
		if(array_key_exists($json_array['proposer'], $group_set1[0]['proportions'])!=false){
			$prop1 = $group_set1[0]['proportions'][$json_array['proposer']];
		} else {
			$prop1 = 0;
		}
		
		if(array_key_exists($json_array['proposer'], $group_set2[0]['proportions'])!=false){
				$prop2 = $group_set2[0]['proportions'][$json_array['proposer']];
		} else {
			$prop2 = 0;
		}
//	} else {
//		$prop1=1;
//		$prop2=1;
//	}
	
	
	if($prop1>$prop2){
		return -1;
	} elseif ($prop1<$prop2) {
		return 1;
	} else {
		return 0;
	}
}


/**
 * This function prints out a set of divs for the selection of a new group
 * @param  [type] $powers         [description]
 * @param  [type] $current_player [description]
 * @return [type]
 */
function badge_clicker($json,$powers,$current_player,$init_group=array()){
	echo "<div class='clicker'>";
	foreach ($powers as $agent => $value) {
		if($agent!=$current_player){
			if(in_array($agent,$init_group['agents'])){
				agent_badge($json,$powers,$agent,false,false);
			} else {
				agent_badge($json,$powers,$agent,false,true);
			}
		}
	}
	echo "</div>";
}

function suggestion_list($json,$num_agents,$groups,$agent_group=array('id'=>0),$clickable=true){

	echo "<div class='suggestion_list'>";

	// generate the list of these
	$new_groups = new_groups_set($json,$groups);
	//var_dump($new_groups[111]);
	//var_dump($new_groups[10111][1]['proportions']);
	$json['new_groups'] = $new_groups;
	// TODO
	//var_dump($new_groups);
	foreach ($new_groups as $prop => $value) {
		if($prop==$agent_group['id']){
			mini_group($json,$num_agents,$prop,$value,true,$clickable);
		} else {
			mini_group($json,$num_agents,$prop,$value,false,$clickable);
		}
		
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
 * For each possible coalition of the current player returns the new set of groups
 * @param  [type] $groups [description]
 * @return [type]
 */
function new_groups_set($json,$groups,$player_id=-1){
	if($player_id==-1){
		$player_id = $json['proposer'];
	}

	foreach ($json['coals'][$player_id]['coalitions'] as $proposal) {
		
		foreach ($groups as $group) {

			$group_members = substr_count($group['id'],"1");
			$changes = substr_count((string)(intval($proposal['id']) + intval($group['id'])),"2");
			
			// determine what to do with this group
			if($changes==0){ // keep group intact
				//echo "<br /> -- 0 -- <br/>";
				$groups_set[$proposal['id']][] = $group;
			} elseif ($changes == $group_members) { 
				if($group['id']==$proposal['id']){ // this group is the same as the proposal
					//$groups_set[$proposal['id']][] = $proposal;
				} else { // completely remove this group
					// do nothing
				}
				
			} else { // add the group, minus those in the coalition
				//$groups_set[$proposal['id']][] = $_SESSION['coals_by_id'][ltrim(str_replace("2", "0", (string)(intval($proposal['id']) + intval($group['id']))),"0")];
				$group_id = str_replace("1", "0", (string)(intval($proposal['id']) + intval($group['id'])));
				$group_id = str_replace("2", "1", $group_id);
				$groups_set[$proposal['id']][] = $json['coals_by_id'][(intval($group['id']) - intval($group_id))];
			}	
			
		}
		
		// sort this collection of groups
		
		// didn't have to do this before (!?!)
		if(isset($groups_set[$proposal['id']])){
			if(is_array($groups_set[$proposal['id']])){
				if(!in_array($proposal, $groups_set[$proposal['id']])){
					//var_dump($groups_set);
					$groups_set[$proposal['id']][] = $proposal;
				}
				
			} else { // there is nothing in the array because the proposal is the grand coalition
				$groups_set[$proposal['id']][] = $proposal;
			}
		} else {
			$groups_set[$proposal['id']][] = $proposal;
		}
		
		usort($groups_set[$proposal['id']], 'compare_coal_power');
		
	}
	uasort($groups_set, 'compare_groups_set_proportions');
	//var_dump($groups_set);
	return $groups_set;
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

$json = json_decode($json,true);

// sort current groups so the first has the highest power
usort($json['current_groups'], 'compare_coal_power');

// determine current player's current payout
$current_payout = 0;
foreach ($json['current_groups'][0]['proportions'] as $agent => $value) {
	if ($agent == $agent_num) {
		//$current_payout = round(100*$value);
		$current_payout = round(100/count($json['current_groups'][0]['proportions']));
	}
}

?>
<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url();?>css/style2.css">
	<title>Proposal Stage</title>
</head>
<body>
<div class="header">
<span class="header_text">Your Badge</span>
<?php echo '<div class="mini_badge header_badge style_' . $json['charcolors'][$agent_num] . '">' . ($agent_num+1);?></div>
<div class="header_spacer"></div>
<span class="header_text">You Current Payout</span>
<div class="stats_left header_stats">C</div><div class="stats_right header_stats current_payout"><?php echo $current_payout; ?></div>
<div class="header_spacer"></div>
<span class="header_text">Timeline</span>
<div class='timeline'><?php timeline($json,$agent_num); ?></div>
</div>
<div class="left_col">
	<h1>Current Groups</h1>
	<?php
	$win = true;
	foreach ($json['current_groups'] as $group) {
		group_badge($json,$group,$agent_num,$win);
		$win = false;
	}

	foreach ($json['current_groups'] as $group) {
		if(in_array($json['proposer'],$group['agents'])){
			$agent_group = $group;
		}
	}
	
	?>

<?php  legend($json);  ?>

</div>

<div class="center_col">
<br/>
<h1>Proposal Stage</h1>
<br/>
Wait for the current player to finish their proposal.
</div>

<div class="right_col">

</div>

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<!-- originally from http://www.phpied.com/rgb-color-parser-in-javascript/ -->
<script src="<?php echo base_url();?>js/rgbcolor.js"></script>
<script>window.jQuery || document.write('<script src="' + <?php echo "'" . base_url() . "'";?> + 'js/jquery-1.6.2.min.js"><\/script>')</script>

<script>


var t;
$(document).ready(function(){
	$.ajaxSetup({
	  cache: true
	});

	t = setTimeout('check_wait()',1000);

});

function check_wait(){
	$.getScript(<?php echo '"' . site_url('seqsimchareq/waitjs/propose/' . $treatment_id) . '"';?>);

}
</script>

</body>
</html>