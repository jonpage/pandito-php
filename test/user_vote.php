<?php
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
session_start();
if(isset($_SESSION['powers'])){
	
	// determine current player's current payout
	$current_payout = 0;
	foreach ($_SESSION['current_groups'][0]['proportions'] as $agent => $value) {
		if ($agent == $_SESSION['current_player']) {
			$current_payout = round($value*100);
		}
	}

	// determine current player's proposed payout
	$proposed_payout = 0;
	//var_dump($_SESSION['new_groups']);
	foreach ($_SESSION['active_proposal_groups'][0]['proportions'] as $agent => $value) {
		if ($agent == $_SESSION['current_player']) {
			$proposed_payout = round($value*100);
		}
	}
?>

<html>
<head>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="header">
<span class="header_text">Your Badge</span>
<div class="mini_badge current_player header_badge"><?php echo ($_SESSION['current_player']+1); ?></div>
<div class="header_spacer"></div>
<span class="header_text">Your Current Payout</span>
<div class="stats_left header_stats">C</div><div class="stats_right header_stats current_payout"><?php echo $current_payout; ?></div>
<div class="header_spacer"></div>
<span class="header_text">Timeline</span>
<div class='timeline'><?php timeline(); ?></div>
</div>
<div class="left_col">
	<h1>Current Groups</h1>
	<?php
	$win = true;
	usort($_SESSION['current_groups'], 'compare_coal_power');
	foreach ($_SESSION['current_groups'] as $group) {
		if($win){
			?>
			<img src="dollar.png"/>
			<?php
		} else { 
			?>
			<img src="no_dollar.png"/>
			<?php
		}
		group_badge($group,$_SESSION['current_player'],$win);
		$win = false;
	}

	foreach ($_SESSION['active_proposal_groups'] as $group) {
		if(in_array($_SESSION['current_player'],$group['agents'])){
			$agent_group = $group;
		}
	}
	//var_dump($_SESSION['active_proposal_groups']);
	
	?>

</div>

<div class="center_col">
<h3>Voting Stage</h3><h2>Please vote if you would like to become a part of the proposed group</h2><br/>
<h1>Vote</h1><br/>
 <button type="button" name="btn_vote_group" class="yes_button" value="Yes">Yes</button>
  &nbsp; or &nbsp;
 <button type="button" name="btn_vote_group" class="no_button" value="No">No</button><br/>
 <br/>
 <h1>Alternate Groups</h1>
 <?php suggestion_list($_SESSION['current_groups'],$agent_group,false); ?><br />
 
</div>

<div class="right_col">
	<h1>Proposed Groups<div class='h1_stats'><div class="stats_left header_stats">C</div><div class="stats_right header_stats proposed_payout"><?php echo $proposed_payout; ?></div></div></h1>
	<?php 
	$win = true;
	foreach ($_SESSION['active_proposal_groups'] as $group) {
		group_badge($group,$_SESSION['current_player'],$win);
		$win = false;
	}
	?>
</div>

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<!-- originally from http://www.phpied.com/rgb-color-parser-in-javascript/ -->
<script type="text/javascript" src="js/rgbcolor.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.6.2.min.js"><\/script>')</script>

<script type="text/javascript">
	$(document).ready(function(){
		// animate hovering over a button
		$('button').hover(function(){
			$(this).addClass('button_shadow');
		},function(){
			$(this).removeClass('button_shadow');
		});

		// submit vote
		$('button.no_button').click(function(){
			$('.header_spacer:first').load('send_vote.php',{'vote':'no'});
		});
		$('button.yes_button').click(function(){
			$('.header_spacer:first').load('send_vote.php',{'vote':'yes'});
		});
	});
</script>


</body>
</html>
<?php
} else {
	// shouldn't be here, redirect to start page

	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'index.php';

	header("Location: http://$host$uri/$extra");
}
