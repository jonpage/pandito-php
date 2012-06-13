<?php
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */

/**
 * Initiate coalitions
 * @param  array $pow Array of powers
 * @return array
 */
function create_coalitions($pow){
	$num_players = count($pow);
	// create coalitions
	$coalitions = array();
	// smallest number $i
	for ($i=1; $i < pow(2,$num_players); $i++) { 

		$bin_array = str_split(decbin($i));

		// initialize current coalition and power
		$current_coalition = array();
		$current_coalition_power = 0;
		$current_proportions = array();

		// see who is in this set (agents are zero indexed)
		foreach ($bin_array as $key => $in_set) {
			$agent = $num_players-count($bin_array)+$key;
			if($in_set){
				$current_coalition[] = $agent;
				$current_coalition_power = $current_coalition_power + $pow[$agent];
			}
		}
		//echo $bin_array . "<br/>";
		// calculate the proportions
		foreach ($current_coalition as $cur_agent) {
			if($current_coalition_power==0){
				
			} else {
				$current_proportions[$cur_agent] = round($pow[$cur_agent]/$current_coalition_power,2);
			}
		}
		$coalitions[decbin($i)] = array(
			'id'			=>	decbin($i),
			'agents'		=>	$current_coalition,
			'power'			=>	$current_coalition_power,
			'proportions' 	=>	$current_proportions);
	}

	//var_dump($coalitions);

	// don't do the following since our winning condition is different
	/*
	 *	 Filter out coalitions which are not winning coalitions
	 */
	//$winning_coalitions = array_filter($coalitions,'winning');

	//return $winning_coalitions;
	//
	
	return $coalitions;
}

/**
 * Compares coalitions and returns true if the coalition could win and false otherwise
 * @param  array $coal Coalition
 * @return bool
 */
function winning($coal){
	$threshold = 0.5;
	if($coal['power']>$threshold){
		return true;
	} else {
		return false;
	}
}

/**
 * Formats a coalition's id string by adding zeros
 * @param  String $id_string Coalition ID
 * @return String
 */
function pretty_id($id_string){
	$new_id_string = $id_string;
	for ($i=0; $i < strlen($id_string)-$_SESSION['num_agents']; $i++) { 
		$new_id_string = "0" . $new_id_string;
	}
	return $new_id_string;
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
		<div class='tower_spacer' style="height:<?php echo ((1-$powers[$id])*20+1); ?>px">&nbsp;</div>
		<div class='badge_tower' style="height:<?php echo ($powers[$id]*20); ?>px">&nbsp;</div>
	</div>
	<div class='badge_power'>(<?php echo round($powers[$id]*100); ?>)</div>
</div>

<?php
}

/**
 * This returns a div for the large agent badge
 * @param  array  $powers 	Powers array
 * @param  int  $id    		Badge id
 */
function large_agent_badge($powers,$id){
?>

<div class='large_agent_badge current_player'>
	<div class='large_badge_num'><?php echo ($id+1); ?></div>
	<div class='large_badge_tower_container'>
		<div class='tower_spacer' style="height:<?php echo ((1-$powers[$id])*40+1); ?>px">&nbsp;</div>
		<div class='large_badge_tower' style="height:<?php echo ($powers[$id]*40); ?>px">&nbsp;</div>
	</div>
	<div class='large_badge_power'>(<?php echo round($powers[$id]*100); ?>)</div>
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

/**
 * This function prints out a set of divs for the selection of a new group
 * @param  [type] $powers         [description]
 * @param  [type] $current_player [description]
 * @return [type]
 */
function badge_clicker($powers,$current_player,$init_group=array()){
	echo "<div class='clicker'>";
	foreach ($powers as $agent => $value) {
		if($agent!=$current_player){
			if(in_array($agent,$init_group['agents'])){
				agent_badge($powers,$agent,false,false);
			} else {
				agent_badge($powers,$agent,false,true);
			}
		}
	}
	echo "</div>";
}

/**
 * For each possible coalition of the current player returns the new set of groups
 * @param  [type] $groups [description]
 * @return [type]
 */
function new_groups_set($groups,$player_id=-1){
	if($player_id==-1){
		$player_id = $_SESSION['current_player'];
	}
	//var_dump($_SESSION['current_player']);
	foreach ($_SESSION['coals'][$player_id]->coalitions as $proposal) {
		//var_dump($proposal);
		//var_dump($_SESSION['coals_by_id']);
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
				//var_dump($group['id']);
				//var_dump($group_id);
				//var_dump(((intval($group['id']) - intval($group_id))));
				//var_dump($_SESSION['coals_by_id'][(intval($group['id']) - intval($group_id))]);
				$groups_set[$proposal['id']][] = $_SESSION['coals_by_id'][(intval($group['id']) - intval($group_id))];
			}



			
			
		}
		
		// sort this collection of groups
		if(is_array($groups_set[$proposal['id']])){
			if(!in_array($proposal, $groups_set[$proposal['id']])){
				$groups_set[$proposal['id']][] = $proposal;
			}
			usort($groups_set[$proposal['id']], 'compare_coal_power');
		} else { // there is nothing in the array because the proposal is the grand coalition
			$groups_set[$proposal['id']][] = $proposal;
		}
		
		
	}
	uasort($groups_set, 'compare_groups_set_proportions');
	//var_dump($groups_set);
	return $groups_set;
}

