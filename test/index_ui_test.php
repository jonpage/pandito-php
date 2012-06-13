<?php
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
/**
 * This page will display treatment configuration options and then load the treatment
 */
$default_num_agents = 6;

if(isset($_POST['submit'])){
	// determine where to send the user
	//var_dump($_POST);
	
	// remove old data
	session_start();
	session_destroy();
	
	// set session variables
	session_start();

	if(isset($_POST['num_agents'])){
		if($_POST['num_agents']!=""){
			$_SESSION['num_agents']=intval($_POST['num_agents']);
		} else {
			// set to default num_agents
			$_SESSION['num_agents']=$default_num_agents;
		}
	} else {
		// set to default num_agents
		$_SESSION['num_agents']=$default_num_agents;
	}

	// set powers
	if(isset($_POST['powers'])){
		if($_POST['powers']!=""){
			$temp_powers = explode(",", $_POST['powers']);
			if(count($temp_powers)==$_SESSION['num_agents']){
				$_SESSION['powers']=$temp_powers;
				//var_dump($_SESSION['powers']);
			} else {
				// set to default powers
				$default_powers = array(".39",".3",".2",".06",".03",".02");
				//for ($i=0; $i < $_SESSION['num_agents']; $i++) { 
				//	$default_powers[] = round($i/(($_SESSION['num_agents']*($_SESSION['num_agents']+1))/2),2);
				//}
				$_SESSION['powers']=$default_powers;
			}			
		} else {
			$default_powers = array(".39",".3",".2",".06",".03",".02");
			//for ($i=0; $i < $_SESSION['num_agents']; $i++) { 
			//	$default_powers[] = round($i/(($_SESSION['num_agents']*($_SESSION['num_agents']+1))/2),2);
			//}
			$_SESSION['powers']=$default_powers;
			//var_dump($_SESSION['powers']);
			//var_dump($default_powers);
		}
	} else {
		// set to default powers
		//for ($i=1; $i <= $_SESSION['num_agents']; $i++) { 
		//	$default_powers[] = round($i/(($_SESSION['num_agents']*($_SESSION['num_agents']+1))/2),2);
		//}
		$default_powers = array(".39",".3",".2",".06",".03",".02");
		$_SESSION['powers']=$default_powers;
	}

	if(isset($_POST['current_player'])){
		if(intval($_POST['current_player'])<=6&&intval($_POST['current_player'])>=1){
			$_SESSION['current_player'] = $_POST['current_player']-1;
		} else {
			$_SESSION['current_player'] = 2;			
		}
	} else {
		$_SESSION['current_player'] = 2;
	}

	// other setup variables
	for ($i=0; $i < $_SESSION['num_agents']; $i++) { 
		$temp_order[] = $i;
	}
	shuffle($temp_order);
	$_SESSION['order'] = $temp_order;
	$_SESSION['stage'] = 'propose';
	$_SESSION['turn'] = 0;
	$_SESSION['round'] = 1;
	$_SESSION['active_proposal'] = 0; // recorded in proposal stage used in voting stage 
	$_SESSION['votes'] = 0;	// recorded in voting stage used in the results stage to determine the results

	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'experiment.php';
	header("Location: http://$host$uri/$extra");
}
?>
<html>
<head>
	<title>Seq-Sim Treatment Configuration</title>
	<link rel="stylesheet" href="css/styles.css"/>
	<link rel="stylesheet" href="css/jquery-ui-1.8.18.custom.css">
</head>
<body>
<h1></h1>
<form action="index.php" method="post">
<ul class="configlist">
	<li><input name="num_agents" type="text" size="2"> Number of agents</li>
	<li><input name="powers" type="text" size="6"> List of powers</li>
	<li><input name="current_player" type="text" size="2"> Select player to control</li>
</ul>

<input type="submit" name="submit" value="Submit" />
</form>

