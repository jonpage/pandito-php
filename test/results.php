<?php /**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */?><html>
<head>
	<title>Results Page</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
</head>
<body>
<?php
//echo "Results stage";
//echo $_SESSION['active_proposal']['id'] . "<br />";
ksort($_SESSION['votes']);
$votes = implode("", $_SESSION['votes']);
//echo $votes . "<br />";
//echo ($_SESSION['active_proposal']['id'] == $votes);
//var_dump($votes);
//var_dump($_SESSION['active_proposal']['id']);
// coalition wins

$prop_array = str_split($_SESSION['active_proposal']['id']);
// add zeros to the front, if this array is too small
$prop_array = array_pad($prop_array, -$_SESSION['num_agents'], '0');
//var_dump($member_array);
$proposal_successful = true;
foreach ($prop_array as $agent => $in_prop) {
	if($in_prop==='1'&&$votes[$agent]==='0'){
		$proposal_successful = false;
	}
}
 
if($proposal_successful){	
	
	$_SESSION['current_groups'] = $_SESSION['active_proposal_groups'];

}

// determine current player's current payout
$current_payout = 0;
foreach ($_SESSION['current_groups'][0]['proportions'] as $agent => $value) {
	if ($agent == $_SESSION['current_player']) {
		$current_payout = round($value*100);
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
<div class="mini_badge current_player header_badge"><?php echo ($_SESSION['current_player']+1); ?></div>
<div class="header_spacer"></div>
<span class="header_text">Your Current Payout</span>
<div class="stats_left header_stats">C</div><div class="stats_right header_stats current_payout"><?php echo $current_payout; ?></div>
<div class="header_spacer"></div>
<span class="header_text">Timeline</span>
<?php

// don't increment on refresh
if($_SESSION['proposed_turn'] == $_SESSION['turn']){
	// increment turn, update stage, round (if appropriate)
	if($_SESSION['turn']+1>=$_SESSION['num_agents']){
		// reset turn to 0
		$_SESSION['turn'] = 0;
		$_SESSION['round'] = $_SESSION['round'] + 1;
	} else {
		$_SESSION['turn'] = $_SESSION['turn'] + 1;
	}
}

//$_SESSION['stage'] = 'propose';

//$_SESSION['current_coalition'] =  $_SESSION['active_proposal'];
?>
<div class='timeline'><?php timeline(); ?></div>
</div>

<div class="left_col">
	
	<?php  
	
	//var_dump($_SESSION['active_proposal']); 
	
	$member_array = str_split($_SESSION['active_proposal']['id']);
	// add zeros to the front if this array is too small
	$member_array = array_pad($member_array, -$_SESSION['num_agents'], '0');
	//var_dump($member_array);
	/*
	echo "<table style='text-align:center;display:inline-block;'>";
	foreach ($member_array as $agent => $in_group) {
		if($in_group==='1'){
			if($counter==3){
				echo "</tr><tr>";
			}
			echo "<td>";
			if($agent==$_SESSION['current_player']){
				agent_badge($_SESSION['powers'],$agent,true);
			} else {
				agent_badge($_SESSION['powers'],$agent,false);
			}
			echo "</td>";
			$counter = $counter + 1;
		}
	}
	echo "</tr>";
	echo "</table><br/>";
	*/
	?>
	<h1>Votes</h1><br/>
	<?php  //var_dump($_SESSION['votes']); ?>
	<table style="text-align:center;display:inline-block;">
		<tr>
			<?php 
			$counter = 0;
			foreach ($member_array as $agent => $in_group) {
				if($in_group==='1'){
					if($counter==3){
						echo "</tr><tr>";
					}
					echo "<td>";
					if($agent==$_SESSION['current_player']){
						agent_badge($_SESSION['powers'],$agent,true);
						//echo "<td><div class='mini_badge current_player' style='float:none;display:inline-block'>" . ($agent+1) . "</div></td>";
					} else {
						agent_badge($_SESSION['powers'],$agent,false);
						//echo "<td><div class='mini_badge style_" . ($agent+1) . "' style='float:none;display:inline-block'>" . ($agent+1) . "</div></td>";
					}

					if($_SESSION['votes'][$agent]!=0){
						echo "<br /><button class='yes_button no_pointer button_shadow'>Yes</button>";
					} else {
						echo "<br /><button class='no_button no_pointer button_shadow'>No</button>";
					}

					echo "</td>";
					$counter = $counter + 1;
				}
				
			}
			?>
		</tr>
	</table>
	<br/>
	<h1>Proposed By</h1><br/>
	<div style='display:inline-block'>
	<?php 
	if($_SESSION['order'][$_SESSION['proposed_turn']]==$_SESSION['current_player']){
						agent_badge($_SESSION['powers'],$_SESSION['order'][$_SESSION['proposed_turn']],true);
						//echo "<td><div class='mini_badge current_player' style='float:none;display:inline-block'>" . ($agent+1) . "</div></td>";
					} else {
						agent_badge($_SESSION['powers'],$_SESSION['order'][$_SESSION['proposed_turn']],false);
						//echo "<td><div class='mini_badge style_" . ($agent+1) . "' style='float:none;display:inline-block'>" . ($agent+1) . "</div></td>";
					}
	?>
	</div>
</div>

<div class="center_col">
	<h2>Results Stage</h2>
	<h1>New Groups</h1><br/>
<?php 
$win = true;
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
<?php if($_SESSION['round']<3){ ?>
Next Turn: <div class="mini_badge <?php 
if($_SESSION['order'][$_SESSION['turn']]==$_SESSION['current_player']){
	echo "current_player ";
} else {
	echo "style_" . ($_SESSION['order'][$_SESSION['turn']]+1) . " "; 
}?>button_shadow" style="float:none;display:inline-block;vertical-align:middle;"><?php echo ($_SESSION['order'][$_SESSION['turn']]+1); ?></div>
<?php } ?>
<br /><br /><br />
<?php if($_SESSION['round']<=3){ ?>
<button class="continue_button yes_button hover">Continue</button>
<?php } else { ?>
<button class="exit_button yes_button hover">Exit Demo</button>
<?php } ?>
</div>
<?php //var_dump($_SESSION);?>
<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<!-- originally from http://www.phpied.com/rgb-color-parser-in-javascript/ -->
<script type="text/javascript" src="js/rgbcolor.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.6.2.min.js"><\/script>')</script>


<script type="text/javascript">
$(document).ready(function(){
	// animate hovering over a button
		$('button.hover').hover(function(){
			$(this).addClass('button_shadow');
		},function(){
			$(this).removeClass('button_shadow');
		});

		$('button.continue_button').click(function(){
			$('.header_spacer:first').load('continue.php');
		});

		$('button.exit_button').click(function(){
			//$('.header_spacer:first').load('start_over.php');
			//index.php?/site/main
			$('.header_spacer:first').load(<?php 
				if(isset($_SESSION['email'])){
					echo "'../pando/index.php?/site/complete_demo/" . rawurlencode($_SESSION['email']) . "'";
					} else {
						echo "'../pando/index.php?/site/complete_demo/none'";
					}
					 ?>);
		});
});
</script>
</body>
</html>