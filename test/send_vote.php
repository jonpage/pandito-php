<?php
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
if(isset($_POST['vote'])){
	session_start();
	if($_POST['vote']=='yes'){
		$_SESSION['votes'][$_SESSION['current_player']] = 1;
	} else {
		$_SESSION['votes'][$_SESSION['current_player']] = 0;
	}
	$_SESSION['stage'] = 'results';
	
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