<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
//var_dump(json_decode($json)->new_groups);
global $json_array;
$json_array = json_decode($json,true);
//var_dump($json_array);

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
	if($winning){?>
		<img src=<?php echo '"' . base_url('img/dollar.png') . '"'; ?> width="64" style="float:left;margin:5px;">
	<?php } else { ?>
		<img src=<?php echo '"' . base_url('img/no_dollar.png') . '"'; ?> width="64" style="float:left;margin:5px;">
	<?php }
	arsort($group['proportions']);
	
	foreach ($group['proportions'] as $agent => $proportion) {

		$powers = array($agent=>($proportion*$group['power']));

		agent_badge($powers,$agent,($agent==$current_player));
	}
	?>
</div><br />

<?php
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

function compare_groups_set_proportions($group_set1,$group_set2){

	global $json_array;
	//$json_array = json_decode($json,true);
	//var_dump($json_array['proposer']);
	//var_dump($group_set1[0]['proportions']);

	if(array_key_exists($json_array['proposer'], $group_set1[0]['proportions'])!=false){
		$prop1 = $group_set1[0]['proportions'][$json_array['proposer']];
		//echo "Win this one";
	} else {
		$prop1 = 0;
	}
	
	if(array_key_exists($json_array['proposer'], $group_set2[0]['proportions'])!=false){
			$prop2 = $group_set2[0]['proportions'][$json_array['proposer']];
			//echo "Win this other one";
	} else {
		$prop2 = 0;
	}

	
	if($prop1<$prop2){
		return -1;
	} elseif ($prop1>$prop2) {
		return 1;
	} else {
		return 0;
	}
}


/**
 * For each possible coalition of the current player returns the new set of groups
 * @param  [type] $groups [description]
 * @return [type]
 */
function new_groups_set($json,$groups,$player_id=-1){
	//global $json;
	//$json = json_decode($json,true);
	if($player_id==-1){
		$player_id = $json['proposer'];
	}
	//var_dump($json['coals']);
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

$id = ltrim($id,"0");
//var_dump($json);
$new_groups = new_groups_set($json_array,$json_array['current_groups']);
//var_dump($new_groups);
//uasort($new_groups, 'compare_groups_set_proportions');

$win = true;
//var_dump($id);

//var_dump($new_groups);

//foreach ($json_array['coals'][$json_array['proposer']]['coalitions'] as $value) {
foreach ($new_groups as $key => $value) {
	//var_dump($key);
	//var_dump($value);
}

foreach ($new_groups[$id] as $group) {
	if(array_key_exists($json_array['proposer'], $group['proportions'])){
		if($win){
			//$proposed_payout = round($group['proportions'][$json_array['proposer']]*100);
			$proposed_payout = round(100/count($group['proportions']));
		} else {
			$proposed_payout = 0;
		}
		
	}
	$win = false;
}

echo "<h1>Proposed Groups<div style='display:inline-block;'><div class='stats_left header_stats'>C</div><div class='stats_right header_stats proposed_payout'>$proposed_payout</div></div></h1><br/>";

$win = true;
foreach ($new_groups[$id] as $group) {
	group_badge($group,$json_array['proposer'],$win);
	$win = false;
}