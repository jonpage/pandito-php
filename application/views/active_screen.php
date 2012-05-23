<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
?><html>
<head>
<style>
	td{
		text-align: center;
	}
</style>
</head>
<body>
<?php

// TODO: code to randomly set the powers

// powers (nonrandom)
$powers = array(
	1 => .4,
	2 => .3,
	3 => .15,
	4 => .11,
	5 => .04);

define("NUM_PLAYERS", 5);
define("CURRENT_PLAYER", 4);

$num_players = 5;
$current_player = 4;

function winning($coal){
	$threshold = 0.5;
	if($coal['power']>$threshold){
		return true;
	} else {
		return false;
	}
}

function contains_cur_agent($coal){

	return array_key_exists(CURRENT_PLAYER, $coal['proportions']);
}

function compare_coal_payout($coal1,$coal2){
	// must return an integer
	$val = $coal1['proportions'][CURRENT_PLAYER]-$coal2['proportions'][CURRENT_PLAYER];

	// signs are swapped here so we have higher proportions on top (descending order)
	if($val<0){
		return 1;
	} elseif ($val>0) {
		return -1;
	} else {
		return 0;
	}
}

function compare_coal_power($coal1,$coal2){
	// must return an integer
	$val = $coal1['power']-$coal2['power'];

	if($val>0){
		return 1;
	} elseif ($val<0) {
		return -1;
	} else {
		return 0;
	}
}

switch ($stage) {
	case 0:
		// Introduction
		echo "These are the instructions, make sure you understand them. Scroll to the bottom of the screen to answer the multiple choice questions and click continue.<br/>";
		echo anchor('session/wait/'.$stage,'Continue'); 
		break;
	
	case 1:
		echo "<h1>Proposal Stage</h1>";

		/*
		 *	Create coalitions
		 */
		// create coalitions
		$coalitions = array();
		// smallest number $i
		for ($i=1; $i < pow(2,$num_players); $i++) { 
			$bin_array = str_split(decbin($i));
			//print_r($bin_array);
			// initialize current coalition and power
			$current_coalition = array();
			$current_coalition_power = 0;
			$current_proportions = array();

			// see who is in this set
			foreach ($bin_array as $key => $in_set) {
				$agent = $num_players-count($bin_array)+$key+1;
				if($in_set){
					$current_coalition[] = $agent;
					$current_coalition_power = $current_coalition_power + $powers[$agent];
				}
			}

			// calculate the proportions
			foreach ($current_coalition as $cur_agent) {
				$current_proportions[$cur_agent] = round($powers[$cur_agent]/$current_coalition_power,2);
			}
			$coalitions[] = array(
				'agents'		=>	$current_coalition,
				'power'			=>	$current_coalition_power,
				'proportions' 	=>	$current_proportions);
		}

		//print_r($coalitions);

		/*
		 *	 Filter out coalitions which are not winning coalitions
		 */
		 $winning_coalitions = array_filter($coalitions,'winning');

		 //print_r($winning_coalitions);

		 /*
		  *  Filter out coalitions which do not include the current agent
		  */
		$winning_coalitions_with_cur_agent = array_filter($winning_coalitions,'contains_cur_agent');

		//print_r($winning_coalitions_with_cur_agent);

		/*
		 *  (optionally) Sort by coalitions with highest proportion for current user
		 */
		if($sort=="payout"){
			usort($winning_coalitions_with_cur_agent, 'compare_coal_payout');	
		} elseif ($sort=="power") {
			usort($winning_coalitions_with_cur_agent, 'compare_coal_power');
		}
		

		//print_r($winning_coalitions_with_cur_agent);

		/*
		 * echo out checkboxes for the coalitions
		 */
		echo "<table>\n";
		echo "\t<tr><td></td><td>";
		echo anchor('session/active/1/payout', 'Your Payout');
		echo "</td><td>";
		echo anchor('session/active/1/power','Power');
		echo "</td><td>Other Members (Their Payout)</td></tr>\n";

		echo form_open('session/propose/'.$sort);
		// prints proposal line for each coalition
		foreach ($winning_coalitions_with_cur_agent as $key => $coal) {
			echo "\t<tr>";
			echo "<td>" . form_checkbox('coal'.$key,$key,FALSE) . "</td>";
			
			// show what the user's payout is
			echo "<td><strong>" . $coal['proportions'][CURRENT_PLAYER] . "</strong></td>";

			// show the coalition's power
			echo "<td>" . $coal['power'] . "</td>";

			// show the other member's payouts
			echo "<td>";
			$others = "";
			foreach ($coal['proportions'] as $agent => $value) {
				if($agent!=CURRENT_PLAYER){
					$others = $others . $agent . " (" . $value . "), ";
				}
			}
			echo rtrim($others," ,");
			echo "</td></tr>\n";

		}
		echo "</table>\n";
		echo form_submit('submit','Submit');
		echo form_close();
		
		break;

	case 2:
		echo "Step 2";
		break;

	default:
		// ending stage
		echo "The end";
		break;
}
?>
</body>
</html>