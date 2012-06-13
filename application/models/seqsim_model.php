<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
class Seqsim_model extends CI_Model{
		
	public $sess_id = 0;
	public $proposer = 0;

	function __construct(){
		parent::__construct();
	}

	function check_cycle($session_id,$search_string){
		$round_q = $this->db->query("SELECT `json` FROM `session_log` WHERE `session_id` = $session_id ORDER BY `id` DESC LIMIT 1");
		$round_r = $round_q->result();
		$round_json = json_decode($round_r[0]->json,true);
		$current_round = $round_json['round'];
		// updated to include a check for session_id, that ommission was obviously causing some interesting errors
		$query_str = "SELECT * FROM `session_log` WHERE `session_id` = $session_id AND `json` LIKE '%$search_string%'";
		//echo "<p>$query_str</p>";
		$query = $this->db->query($query_str);
		if($query->num_rows()>0){
			$cycle = false;
			foreach ($query->result() as $row) {
				$json_array = json_decode($row->json,true);
				if($json_array['round']!=$current_round){
					$cycle = true;
				}
			}
			return $cycle;
		} else {
			return false;
		}
	}

	function auto_propose($session_id){
		$query = $this->db->query("SELECT `json` FROM `session_log` WHERE `session_id` = $session_id ORDER BY `id` DESC LIMIT 1");
		if($query->num_rows()==1){
			$result = $query->result();
			$json = $result[0]->json;
			$json = json_decode($json,true);
			$new_groups = $this->new_groups_set($json,$json['current_groups']);
			//var_dump($new_groups);
			//foreach ($new_groups as $key => $value) {
			//	var_dump($key);
			//}
			reset($new_groups);
			$this->send_proposal($session_id,$json,key($new_groups),true);
		}
	}

	/**
	 * Automate the votes of all those who have not voted
	 * @return [type] [description]
	 */
	function finish_voting($session_id){
		$query = $this->db->query("SELECT `json` FROM `session_log` WHERE `session_id` = $session_id ORDER BY `id` DESC LIMIT 1");
		if($query->num_rows()==1){
			$result = $query->result();
			$json = $result[0]->json;
			$json = json_decode($json,true);
			if(count($json['voters'])>count($json['votes'])){
				foreach ($json['voters'] as $agent) {
					if(!array_key_exists($agent, $json['votes'])){
						if(rand(0,100)<70){
							$json['votes'][$agent] = 1;
						} else {
							$json['votes'][$agent] = 0;
						}
						// signal that this move was automated
						$this->db->query("INSERT INTO `agent_activity` VALUES (NULL,$session_id,$agent,'vote',1)");
					}
				}
			}

			$json['stage'] = 'results';

			// update 'current_groups' if proposal is successful
			$proposal_successful = true;
			foreach ($json['voters'] as $agent) {
				if($json['votes'][$agent]==0){
					$proposal_successful = false;
				}
			}
			 
			if($proposal_successful){	
				$json['current_groups'] = $json['proposed_groups'];
			}
	
			$data = array(
			   'session_id'	=>	$session_id,
			   'json'		=>	json_encode($json),
			   'AI'			=>	1
			);
			
			$this->db->insert('session_log', $data);
		}
	}

	/**
	 * returns how much time has passed since the last move
	 * @return [type] [description]
	 */
	function elapsed_time($session_id){
		$query = $this->db->query("SELECT UNIX_TIMESTAMP() - UNIX_TIMESTAMP(`timestamp`) AS 'time' FROM `session_log` WHERE `session_id` = $session_id ORDER BY `id` DESC LIMIT 1");
		if($query->num_rows()==1){
			$result = $query->result();
			return $result[0]->time;
		}
		return false;
	}

	function update_turn($json,$num_agents){	
		// don't increment on refresh
		$json = json_decode($json,true);
		if($json['proposer'] == $json['order'][$json['turn']]){
			// increment turn, update stage, round (if appropriate)
			if($json['turn']+1>=$num_agents){
				// reset turn to 0
				$json['turn'] = 0;
				$json['round'] = $json['round'] + 1;
			} else {
				$json['turn'] = $json['turn'] + 1;
			}
		}
		$json = json_encode($json);
		return $json;
	}