<div id="power_eq">
	<div>
		<span id='eq1' class="eq">39</span>
	</div>
	<div>
		<span id='eq2' class="eq">30</span>
	</div>
	<div>
		<span id='eq3' class="eq">20</span>
	</div>
	<div>
		<span id='eq4' class="eq">6</span>
	</div>
	<div>
		<span id='eq5' class="eq">3</span>
	</div>
	<div>
		<span id='eq6' class="eq">2</span>
	</div>
</div>

<div id="power_stack">
	<div id="ps6">
		<div id="ps5" class="resize">
			<div id="ps4" class="resize">
				<div id="ps3" class="resize">
					<div id="ps2" class="resize">
						<div id="ps1" class="resize"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<table>
	<?php for ($i=1; $i <= 6; $i++) { ?>
		<tr>
			<td>
				<div  class='mini_badge mini_badge_hover style_<?php echo $i; ?>' style='float:none;'>
					<?php echo $i; ?>
				</div>
				<span id="power_<?php echo $i; ?>" style="float:right"></span>
			</td>
		</tr>
	<?php } ?>
</table>

<br/><a href="reset.php">Reset</a>

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.6.2.min.js"><\/script>')</script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<!--<script src="js/jquery-ui-1.8.18.custom.min.js"></script>-->
<script>window.jQuery.ui || document.write('<script src="js/jquery-ui-1.8.18.custom.min.js"><\/script>')</script>


<script type="text/javascript">
	function resetBounds(event,ui){
		$('.resize').each(function(){
			var minHeight = $(this).parent().height() - 100;
			if(minHeight< $(this).children().first().height()){
				minHeight = $(this).children().first().height()
			}
			$( this ).resizable( "option", "minHeight",minHeight );
			var maxHeight = $(this).children().first().height() + 100;
			if(maxHeight > $(this).parent().height()){
				//alert(maxHeight + " > " + $(this).parent().height());
				maxHeight = $(this).parent().height();
			}
			$( this ).resizable( "option", "maxHeight", maxHeight );
		});
		$('.resize').last().resizable( "option", "minHeight", 0 );

		// update powers
		$('#power_1').html(($('#ps1').height())/2);
		for (var i = 2; i <= 6; i++) {
			$('#power_' + i).html(($('#ps' + i).height()-$('#ps' + i).children().first().height())/2);
		};
	}



	$(document).ready(function(){
		$('#power_eq > div > span').each(function(){
			var value = parseInt($(this).text(),10);
			$(this).empty().slider({
				value: value,
				range: "min",
				min: 1,
				max: 50,
				animate: true,
				handles: 's',
				orientation: "vertical",
				slide: function( event, ui ) {
					$(this).next().html( ui.value );
				}
			});
		});
		//$('#power_eq > div').append("<span class='slider_value'></span>");
		//$('.slider_value').each(function(){
		//	$(this).html($(this).prev().slider("value"));
		//});
		$('.resize').resizable({
			minWidth: 20,
			maxWidth: 20,
			stop: resetBounds
		});
		$('.resize').each(function(){
			var minHeight = $(this).parent().height() - 100;
			if(minHeight< $(this).children().first().height()){
				minHeight = $(this).children().first().height()
			}
			$( this ).resizable( "option", "minHeight",minHeight );
			var maxHeight = $(this).children().first().height() + 100;
			if(maxHeight > $(this).parent().height()){
				maxHeight = $(this).parent().height();
			}
			$( this ).resizable( "option", "maxHeight", maxHeight );
		});
		$('.resize').last().resizable( "option", "minHeight", 0 );

		$('.ui-resizable-handle.ui-resizable-se').css('display','none');
		$('.ui-resizable-handle.ui-resizable-e').css('display','none');

		// update powers
		$('#power_1').html(($('#ps1').height())/2);
		for (var i = 2; i <= 6; i++) {
			$('#power_' + i).html(($('#ps' + i).height()-$('#ps' + i).children().first().height())/2);
		};
	});
</script>
</body>
</html>