function compare_groups_set_proportions($group_set1,$group_set2){
	
	if(array_key_exists($_SESSION['current_player'], $group_set1[0]['proportions'])!=false){
		$prop1 = $group_set1[0]['proportions'][$_SESSION['current_player']];
	} else {
		$prop1 = 0;
	}
	
	if(array_key_exists($_SESSION['current_player'], $group_set2[0]['proportions'])!=false){
			$prop2 = $group_set2[0]['proportions'][$_SESSION['current_player']];
	} else {
		$prop2 = 0;
	}
	
	if($prop1>$prop2){
		return -1;
	} elseif ($prop1<$prop2) {
		return 1;
	} else {
		return 0;
	}
}

function compare_groups_set_size($group_set1,$group_set2){
	
}

function suggestion_list($groups,$agent_group=array('id'=>0),$clickable=true){

	echo "<div class='suggestion_list'>";

	// generate the list of these
	$new_groups = new_groups_set($groups);
	//var_dump($new_groups[10111][1]['proportions']);
	$_SESSION['new_groups'] = $new_groups;
	// TODO
	//var_dump($new_groups);
	foreach ($new_groups as $prop => $value) {
		if($prop==$agent_group['id']){
			mini_group($prop,$value,true,$clickable);
		} else {
			mini_group($prop,$value,false,$clickable);
		}
		
	}

	echo "</div>";
}

function ai_select_group($groups_set,$agent_id){
	foreach ($groups_set as $id => $coalitions) {
		if(array_key_exists($agent_id,$coalitions[0]['proportions'])!=false){
			$id_array[$id] =  round($coalitions[0]['proportions'][$agent_id]*100);
		} else {
			$id_array[$id] = 0;
		}
	}
	asort($id_array);
	end($id_array);
	// return the 
	return key($id_array);
}

/**
 * Displays a set of mini-badges corresponding to the given group id
 * @param  String $id Binary representation of a coalition
 */
function mini_group($id,$coalitions,$highlight=false,$clickable=true){
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
	if(array_key_exists($_SESSION['current_player'],$coalitions[0]['proportions'])!=false){
		echo round($coalitions[0]['proportions'][$_SESSION['current_player']]*100);
	} else {
		echo 0;
	}
	echo "</div>";
	$member_array = str_split($id);
	// add zeros to the front if this array is too small
	$member_array = array_pad($member_array, -$_SESSION['num_agents'], '0');
	//var_dump($member_array);
	foreach ($member_array as $agent => $in_group) {
		if($in_group==='1'){
			if($agent==$_SESSION['current_player']){
				echo "<div class='mini_badge current_player'>" . ($agent+1) . "</div>";
			} else {
				echo "<div class='mini_badge style_" . ($agent+1) . "'>" . ($agent+1) . "</div>";
			}
			
		}
	}
	echo "</div>";
}

/**
 * This function echos a timeline from session data
 * @return [type]
 */
function timeline(){
	foreach ($_SESSION['order'] as $turn => $player) {
		if($turn == $_SESSION['proposed_turn']){
			$turn_class = " turn";
		} else {
			$turn_class = "";
		}
		if($player==$_SESSION['current_player']){
			echo "<div class='mini_mini_badge current_player$turn_class'>" . ($player+1) . "</div>";
		} else {
			echo "<div class='mini_mini_badge style_" . ($player+1) . "$turn_class'>" . ($player+1) . "</div>";
		}
	}
	echo " &nbsp; &nbsp; ";
	// display for rounds
	for ($i=1; $i <= 3; $i++) {
		if($_SESSION['proposed_turn']==5&&$_SESSION['stage']=='results'){
			if($i<$_SESSION['round']){
				echo "<div class='round'>&nbsp;</div>";
			} else {
				echo "<div class='round future_round'>&nbsp;</div>";
			}
		} else {
			if($i<=$_SESSION['round']){
				echo "<div class='round'>&nbsp;</div>";
			} else {
				echo "<div class='round future_round'>&nbsp;</div>";
			}
		}
	}
}