	/**
	 * Starts the treatment (creates current_group and set stage to propose, among other things)
	 * -- Use a version of this to start the propose stage
	 * @param  [type] $treatment_id [description]
	 * @return [type]
	 */
	function start_treatment($treatment_id){

		$query = $this->db->query("SELECT `config` FROM `treatment` WHERE `id` = $treatment_id");
		if($query->num_rows()==1){
			$result = $query->result();
			$json = $result[0]->config;
			$config = json_decode($json,true);

			$num_agents = count($config['powers']);
			
			
			
			if(isset($config['characteristic'])){
				$stage_json['characteristic'] = $config['characteristic'];

				// these arrays are added to facilitate display of cultural characteristics
				$chars = array();
				$charcolors = array();

				// randomize whether ordering is ASC or DESC to randomize the color assignment
				if(rand(0,100)<50){
					$ordering = "ASC";
				} else {
					$ordering = "DESC";
				}
				$char_query = $this->db->query("SELECT `user`.`" . $stage_json['characteristic'] . "`,`session_members`.`agent_num` FROM `user`,`session_members` WHERE `session_members`.`user_id` = `user`.`id` AND `session_members`.`session_id` = " . $this->session->userdata('sess_id') . " ORDER BY `" . $stage_json['characteristic'] . "` $ordering");
				if($char_query->num_rows>0){
					//$chars['return'] = true;
					$color_index = 0;
					$prev = '';
					foreach ($char_query->result_array() as $row) {
						$chars[$row['agent_num']] = $row[$config['characteristic']];
						if($prev!=$row[$config['characteristic']]){
							$color_index++;
						}
						$charcolors[$row['agent_num']] = $color_index;
						$prev = $row[$config['characteristic']];
					}
				} else {
					//$chars['return'] = false;
				}

				$stage_json['chars'] = $chars;
				$stage_json['charcolors'] = $charcolors;
			} else {
				
			}
			
			// create current_groups
			foreach ($config['coals_by_id'] as $id => $coal) {
				if(substr_count($id, "1")==1){
					$current_groups[] = $coal;
				}
			}

			// see if this can work, this initial ordering has been messing things up!
			// sort current groups so the first has the highest power
			// usort($groups_set[$proposal['id']], array('self','compare_coal_power'));
			//usort($current_groups, array('self','compare_coal_power'));

			// create array for turn order
			for ($i=0; $i < $num_agents ; $i++) { 
				$order[] = $i;
			}
			shuffle($order);

			$stage_json['stage'] 			= "propose";
			$stage_json['proposer']			= $order[0];
			$stage_json['coals']			= $config['coals'];
			$stage_json['coals_by_id']		= $config['coals_by_id'];			
			$stage_json['turn']				= 0;
			$stage_json['round']			= 1;
			$stage_json['order']			= $order;
			$stage_json['current_groups']	= $current_groups;
			$stage_json['powers']			= $config['powers'];
			$stage_json['new_groups']		= $this->new_groups_set($stage_json);

			$data = array(
			   'session_id'	=>	$this->session->userdata('sess_id'),
			   'json'		=>	json_encode($stage_json)
			);
			//var_dump($data);
			$this->db->insert('session_log', $data);
			//return true;
		} else {
			//return false;
		}


	}

	/**
	 * Sorts coalitions in descending order of power
	 * @param  array $coal1 [description]
	 * @param  array $coal2 [description]
	 * @return int
	 */
/*	function compare_coal_power($coal1,$coal2){
		// must return an integer
		$val = $coal1['power']-$coal2['power'];

		if($val>0){
			return -1;
		} elseif ($val<0) {
			return 1;
		} else {
			return 0;
		}
	}
*/
	/**
	 * Initiate coalitions
	 * @param  array $pow Array of powers
	 * @return array
	 */
	private function create_coalitions($pow){
		$num_players = count($pow);
		// create coalitions
		$coalitions = array();
		// smallest number $i
		for ($i=1; $i < pow(2,$num_players); $i++) { 

			$bin_array = str_split(decbin($i));

			// initialize current coalition and power
			$current_coalition = array();
			$current_coalition_power = 0;
			$current_proportions = array();

			// see who is in this set (agents are zero indexed)
			foreach ($bin_array as $key => $in_set) {
				$agent = $num_players-count($bin_array)+$key;
				if($in_set){
					$current_coalition[] = $agent;
					$current_coalition_power = $current_coalition_power + $pow[$agent];
				}
			}
			//echo $bin_array . "<br/>";
			// calculate the proportions
			foreach ($current_coalition as $cur_agent) {
				if($current_coalition_power==0){
					
				} else {
					$current_proportions[$cur_agent] = round($pow[$cur_agent]/$current_coalition_power,2);
				}
			}
			$coalitions[decbin($i)] = array(
				'id'			=>	decbin($i),
				'agents'		=>	$current_coalition,
				'power'			=>	$current_coalition_power,
				'proportions' 	=>	$current_proportions);
		}

		//var_dump($coalitions);

		// don't do the following since our winning condition is different
		/*
		 *	 Filter out coalitions which are not winning coalitions
		 */
		//$winning_coalitions = array_filter($coalitions,'winning');

		//return $winning_coalitions;
		//
		
		return $coalitions;
	}

