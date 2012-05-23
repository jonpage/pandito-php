<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */

class Sequential extends CI_Controller {

	// define constants
	private $powers = array(
		1 => .4,
		2 => .3,
		3 => .15,
		4 => .11,
		5 => .04);
	private $current_player = 4;

	// to be setup by constructor
	private $winning_coalitions;
	private $win_by_agent;

	// important variables for this treatment
	private $coalition_choices;

	public static function winning($coal){
		$threshold = 0.5;
		if($coal['power']>$threshold){
			return true;
		} else {
			return false;
		}
	}

	/**
	 * [contains_agent description]
	 * @param  array $coal the current coalition
	 * @param  int $agent agent number
	 * @return bool
	 */
	private function contains_agent($coal,$agent){
		return array_key_exists($agent, $coal['proportions']);
	}

	/**
	 * Creates an array where the key corresponds to an agent and the value is 
	 * an array of coalitions for which the given agent is a member
	 * @param  array $coals array of all coalitions to be filtered
	 * @return array
	 */
	private function winning_by_agent($coals){

		$by_agent = array();
		
			foreach ($coals as $current_coal => $coal) {
				foreach ($coal['proportions'] as $agent => $prop) {
					$by_agent[$agent][$current_coal] = $coal;
				}
			}
		//var_dump($by_agent);
		return $by_agent;
	}

	/**
	 * Compares to coalitions by payout to a given agent, sorts in descending order
	 * @param  array $coal1 first coalition
	 * @param  array $coal2 second coalition
	 * @param  int $agent agent number
	 * @return int
	 */
	private function compare_coal_payout($coal1,$coal2,$agent){
		// must return an integer
		$val = $coal1['proportions'][$agent]-$coal2['proportions'][$agent];

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
	 * Compares two coalitions by power
	 * @param  array $coal1 first coalition
	 * @param  array $coal2 second coalition
	 * @return int
	 */
	private function compare_coal_power($coal1,$coal2){
		// must return an integer
		$val = $coal1['power']-$coal2['power'];

		if($val>0){
			return 1;
		} elseif ($val<0) {
			return -1;
		} else {
			return 0;
		}
	}

	/**
	 * Calculates all winning coalitions given the array of powers
	 * @param array $power_array array of powers
	 * @return array of coalitions
	 */
	public function find_winning_coalitions($power_array)
	{
		// create all possible coalitions
		$coalitions = array();
		// smallest number $i
		for ($i=1; $i < pow(2,count($power_array)); $i++) { 
			$bin_array = str_split(decbin($i));
			//print_r($bin_array);
			// initialize current coalition and power
			$current_coalition = array();
			$current_coalition_power = 0;
			$current_proportions = array();

			// see who is in this set
			foreach ($bin_array as $key => $in_set) {
				$agent = count($power_array)-count($bin_array)+$key+1;
				if($in_set){
					$current_coalition[] = $agent;
					$current_coalition_power = $current_coalition_power + $power_array[$agent];
				}
			}

			// calculate the proportions
			foreach ($current_coalition as $cur_agent) {
				$current_proportions[$cur_agent] = round($power_array[$cur_agent]/$current_coalition_power,2);
			}

			$coalitions[] = array(
				'agents'		=>	$current_coalition,
				'power'			=>	$current_coalition_power,
				'proportions' 	=>	$current_proportions);
		}

		//print_r($coalitions);

		/*
		 *	 Filter out coalitions which are not winning coalitions
		 */
		return array_filter($coalitions,'Sequential::winning');
	}

	function __construct() {
		parent::__construct();

		// intialize coalition choices
		$this->coalition_choices = array_flip(array_keys($this->powers));

		// calculate the winning coalitions
		$this->winning_coalitions = $this->find_winning_coalitions($this->powers);
		// group coalitions by agent
		$this->win_by_agent = $this->winning_by_agent($this->winning_coalitions);

		// sort by payout
		foreach ($this->win_by_agent as $coals) {
			uasort($coals, 'compare_coal_payout')
		}
	}
	
	/**
	 * This is the main function for this treatment and determines whose turn it is 
	 * @return none
	 */
	public function index() {
		//round(1);

		// randomly choose a player to move first
		$turn = rand(1,count($this->powers));

		if($turn == $this->current_player){
			$this->load->view(
				'sequential_choice',
				array(
					'choices'=>$this->coalition_choices,
					'winning_coalitions'=>$this->win_by_agent[$this->current_player]));
		} else{
			// simulate other players moves till it is the current players turn
			while($turn!=$this->current_player){
				// calculate choices of other players
				
				$this->coalition_choices[$turn] = reset($this->win_by_agent[$turn]);
								
				// increment turn and move to the first player after the last
				$turn++;
				if($turn > count($this->powers)){
					$turn = 1;
				}
			}

			// request the players choice
			$this->load->view(
				'sequential_choice',
				array(
					'player'=>$this->current_player,
					'choices'=>$this->coalition_choices,
					'winning_coalitions'=>$this->win_by_agent[$this->current_player]));
		}
	}

	// collect the user's choice and calculate the new choices of other players
	// after which the player will make another sequential choice
	public function choice($choice=array()){
		
	}
	
}