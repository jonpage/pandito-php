<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */

// Show who proposes which coalition
// Repeat voting if no convergence
// Allow approval voting the first round
// next round 3, then 2, then 1
// If no agreement vote again.
?>
<html>
<head>
<style>
	td{
		text-align: center;
	}
</style>
</head>
<body>
<?php
//var_dump($coals);

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



/*	--------
 *  For now arbitrarily select the two top non-selected  coalitions to add (if two exist)
 *  In the future those to vote on will be generated through each participant's proposal 
 */
$num_cur_agent_coals = count($winning_coalitions_with_cur_agent);
foreach ($coals as $prop) {
	$proposals[$prop] = $winning_coalitions_with_cur_agent[$prop];
}

if($num_cur_agent_coals - count($coals)>2 && $dont_add==FALSE){
	// add the top two available coalitions which have not been proposed
	$added = 0;
	$index = 0;
	while($added<2){
		if(!array_key_exists($index, $proposals)){
			$proposals[$index] = $winning_coalitions_with_cur_agent[$index];
			$added++;
		}
		$index++;
	}
	
} elseif($dont_add==FALSE) {
	// show all available coalitions
	$proposals = $winning_coalitions_with_cur_agent;
} else {
	// don't change proposals
}

//var_dump($proposals);

// this sort was messing up my keys, change usort to uasort
// sort by $sort
if($sort=="payout"){
	uasort($proposals, 'compare_coal_payout');	
} elseif ($sort=="power") {
	uasort($proposals, 'compare_coal_power');
}


echo "<h1>Voting Stage</h1>";

/*
 * echo out checkboxes for the coalitions
 */
echo "<table>\n";
echo "\t<tr><td></td><td>";
//echo anchor('session/propose/payout', 'Your Payout');
echo "Your Payout";
echo "</td><td>";
//echo anchor('session/propose/power','Power');
echo "Power";
echo "</td><td>Other Members (Their Payout)</td></tr>\n";

echo form_open('session/vote/'.$sort);
// prints proposal line for each coalition
foreach ($proposals as $key => $coal) {
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
?>
</body>
</html>