	function compare_groups_set_proportions($group_set1,$group_set2){

		global $proposer;
		//$json_array = json_decode($json,true);
		//var_dump($proposer);
		//var_dump($group_set1[0]['proportions']);

		if(array_key_exists($proposer, $group_set1[0]['proportions'])!=false){
			$prop1 = $group_set1[0]['proportions'][$proposer];
			//echo "Win this one";
		} else {
			$prop1 = 0;
		}
		
		if(array_key_exists($proposer, $group_set2[0]['proportions'])!=false){
				$prop2 = $group_set2[0]['proportions'][$proposer];
				//echo "Win this other one";
		} else {
			$prop2 = 0;
		}

		
		if($prop1>$prop2){
			return -1;
		} elseif ($prop1<$prop2) {
			return 1;
		} else {
			return 0;
		}
	}

	function compare_coal_power($coal1,$coal2){
		// must return an integer
		$val = $coal1['power']-$coal2['power'];

		if($val>0){
			return -1;
		} elseif ($val<0) {
			return 1;
		} else {
			return 0;
		}
	}

	/**
	 * For each possible coalition of the current player returns the new set of groups
	 * @param  [type] $groups [description]
	 * @return [type]
	 */
	function new_groups_set($json,$groups,$player_id=-1){
		global $proposer;
		$proposer = $json['proposer'];
		if($player_id==-1){
			$player_id = $json['proposer'];
		}

		//global $json;
		//$json = json_decode($json,true);
		
		//var_dump($json['coals']);
		foreach ($json['coals'][$player_id]['coalitions'] as $proposal) {
			
			foreach ($groups as $group) {

				$group_members = substr_count($group['id'],"1");
				$changes = substr_count((string)(intval($proposal['id']) + intval($group['id'])),"2");
				
				// determine what to do with this group
				if($changes==0){ // keep group intact
					//echo "<br /> -- 0 -- <br/>";
					$groups_set[$proposal['id']][] = $group;
				} elseif ($changes == $group_members) { 
					if($group['id']==$proposal['id']){ // this group is the same as the proposal
						//$groups_set[$proposal['id']][] = $proposal;
					} else { // completely remove this group
						// do nothing
					}
					
				} else { // add the group, minus those in the coalition
					//$groups_set[$proposal['id']][] = $_SESSION['coals_by_id'][ltrim(str_replace("2", "0", (string)(intval($proposal['id']) + intval($group['id']))),"0")];
					$group_id = str_replace("1", "0", (string)(intval($proposal['id']) + intval($group['id'])));
					$group_id = str_replace("2", "1", $group_id);
					$groups_set[$proposal['id']][] = $json['coals_by_id'][(intval($group['id']) - intval($group_id))];
				}	
				
			}
			
			// sort this collection of groups
			
			// didn't have to do this before (!?!)
			if(isset($groups_set[$proposal['id']])){
				if(is_array($groups_set[$proposal['id']])){
					if(!in_array($proposal, $groups_set[$proposal['id']])){
						//var_dump($groups_set);
						$groups_set[$proposal['id']][] = $proposal;
					}
					
				} else { // there is nothing in the array because the proposal is the grand coalition
					$groups_set[$proposal['id']][] = $proposal;
				}
			} else {
				$groups_set[$proposal['id']][] = $proposal;
			}
			
			usort($groups_set[$proposal['id']], array('self','compare_coal_power'));
			
		}
		uasort($groups_set, array('self','compare_groups_set_proportions'));
		//var_dump($groups_set);
		return $groups_set;
	}

	/**
	 * Update the session log, by adding entries for voters and the proposed groups
	 * @param  [type] $session_id  [description]
	 * @param  [type] $json        [description]
	 * @param  [type] $agent_num   [description]
	 * @param  [type] $proposal_id [description]
	 * @return [type]              [description]
	 */
	function send_proposal($session_id,$json,$proposal_id,$ai=false){
		//echo "alert($json);";
		//var_dump($json);
		$new_groups = $this->new_groups_set($json,$json['current_groups']);
		$json['proposed_groups'] = $new_groups[$proposal_id];
		// find the proposed coalition with the proposer
		foreach ($new_groups[$proposal_id] as $group) {
			if(array_key_exists($json['proposer'], $group['proportions'])){
				$voting_agents = $group['agents'];
			}
		}
		$voters = array_diff($voting_agents, array($json['proposer']));
		//var_dump($voters);
		if(count($voters)==0){
			//echo "automatically win, change stage to results";
			// set json (add the proposed groups, and set stage to results) and update the 
			$json['stage'] = 'results';
		} else {
			//echo "need to collect votes";
			// set json and update the session_log
			$json['voters'] = $voters;
			$json['votes'] = array();
			$json['stage'] = 'vote';
		}

		$data = array(
		   'session_id'	=>	$session_id,
		   'json'		=>	json_encode($json)
		);
		if($ai){
			$data['AI']=1;
		}
		// record agent_activity
		if($ai){$ai_num=1;} else {$ai_num=0;}
		$this->db->query("INSERT INTO `agent_activity` VALUES (NULL,$session_id," . $json['proposer'] . ",'proposal',$ai_num)");
		//var_dump($data);
		$this->db->insert('session_log', $data);

	}

