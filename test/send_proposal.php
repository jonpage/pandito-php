<?php
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
require_once 'coalset.php';
require_once 'functions.php';
if(isset($_POST['coalition'])){
	session_start();
	foreach ($_SESSION['coals'][$_SESSION['current_player']]->coalitions as $value) {
		if($value['id']==$_POST['coalition']){
			$_SESSION['proposals'][$_SESSION['current_player']] = $value;
			$_SESSION['active_proposal'] = $value;
		}
	}

	// need to set this
	$new_groups = new_groups_set($_SESSION['current_groups']);
	$_SESSION['active_proposal_groups'] = $new_groups[$_POST['coalition']];

	//var_dump($_SESSION['active_proposal_groups']);

	$_SESSION['stage'] = 'vote';
	
	//echo  "Sending Proposal";
	//var_dump($_SESSION['active_proposal']);
	
	/*
	// redirect to experiment.php
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'experiement.php';

	header("Location: http://$host$uri/$extra");
	*/
	
	// using javascript because of an object error when attempting to use header()
	echo "<script>window.location = 'experiment.php';</script>";

} else {
	// redirect to index.php
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'index.php';

	header("Location: http://$host$uri/$extra");
}