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
	if(isset($_POST['see_proposer'])){
		if($_POST['see_proposer']=="on"){
			$_SESSION['see_proposer']=true;
		}
	}
	if(isset($_POST['see_proposal_history'])){
		if($_POST['see_proposal_history']=='on'){
			$_SESSION['see_proposal_history']=true;
		}
	}
	if(isset($_POST['see_rejector'])){
		if($_POST['see_rejector']=="on"){
			$_SESSION['see_rejector']=true;
		}
	}
	if(isset($_POST['see_reject_proportion'])){
		if($_POST['see_reject_proportion']=="on"){
			$_SESSION['see_reject_proportion']=true;
		}
	}
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
	if(isset($_POST['powers'])){
		if($_POST['powers']!=""){
			$temp_powers = explode(",", $_POST['powers']);
			if(count($temp_powers)>=$_SESSION['num_agents']){
				$_SESSION['powers']=$temp_powers;
			} else {
				// set to default powers
				for ($i=1; $i <= $_SESSION['num_agents']; $i++) { 
					$default_powers[] = round($i/(($_SESSION['num_agents']*($_SESSION['num_agents']+1))/2),2);
				}
				$_SESSION['powers']=$default_powers;
			}			
		} else {
			for ($i=1; $i <= $_SESSION['num_agents']; $i++) { 
				$default_powers[] = round($i/(($_SESSION['num_agents']*($_SESSION['num_agents']+1))/2),2);
			}
			$_SESSION['powers']=$default_powers;
			//var_dump($default_powers);
		}
	} else {
		// set to default powers
		for ($i=1; $i <= $_SESSION['num_agents']; $i++) { 
			$default_powers[] = round($i/(($_SESSION['num_agents']*($_SESSION['num_agents']+1))/2),2);
		}
		$_SESSION['powers']=$default_powers;
	}

	if(isset($_POST['current_player'])){
		$_SESSION['current_player'] = $_POST['current_player']-1;
	} else {
		$_SESSION['current_player'] = 0;
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
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>

<form action="index.php" method="post">
<ul class="configlist">
	<li><input name="see_proposal_history" type="checkbox"> See proposal history</li>
	<li><input name="see_proposer" type="checkbox"> See who makes proposal</li>
	<li><input name="see_rejector" type="checkbox"> See who rejects your proposal</li>
	<li><input name="see_reject_proportion" type="checkbox"> See the proportion of rejections you receive</li>
	<li><input name="num_agents" type="text" size="2"> Number of agents</li>
	<li><input name="powers" type="text" size="6"> List of powers</li>
	<li><input name="current_player" type="text" size="2"> Select player to control</li>
</ul>

<input type="submit" name="submit" value="Submit" />
</form>
<br/><a href="reset.php">Reset</a>

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>

<script type="text/javascript">
	$(document).ready(function(){
		// place script here
	});
</script>
</body>
</html>