	function send_vote($session_id,$json,$agent_num){
		if(count($json['voters'])==count($json['votes'])){
			$json['stage'] = 'results';
 
 			// update 'current_groups' if proposal is successful
			$proposal_successful = true;
			if (isset($json['voters'])) {
				foreach ($json['voters'] as $agent) {
					if($json['votes'][$agent]==0){
						$proposal_successful = false;
					}
				}
			}
			 
			if($proposal_successful){	
				$json['current_groups'] = $json['proposed_groups'];
			}

		} else {
			$json['stage'] = 'vote';
		}

		$data = array(
		   'session_id'	=>	$session_id,
		   'json'		=>	json_encode($json)
		);
		$this->db->query("INSERT INTO `agent_activity` VALUES (NULL,$session_id,$agent_num,'vote',0)");
		$this->db->insert('session_log', $data);
	}

	function end_turn($session_id,$json){
		$json = json_decode($json,true);
		$json['finished'] = str_replace("1", "0", $json['finished']);
		$json['stage'] = 'propose';
		
		// advance the turn here
		$json['turn'] = $json['turn'] + 1;
		if($json['turn']>=count($json['order'])){
			$json['turn'] = 0;
			$json['round'] = $json['round'] + 1;
		}

		if($json['round']>3){
			$json['stage'] = 'review';
		}

		$json['proposer'] = $json['order'][$json['turn']];

		$data = array(
		   'session_id'	=>	$session_id,
		   'json'		=>	json_encode($json),
		   'AI'			=>	1
		);
		
		$this->db->insert('session_log', $data);
	}

	/**
	 * If the current player is not listed as done with the results page mark him as such
	 * @param  [type] $session_id [description]
	 * @return String
	 */
	function finish_results($session_id){
		//$agent_num = $this->session->userdata('agent_num');
		$agent_query = $this->db->query("SELECT DISTINCT `session_members`.`agent_num` FROM `session`,`session_members`,`user` WHERE `session_members`.`session_id` = $session_id AND `user`.`id` = `session_members`.`user_id` AND `user`.`email` = '" . $this->session->userdata('email') . "'");
		if($agent_query->num_rows()==1){
			$agent_result = $agent_query->result();
			$agent_num = $agent_result[0]->agent_num;
		}

		$query = $this->db->query("SELECT `json` FROM `session_log` WHERE `session_id` = $session_id ORDER BY `id` DESC LIMIT 1");
		if($query->num_rows()==1){
			$result = $query->result();
			//echo $result[0]->json;
			$json = json_decode($result[0]->json,true);
			$stage = $json['stage'];

			$query_num_agents = $this->db->query("SELECT `treatment`.`num_agents` FROM `treatment`,`session` WHERE `treatment`.`id` = `session`.`treatment_id` AND `session`.`id` = $session_id");
			if($query_num_agents->num_rows()==1){
				$result_num_agents = $query_num_agents->result();
				$num_agents = $result_num_agents[0]->num_agents;
				//echo "Num Agents = " . $result_num_agents[0]->num_agents;
			} else {
				//echo "Couldn't get number of agents";
			}

			if($stage=='results'){
				// starting json for comparison
				$json_start = json_encode($json);

				// see if we have already finished the instructions for any user
				if(array_key_exists('finished', $json)){ // we only need to update this entry
					$json['finished'] = pow(10, ($num_agents - $agent_num - 1)) + intval($json['finished']);
				} else { // need to create the 'finished' entry from scratch
					$json['finished'] = pow(10, ($num_agents - $agent_num - 1));
				}
				$json['finished'] = sprintf('%0' . $num_agents . 's',$json['finished']);
				$json['finished'] = str_replace('2', '1', $json['finished']);

				// insert entry into session_log
//				echo "JSON: " . json_encode($json);
				// insert into session_members
				$json_end = json_encode($json);
				if($json_start != $json_end){
					$data = array(
					   'session_id'	=>	$session_id,
					   'json'		=>	$json_end
					);
					$this->db->insert('session_log', $data);
				}
				
				return $json['finished'];
				//echo "alert('" . sprintf('%0' . $num_agents . 's',$json['finished']) . "');";
			} else {
				return "-11";
			}

			//var_dump($json['stage']);
			//echo "alert('" . $json['finished'] . "');";
			//echo "alert('What!?!');";
		} else {
			return "-1";
		}
		
	}

}

/* End of file Someclass.php */