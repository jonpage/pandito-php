<?php
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
// this will be included from experiment.php when it is human player's turn to propose a coalition

require_once 'functions.php';

// sort current groups so the first has the highest power
usort($_SESSION['current_groups'], 'compare_coal_power');

// determine current player's current payout
$current_payout = 0;
foreach ($_SESSION['current_groups'][0]['proportions'] as $agent => $value) {
	if ($agent == $_SESSION['current_player']) {
		$current_payout = round(100*$value);
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

	foreach ($_SESSION['current_groups'] as $group) {
		if(in_array($_SESSION['current_player'],$group['agents'])){
			$agent_group = $group;
		}
	}
	
	?>

</div>

<div class="center_col">
<h3>Proposal Stage</h3>	
<h2>Please Select Group Members</h2>
 <?php badge_clicker($_SESSION['powers'],$_SESSION['current_player'],$agent_group); ?><br/>
 <br/>
<h2>Or Select an Available Group</h2>
 <?php suggestion_list($_SESSION['current_groups'],$agent_group); ?><br />
 <button type="submit" name="btn_new_group" value="Confirm Proposal">Confirm Proposal</button>
</div>

<div class="right_col">
	<h1>Proposed Groups<div class='h1_stats'><div class="stats_left header_stats">C</div><div class="stats_right header_stats proposed_payout"><?php echo $current_payout; ?></div></div></h1>
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
</div>

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<!-- originally from http://www.phpied.com/rgb-color-parser-in-javascript/ -->
<script type="text/javascript" src="js/rgbcolor.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.6.2.min.js"><\/script>')</script>

<script type="text/javascript">
	$(document).ready(function(){
		
		// initialize the clicker divs to gray
		//$('.clicker div.agent_badge').addClass('gray');
		
		// on click of a clicker badge
		$('.clicker div.agent_badge').click(function(){
			$(this).toggleClass('gray');

			// remove hover highlight
			if($(this).hasClass('darkgray')){
				$(this).removeClass('darkgray');
				var color = new RGBColor($(this).css('background-color'));
				if(color.ok){
					$(this).css('background-color','rgb('+(color.r-40)+','+(color.g-40)+','+(color.b-40)+')');
				}
			} else {
				$(this).css('background-color','');
				$(this).addClass('darkgray');
			}

			// use current styles to determine the groups that should be shown.
			var members = new Array();
			members[<?php echo $_SESSION['current_player']; ?>] = "1";
			$('.clicker div.agent_badge').each(function(){
				if(!$(this).hasClass('gray')){
					members[parseInt($(this).children('.badge_num').html())-1] = "1";
				} else {
					members[parseInt($(this).children('.badge_num').html())-1] = "0";
				}
			});
			
			// display groups in right_col
			var id = members.join("");
			$('.right_col').load('show_new_groups.php',{'id':id});

			// unhighlight previous suggestion
			$('.suggestion_selected').removeClass('suggestion_selected');
			// highlight new suggestion
			id = id.substr(id.indexOf("1"));
			$("#" + id).addClass('suggestion_selected');
			$('.header_stats.proposed_payout').html($("#" + id).children('.proposed_payout').html());
			
		});

		// on hover a suggestion
		$('.suggestion').hover(function(){
			$(this).addClass('suggestion_hover');
			$(this).children('.mini_badge').addClass('mini_badge_hover');
			$(this).children('.stats_left').addClass('stats_hover');
			$(this).children('.stats_right').addClass('stats_hover');
		},function(){
			$(this).children('.mini_badge').removeClass('mini_badge_hover');
			$(this).removeClass('suggestion_hover');
			$(this).children('.stats_left').removeClass('stats_hover');
			$(this).children('.stats_right').removeClass('stats_hover');
		});

		// on button click (submit form)
		$('button').click(function(){
			//alert($('.suggestion_selected').attr('id'));
			//var post = {'coalition':$('.suggestion_selected').attr('id')};
			$('.suggestion_selected').load('send_proposal.php',{'coalition':$('.suggestion_selected').attr('id')});
		});


		// on click on a suggestion
		$('.suggestion').click(function(){
			if($(this).hasClass('suggestion_selected')){
				$(this).removeClass('suggestion_selected');
			} else {

				$('.suggestion_selected').removeClass('suggestion_selected');
				$(this).addClass('suggestion_selected');
				
				var members = new Array();
				// collect the list of members that should be highlighted
				$('.suggestion_selected div.mini_badge').each(function(){
					members.push($(this).html());
				});

				$('.suggestion_selected div.agent_badge div.badge_num').each(function(){
					members.push($(this).html());
				});

				// update clicker
				// highlight the appropriate clicker badges
				$('.clicker div.agent_badge').each(function(){
					if($.inArray($(this).children('.badge_num').html(),members)>-1){
						// this one should be highlighted
						//alert($(this).children('.badge_num').html());
						if($(this).hasClass('gray')){
							$(this).removeClass('gray');
						}
					} else {
						// this one should not be highlighted
						if(!$(this).hasClass('gray')){
							$(this).addClass('gray');
						}
					}
					
				});

				var id_array = new Array();
				// request an update to right_col
				for (var i = 0; i < <?php echo $_SESSION['num_agents']; ?>; i++) {
					if($.inArray((i+1).toString(),members)>-1){
						id_array[i] = 1;
					} else {
						id_array[i] = 0;
					}
				}
				
				var id = id_array.join("");
				$('.right_col').load('show_new_groups.php',{'id':id});
				// update proposed payout
				/**
				 * TODO
				 */
				
				$('.header_stats.proposed_payout').html($(this).children('.proposed_payout').html());
				
			}
			
		});

		// on hover a button (the submit button)
		$('button').hover(function(){
			$(this).addClass('button_shadow');
		},function(){
			$(this).removeClass('button_shadow');
		});

		// on hover over a clicker badge
		$('.clicker div.agent_badge').hover(function(){
			// mouseOn
			if($(this).hasClass('gray')){
				$(this).addClass('darkgray');
			} else {
				//alert($(this).css('background-color'));
				var color = new RGBColor($(this).css('background-color'));
				//alert(color.ok);
				if(color.ok){
					//alert('rgb('+(color.r-100)+','+(color.g-100)+','+(color.b-100)+')');
					$(this).css('background-color','rgb('+(color.r-40)+','+(color.g-40)+','+(color.b-40)+')');
				}
			}
		},function(){
			// mouseOut
			if($(this).hasClass('gray')){
				$(this).removeClass('darkgray');
			} else {
				$(this).css('background-color','');
			}
		});

	});
</script>

</body>
</html>