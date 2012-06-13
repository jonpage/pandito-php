<?php
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
// this will be loaded via the proposal screen to update the new group column

require_once 'coalset.php';
session_start();
if(isset($_SESSION['new_groups'])&&isset($_POST['id'])){
	require_once 'functions.php';
	//var_dump($_SESSION['new_groups'][$_POST['id']]);
	$id = ltrim($_POST['id'],"0");

	$win = true;

	foreach ($_SESSION['new_groups'] as $key => $value) {
		//var_dump($key);
	}

	foreach ($_SESSION['new_groups'][$id] as $group) {
		if(array_key_exists($_SESSION['current_player'], $group['proportions'])){
			if($win){
				$proposed_payout = round($group['proportions'][$_SESSION['current_player']]*100);
			} else {
				$proposed_payout = 0;
			}
			
		}
		$win = false;
	}
	//echo "<div class='stats_left header_stats'>$</div><div class='stats_right header_stats proposed_payout'>$proposed_payout</div>";
	echo "<h1>Proposed Groups<div style='display:inline-block;'><div class='stats_left header_stats'>C</div><div class='stats_right header_stats proposed_payout'>$proposed_payout</div></div></h1><br/>";
	
	$win = true;
	foreach ($_SESSION['new_groups'][$id] as $group) {
		if($win){
			echo '<img src="dollar.png"/>';
		} else { 
			echo '<img src="no_dollar.png"/>';
		}
		group_badge($group,$_SESSION['current_player'],$win);
		$win = false;
	}

	//echo "<br/><h1>Proposed Payout</h1> <div class='stats_left header_stats'>C</div><div class='stats_right header_stats proposed_payout'>$proposed_payout</div>";
	
} else {
	echo "Goodbye";
}

