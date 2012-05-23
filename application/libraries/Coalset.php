<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * Starting with the set of winning coalitions, filter for
 * coalitions which include the selected player, and sort this
 * subset by proportion. Then add a score value for each coalition
 * to facilitate updating the rankings of coalitions for AI players.
 */
class Coalset{	

	public $coalitions;
	public $player;
	
	function __construct(){
		$a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            call_user_func_array(array($this,$f),$a); 
        } 
	}

	function __construct2($coals,$player_num){
		// setup variables
		$this->coalitions 	= $coals;
		$this->player		= $player_num;

		/**
		 *  Filter out coalitions which do not include the current agent
		 */
		$this->coalitions = array_filter($this->coalitions,array('Coalset','contains_cur_agent'));

		/**
		 * Sort coalitions by payout to current agent
		 */
		usort($this->coalitions, array('Coalset','compare_coal_payout'));

		$num_coals = count($this->coalitions);
		for ($i=0; $i < $num_coals; $i++) { 
			$this->coalitions[$i]['score'] = $num_coals-$i;
		}
	}

	/**
	 * Updates this coalition's ranking based on active proposals
	 * @param  array $proposals Array of string representations of proposals
	 * @return void
	 */
	public function update($proposals){
		// initiate the indicator
		$agent_wins = false;

		if(isset($_SESSION['current_coalition'])){
			$cur_coal_id = $_SESSION['current_coalition']['id'];
			$cur_coal_payout = $_SESSION['current_coalition']['proportions'][$_SESSION['order'][$_SESSION['turn']]];
		} else {
			$cur_coal_id = 0;
		}
		foreach ($this->coalitions as $key => $coal) {
			if($coal['id'] == $cur_coal_id){ // agent is in the winning coalition
				$agent_wins = true;
				
			}
		}

		foreach ($proposals as $prop) {
			foreach ($this->coalitions as $key => $coal) {
				if($coal['id'] == $prop){
					if($agent_wins){
						// see if this coalition beats the current coalition in terms of proportion
						if ($this->coalitions[$key]['proportions'][$_SESSION['order'][$_SESSION['turn']]] > $cur_coal_payout) {
							$this->coalitions[$key]['score'] = $coal['score'] + 1;
						}
					} else {
						$this->coalitions[$key]['score'] = $coal['score'] + 1;
					}	
				}
			}
		}
		
		// sort by score
		usort($this->coalitions, array('Coalset','compare_coal_score'));
	}

	/**
	 * Simple test of existence of agent in a coalition
	 * @param  array $coal Coalitions
	 * @return bool
	 */
	function contains_cur_agent($coal){
		return array_key_exists($this->player, $coal['proportions']);
	}


	/**
	 * Compare scores, sort descending
	 * @param  array $coal1          Coalition 1
	 * @param  array $coal2          Coalition 2
	 * @param  int $current_player [description]
	 * @return int
	 */
	function compare_coal_score($coal1,$coal2){
		// must return an integer
		$val = $coal1['score']-$coal2['score'];

		// signs are swapped here so we have higher proportions on top (descending order)
		if($val<0){
			return 1;
		} elseif ($val>0) {
			return -1;
		} else {
			return 0;
		}
	}

	/**
	 * [compare_coal_payout description]
	 * @param  array $coal1          [description]
	 * @param  array $coal2          [description]
	 * @param  int $current_player [description]
	 * @return int
	 */
	function compare_coal_payout($coal1,$coal2){
		// must return an integer
		$val = $coal1['proportions'][$this->player]-$coal2['proportions'][$this->player];

		// signs are swapped here so we have higher proportions on top (descending order)
		if($val<0){
			return 1;
		} elseif ($val>0) {
			return -1;
		} else {
			return 0;
		}
	}

}

/* End of file Someclass.php */