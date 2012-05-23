<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */

var_dump($votes);

// repeat code to calculate and sort code (This should be placed in a controller and just run once)

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

if($votes[0]!=null){
	$winner = $winning_coalitions_with_cur_agent[$votes[0]];
} else {
	// make sure to sort by payout here
	usort($winning_coalitions_with_cur_agent, 'compare_coal_payout');	
	$winner = $winning_coalitions_with_cur_agent[0];
}

var_dump($winner);

echo "Happy or Not?<br/><br/>";

echo anchor('session/active/1','Not Happy');