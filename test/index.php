<?php
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
/**
 * This page will display treatment configuration options and then load the treatment
 */
$default_num_agents = 3;

if(isset($_GET['email'])){
	$email = $_GET['email'];
} else {
	$email = "none";
}

//if(isset($_POST['submit'])){
	// determine where to send the user
	//var_dump($_POST);
	
	// remove old data
	session_start();
	session_destroy();
	
	// set session variables
	session_start();

	$_SESSION['email'] = $email;

	// set to default num_agents
	$_SESSION['num_agents']=$default_num_agents;
	
	// set powers
	$default_powers = array(".45",".35",".20");
	
	/*if(isset($_POST['powers'])){
		if(count($_POST['powers'])==5){
			$_SESSION['powers'] = $_POST['powers'];
		} else {

			$_SESSION['powers']=$default_powers;
		}
	} else {		
		*/
		$_SESSION['powers']=$default_powers;
		/*
	}
	//var_dump($_SESSION['powers']);

	if(isset($_POST['current_player'])){
		if(intval($_POST['current_player'])<=5&&intval($_POST['current_player'])>=1){
			$_SESSION['current_player'] = $_POST['current_player']-1;
		} else {
			$_SESSION['current_player'] = 2;			
		}
	} else {
		*/
		$cur_player = array_rand(array("0","1","2"));

		$_SESSION['current_player'] = $cur_player;
		/*
	}
*/
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

	//$host  = $_SERVER['HTTP_HOST'];
	//$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	//$extra = 'experiment.php';
	//header("Location: http://$host$uri/$extra");
	
	echo "<script>window.location = 'experiment.php';</script>";
/*} else {

?>
<html>
<head>
	<title>Seq-Sim Treatment Configuration</title>
	<link rel="stylesheet" href="css/styles.css"/>
	<link rel="stylesheet" href="css/jquery-ui-1.8.18.custom.css">
</head>
<body>

Power left to allocate: <span class="remainder">1</span>
<br/><br/>
<table>
	<tr><td colspan="2">Player</td><td>Power</td></tr>
	<?php for ($i=1; $i <= 6; $i++) { ?>
		<tr>
			<td><input style="display:none;" name="current_player" value="<?php echo $i; ?>" type="radio"<?php if($i===2){ echo " checked='checked'"; }?>/></td>
			<td>
				<div style="cursor:pointer;" class='mini_badge mini_badge_hover style_<?php echo $i; if($i===2){ echo " current_player"; }?>' style='float:none;'>
					<?php echo $i; ?>
				</div>
				
			</td>
			<td><input type="text" id="power_<?php echo $i; ?>" size="2"/></td>
		</tr>
	<?php } ?>
</table>

<br/>
<button id="submit">Start Experiment</button>
<a href="reset.php">Reset</a>

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.6.2.min.js"><\/script>')</script>


<script type="text/javascript">

	$(document).ready(function(){
		// set the initial current player css
		$(".mini_badge").removeClass('current_player');
		$("input[@name=current_player]:checked").parent().next().children().first().addClass('current_player');

		// listen for radio click
		$('input[type|="radio"]').change(function() {
			$(".mini_badge").removeClass('current_player');
			$("input[@name=current_player]:checked").parent().next().children().first().addClass('current_player');
		});

		$('.mini_badge').click(function(){
			$('.current_player').removeAttr('checked');
			$(this).parent().prev().children().first().attr('checked','checked');
			$(".mini_badge").removeClass('current_player');
			$("input[@name=current_player]:checked").parent().next().children().first().addClass('current_player');
		});

		$('input[type|="text"]').change(function(){
			var remainder = 1.0;
			//alert($(this).attr("value"));
			$('input[type|="text"]').each(function(){
				var value = parseFloat($(this).attr("value"));
				//alert(remainder - value);
				if(isNaN(value)){
					value = 0;
					//alert(value);
				}
				remainder = remainder - value;
				//alert(remainder);
			});
			remainder = Math.round(remainder*1000)/1000;
			$('.remainder').html(remainder);
		});

		$('#submit').click(function(){
			// setup powers array
			var powers = Array();
			var sum = 0;
			for (var i = 0; i < 6; i++) {
				powers[i] = parseFloat($('#power_'+(i+1)).val());
				// set a minimum power
				if(isNaN(powers[i])||powers[i]==0){
					powers[i] = 0.1;
				}
				sum += powers[i];
			};

			if(sum!=1){
				$.each(powers,function(key,value){
					powers[key] = Math.max(Math.round((value/sum)*100)/100,0.01);
				});
			}

			var lastVal = 1;
			for (var i = 0; i < 5; i++) {
				lastVal -= powers[i];
			}
			// do something if lastVal is negative
			powers[5] = Math.round(lastVal*100)/100;

			//alert(powers);

			$.post("index.php",{'submit':true,'powers':powers,'current_player':$('.current_player').html()},function(data){
				$('.remainder').html(data);
			})
		});
	});
</script>
</body>
</html><?php }
*/