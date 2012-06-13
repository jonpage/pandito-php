<?php
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
require_once 'coalset.php';
session_start();
if(isset($_SESSION['powers'])){
//	session_start();
	
	require_once 'functions.php';

	if(isset($_SESSION['coals'])){
		//var_dump($_SESSION['coals'][3]->coalitions);
	} else {
		/**
		 * initiate coalitions
		 */
	
		$coals = create_coalitions($_SESSION['powers']);
		//var_dump($coals);
		// For each agent create a sorted coalition (Coalset object)
		for ($j=0; $j < count($_SESSION['powers']); $j++) { 
			$coals_by_agent[$j]= new Coalset($coals,$j);
		}
		$_SESSION['coals'] = $coals_by_agent;
		//var_dump($coals_by_agent);
		//$coals_by_agent[0]->update(array("100001"));
		//var_dump($coals_by_agent[0]->coalitions[0]);
	}

	/**
	 * Determine the stage type
	 */
	if($_SESSION['stage'] == 'propose'){
		/**
		 * Determine if it is the current player's turn
		 */
		if($_SESSION['order'][$_SESSION['turn']] == $_SESSION['current_player']){
			/**
			 * Prompt user to vote
			 */
			//echo "look at your choices and vote";
			require_once 'user_propose.php';
		} else {
			/**
			 * Simulate AI agents
			 */
			if(isset($_SESSION['proposals'])){
				$_SESSION['coals'][$_SESSION['order'][$_SESSION['turn']]]->update($_SESSION['proposals']);
			}
			//echo "Test";
			// choose the top item on this agents ranked list of coalitions
			//echo $_SESSION['coals'][$_SESSION['turn']]->coalitions[0]['id'];
			$_SESSION['proposals'][$_SESSION['order'][$_SESSION['turn']]] = $_SESSION['coals'][$_SESSION['order'][$_SESSION['turn']]]->coalitions[0];
			$_SESSION['active_proposal'] = $_SESSION['coals'][$_SESSION['order'][$_SESSION['turn']]]->coalitions[0];
			//var_dump($_SESSION['proposals']);
			
			// move to next stage
			$_SESSION['stage'] = 'vote';

			//echo "AI voted";
			//reload experiment.php
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'experiment.php';

			header("Location: http://$host$uri/$extra");

		}
	} elseif($_SESSION['stage'] == 'vote') {
		/**
		 * Collect AI Votes
		 */
		$_SESSION['votes'] = array();
		foreach ($_SESSION['order'] as $player_num) {
			// only do the following for the AI players
			if($player_num != $_SESSION['current_player']){
				if($_SESSION['coals'][$player_num]->coalitions[0]['id'] == $_SESSION['active_proposal']['id']){
					// vote for proposal
					$_SESSION['votes'][$player_num] = 1;
				} else {
					// do not increment number of votes
					$_SESSION['votes'][$player_num] = 0;
				}
			}
		}

		/**
		 * Collect active user vote
		 */
		
		// see if user is in proposed coalition
		$proposed_id = pretty_id($_SESSION['active_proposal']['id']);
		if(substr($proposed_id, -($_SESSION['num_agents']-$_SESSION['current_player']),1)=="1"){
			//echo "You are allowed to vote";
			require_once 'user_vote.php';
		} else {
			$_SESSION['votes'][$_SESSION['current_player']] = 0;
			$_SESSION['stage'] = 'results';

			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'experiment.php';

			header("Location: http://$host$uri/$extra");
		}
		
		//echo "AI Votes:<br\>";
		//var_dump($_SESSION['votes']);
		
		
	} elseif ($_SESSION['stage'] == 'results') {
		/**
		 * Display results of voting
		 */
		require_once 'results.php';

	}

} else {

	// shouldn't be here, redirect to start page

	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'index.php';

	header("Location: http://$host$uri/$extra");
}