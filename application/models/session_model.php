<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */
class Session_model extends CI_Model{
		
	function __construct(){
		parent::__construct();
	}

	function submit_survey($survey){
		if($this->session->userdata('is_logged_in')!=true){
			redirect('login');
		} else {
			// get user id
			$query = $this->db->query("SELECT `id` FROM `user` WHERE `email` = '" . $this->session->userdata('email') . "'");
			$result = $query->result();
			$user_id = $result[0]->id;

			// get sessions this survey applies to from `payments`
			$query2 = $this->db->query("SELECT `session_id` FROM `payments` WHERE `user_id` = $user_id AND `survey` = 0");
			if($query2->num_rows>0){
				foreach ($query2->result() as $row) {
					$session_array[] = $row->session_id;
				}
				$sessions = json_encode($session_array);
			} else {
				$sessions = "[]";
			}
			
			// insert new record in exit survey
			$sql = "INSERT INTO `exit_survey` VALUES (NULL,$user_id,'$sessions',NOW()";
			foreach ($survey as $key => $value) {
				$sql = $sql . ",'$value'";
			}
			$sql = $sql . ")";
			$this->db->query($sql);

			// update `payments` table
			$this->complete_exit_survey();
		}
		
	}

	/**
	 * Return the amount of payments due the participant for which no exit survey has been taken 
	 * @return mixed [description]
	 */
	function get_payments(){
		if($this->session->userdata('is_logged_in')!=true){
			redirect('login');
		} else {
			$query = $this->db->query("SELECT count(`payments`.`id`) AS 'experiments', sum(`payments`.`amount`) as 'total' FROM `user`,`payments` WHERE `payments`.`survey` = 0 AND `payments`.`user_id` = `user`.`id` AND `user`.`email` = '" . $this->session->userdata('email') . "'");
			if($query->num_rows()>0){
				$result = $query->result();
				//var_dump($result[0]->experiments);
				//var_dump($result[0]->total);
				$payments['experiments'] = $result[0]->experiments;
				$payments['total'] = $result[0]->total;
				if($result[0]->experiments==0){
					return false;
				} else {
					return $payments;
				}
			} else {
				return false;
			}
		}
	}

	function complete_exit_survey(){
		if($this->session->userdata('is_logged_in')!=true){
			redirect('login');
		} else {
			$query = $this->db->query("UPDATE `payments`,`user` SET `payments`.`survey` = 1  WHERE `payments`.`user_id` = `user`.`id` AND `user`.`email` = '" . $this->session->userdata('email') . "'");
			
		}
	}

	function end_session($session_id,$abort=false){

		// check to see if the session has already ended (if so, do not end it again)
		$check = $this->db->query("SELECT `end_time` FROM `session` WHERE `id` = $session_id AND `end_time` <> 0");
		if($check->num_rows()>0){ // session has already been ended
			// do nothing
		} else {
			// update the end time of the session
			$query = $this->db->query("UPDATE `session` SET `end_time` = NOW() WHERE `id` = $session_id");
		}

		$check2 = $this->db->query("SELECT `payout` FROM `payouts` WHERE `session_id` = $session_id");
		if($check2->num_rows()>0){// payout information already set
			// do nothing
		} elseif(!$abort) {
			// need to calculate payouts for users
			// net payout should be payout times the proportion of moves not automated
			$query2 = $this->db->query("SELECT `json` FROM `session_log` WHERE `session_id` = $session_id ORDER BY `id` DESC LIMIT 1");
			if($query2->num_rows()==1){
				$result = $query2->result();
				$old_json = json_decode($result[0]->json,true);

				// determine if there was a successful vote (i.e. should we pick the current or proposed groups)
				if($old_json['stage']=='vote'){
					$proposal_successful = true;
					if (isset($json['voters'])) {
						foreach ($json['voters'] as $voter) {
							if(isset($json['votes'][$voter])){
								if($json['votes'][$voter]==0){
									$proposal_successful = false;
								}
							} else {
								$proposal_successful = false;
							}		
						}
					}

					// if proposal was successful then set current groups to proposed groups
					if($proposal_successful){
						$old_json['current_groups'] = $old_json['proposed_groups'];
					}
				}

				// sort current groups so the first has the highest power
				usort($old_json['current_groups'], array('self','compare_coal_power'));

				// determine sharing rule
				$sharingq = $this->db->query("SELECT `treatment`.`controller` FROM `session`,`treatment` WHERE `session`.`id` = $session_id AND `session`.`treatment_id` = `treatment`.`id`");
				if($sharingq->num_rows()>0){
					$sharingres = $sharingq->result();
					if(strpos($sharingres[0]->controller, "eq")!==false){
						$sharing = "equal";
					} else {
						$sharing = "proportional";
					}
				} else {
					$sharing = "proportional";
				}

				$payouts = $old_json['order']; // use the order array do set the size of the payouts array
				foreach ($payouts as $agent_num => $blank) {
					// determine current player's current payout
					$current_payout = 0;
					foreach ($old_json['current_groups'][0]['proportions'] as $agent => $value) {
						if ($agent == $agent_num) {
							if($sharing=="proportional"){
								$current_payout = round($value*100);
							} else {
								$current_payout = 100/count($old_json['current_groups'][0]['proportions']);
							}
							
						}
					}
					$payouts[$agent_num] = $current_payout;

					// calculate participation rate
					// get number of player moves in general and number of moves automated (only count proposals and votes)
					$query3 = $this->db->query("SELECT COUNT(`id`) AS 'moves_tot', SUM(`ai`) AS 'moves_ai' FROM `agent_activity` WHERE `session_id` = $session_id AND `agent_num` = $agent_num");
					if($query3->num_rows()>0){
						$result3 = $query3->result();
						$moves_tot[$agent_num] = $result3[0]->moves_tot;
						$moves_ai[$agent_num] = $result3[0]->moves_ai;
					}
					
				}
				//echo $sharing;
				//var_dump($payouts);
				
				$userq = $this->db->query("SELECT * FROM `session_members` WHERE `session_id` = $session_id");
				if($userq->num_rows()>0){
					foreach ($userq->result() as $row) {
						$user_id[$row->agent_num] = $row->user_id;
					}
				}
							
				foreach ($payouts as $a_num => $payout) {
					$payment = round($payout*(($moves_tot[$a_num]-$moves_ai[$a_num])/$moves_tot[$a_num]));
					//var_dump($payment);
					$this->db->query("INSERT INTO `payouts` VALUES (NULL,$session_id,$a_num,$payout," . $moves_tot[$a_num] . "," . $moves_ai[$a_num] . ")");
					$this->db->query("INSERT INTO `payments` VALUES (NULL," . $user_id[$a_num] . ",$session_id,$payment,0,0)");
				}
				
			} else {
				// payouts are all zero. this is an error.
				$new_json = "{'error':'no json'}";
				$this->db->query("INSERT INTO `session_log` VALUES (NULL,$session_id,'" . $new_json . "',NOW(),1) ");
			}
		
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

	function abort_session($session_id){
		$json = '{"stage":"abort"}';
		$query = $this->db->query("INSERT INTO `session_log` VALUES (NULL,$session_id,'" . $json . "',NOW(),1)");
		$user_query = $this->db->query("SELECT * FROM `session_members` WHERE `session_id` = $session_id");
		if($user_query->num_rows>0){
			foreach ($user_query->result() as $row) {
				$this->db->query("INSERT INTO `aborted_session_members` VALUES ($session_id," . $row->user_id . "," . $row->agent_num . ")");
			}
			$this->db->query("DELETE FROM `session_members` WHERE `session_id` = $session_id");
		}
		
		//$this->end_session($session_id);
	}

	/**
	 * Need to make sure, but I'm pretty sure I don't use this function anymore
	 * This needs to be updated
	 * @param  [type] $current_path [description]
	 * @return [type]
	 */
	function get_location_js($current_path){
		// determine where the current user should be and redirect if not waiting
		
		// bounce user out if they are not supposed to be in a session
		$uid = get_uid();
		$user_decision = get_next_step($uid);
		if($current_path == $user_decision[this_agent_num()]){
			// do nothing
			return "t = setTimeout('check_wait()',5000);";
		} else {
			return "window.location = " . site_url($user_decision[this_agent_num()]);
		}
	}

	function get_agent_num($treatment_id){
		$query = $this->db->query("SELECT `session_members`.`agent_num` FROM `session`,`session_members`,`user` WHERE `session_members`.`session_id` = `session`.`id` AND `user`.`id` = `session_members`.`user_id` AND `session`.`treatment_id` = $treatment_id AND `user`.`email` = '" . $this->session->userdata('email') . "'");
		if($query->num_rows()==1){
			$result = $query->result();
			return $result[0]->agent_num;
		} else {
			return false;
		}
	}

	/**
	 * Return the logged-in user's available treatments
	 * @return array
	 */
	function get_treatments(){
		if($this->session->userdata('is_logged_in')!=true){
			redirect('login');
		} else {
			//$sql = "SELECT `session`.* FROM `session`,`user_session`,`user` WHERE `session`.`id`=`user_session`.`session_id` AND `user_session`.`user_id` = `user`.`id` AND `user`.`email` = '" . $this->session->userdata('email') . "' and `user_session`.`available`=1";
			// get the ids of treatments you have already played
			$sql = "SELECT `treatment`.`id` FROM `treatment`,`session`,`session_members`,`user` WHERE `session_members`.`user_id` = `user`.`id` AND `session_members`.`session_id` = `session`.`id` AND `session`.`treatment_id` = `treatment`.`id` AND `session`.`end_time` <> 0 AND `user`.`email` = '" . $this->session->userdata('email') . "'";
			$res = $this->db->query($sql);
			$completed = array();
			foreach ($res->result() as $row){
				$completed[] = $row->id;
			}

			// get the current user's characteristics array
			$user_query = $this->db->query("SELECT * FROM `user` WHERE `user`.`email` = '" . $this->session->userdata('email') . "'");
			if($user_query->num_rows()==1){
				$user_result = $user_query->result();
				$user['nationality'] = $user_result[0]->nationality;
				$user['religion'] = $user_result[0]->religion;
				$user['ethnicity'] = $user_result[0]->ethnicity;
			}

			$treatments = array();
			//$controllers
			$sql2 = "SELECT * FROM `treatment`";
			$res2 = $this->db->query($sql2);
			/*
			foreach ($res2->result() as $row) {
				$treatments[$row->id]['title'] = $row->internal_name;
				$treatments[$row->id]['controller'] = $row->controller;
				//$treatments[$row->id]['config'] = $row->config;
				if(in_array($row->id, $completed)){
					$treatments[$row->id]['played'] = true;
				} else {
					$treatments[$row->id]['played'] = false;
				}
			}
			*/

			// changed to filter out already played treatments
			foreach ($res2->result() as $row) {
				//if(in_array($row->id, $completed)){
					// treatment has already been played
				//} else {
					// check the characteristic requirement
					$json_array = json_decode($row->config,true);
					if(array_key_exists("characteristic", $json_array)){
						if(in_array($user[$json_array['characteristic']],$json_array['allowed_types'])){
							// user is allowed to take
							$treatments[$row->id]['title'] = $row->internal_name;
							$treatments[$row->id]['controller'] = $row->controller;
						}
					} else {
						$treatments[$row->id]['title'] = $row->internal_name;
						$treatments[$row->id]['controller'] = $row->controller;
					}
					
					
				//}
			}

			// return only treatments which the current user's characteristics are sought.

			return $treatments;
		}
	}

	/**
	 * Return whether the user has already completed the given treatment (1), 
	 * is currently in the treatment (0), or has not yet been added to the treatment (-1).
	 * 
	 * Return (1) if agent is not allowed to access treatment
	 * 
	 * @param  int $treatment_id treatment id
	 * @return int
	 */
	function user_treatment_status($treatment_id){
		$query = $this->db->query("SELECT `session`.`end_time`,`session`.`id` FROM `user`,`session`,`session_members` WHERE `user`.`id` = `session_members`.`user_id` AND `session_members`.`session_id` = `session`.`id` AND `session`.`treatment_id` = $treatment_id AND `user`.`email` = '" . $this->session->userdata('email') . "'");
		if($query->num_rows()>=1){// user is in treatment or has completed treatment
			$result = $query->result();
			if($result[0]->end_time==0){
				//echo "In the middle of this treatment";
				return $result[0]->id;
			} else {
				//echo "This treatment is over for you";
				return 0;
			}
		} else {
			//echo "You need to be added to this treatment";
			return -1;
		}
	}


	function get_current_session_data(){
		$current = array();
		// session and treatment query
		$query  = $this->db->query("SELECT `session`.`id`,`session`.`start_time`,`treatment`.`controller`,`treatment`.`config`,`treatment`.`internal_name` FROM `session`,`treatment`,`session_members` WHERE `session`.`end_time`=0 AND `session`.`treatment_id` = `treatment`.`id` AND `session`.`id` = `session_members`.`session_id` ORDER BY `session`.`id` DESC");
		if($query->num_rows()>0){
			foreach ($query->result() as $row) {
				//echo $row->id . "<br/>";
				$current[$row->id]['id'] = $row->id;
				$current[$row->id]['start_time'] = $row->start_time;
				$current[$row->id]['controller'] = $row->controller;
				$config = json_decode($row->config,true);
				//var_dump($config);
				$current[$row->id]['powers'] = json_encode($config['powers']);
				$current[$row->id]['internal_name'] = $row->internal_name;
			}
		}

		
		foreach ($current as $id => $session) {
			// members query
			$query2 = $this->db->query("SELECT `session_members`.`agent_num`, `user`.`email` FROM `session_members`, `user` WHERE `session_members`.`user_id` = `user`.`id` AND `session_members`.`session_id` = $id ");
			if($query2->num_rows()>0){
				foreach ($query2->result() as $row) {
					$current[$id]['members'][] = array("agent_num" => $row->agent_num, "email" => $row->email);
				}
			}

			//json query
			$query3 = $this->db->query("SELECT `json` FROM `session_log` WHERE `session_id` = $id ORDER BY `id` DESC LIMIT 1");
			if($query3->num_rows()>0){
				$result = $query3->result();
				$json = json_decode($result[0]->json,true);
				$current[$id]['stage'] = $json['stage'];
				if(array_key_exists('round', $json)){
					$current[$id]['round'] = $json['round'];
				}
				if(array_key_exists('turn', $json)){
					$current[$id]['proposer'] = $json['turn'];
				}
				if(array_key_exists('order', $json)){
					foreach ($json['order'] as $order) {
						$current[$id]['order'][] = $order + 1;
					}
				}
			}
		}

		return $current;
	}

	function get_finished_session_data(){
		$finished = array();
		// session and treatment query
		$query  = $this->db->query("SELECT `session`.`id`,`session`.`end_time`,`treatment`.`controller`,`treatment`.`config`,`treatment`.`internal_name` FROM `session`,`treatment` WHERE `session`.`end_time`<>0 AND `session`.`treatment_id` = `treatment`.`id` ORDER BY `session`.`id` DESC");
		if($query->num_rows()>0){
			foreach ($query->result() as $row) {
				//echo $row->id . "<br/>";
				$finished[$row->id]['id'] = $row->id;
				$finished[$row->id]['end_time'] = $row->end_time;
				$finished[$row->id]['controller'] = $row->controller;
				$config = json_decode($row->config,true);
				//var_dump($config);
				$finished[$row->id]['powers'] = json_encode($config['powers']);
				$finished[$row->id]['internal_name'] = $row->internal_name;
			}
		}

		
		foreach ($finished as $id => $session) {
			// members query
			$query2 = $this->db->query("SELECT `session_members`.`agent_num`, `user`.`email`, `payouts`.`moves_tot`, `payouts`.`moves_ai` FROM `session_members`, `user`, `payouts` WHERE `session_members`.`user_id` = `user`.`id` AND `session_members`.`session_id` = $id AND `payouts`.`session_id` = $id AND `payouts`.`agent_num` = `session_members`.`agent_num`");
			if($query2->num_rows()>0){
				foreach ($query2->result() as $row) {
					$ai = round( ($row->moves_ai * 100)/$row->moves_tot );
					$finished[$id]['members'][] = array("agent_num" => $row->agent_num, "email" => $row->email, "ai" => $ai);
				}
			}

			//json query
			$query3 = $this->db->query("SELECT `json` FROM `session_log` WHERE `session_id` = $id ORDER BY `id` DESC LIMIT 1");
			if($query3->num_rows()>0){
				$result = $query3->result();
				$json = json_decode($result[0]->json,true);
				$finished[$id]['stage'] = $json['stage'];
				$finished[$id]['round'] = $json['round'];
				$finished[$id]['proposer'] = $json['turn'];
				foreach ($json['order'] as $order) {
					$finished[$id]['order'][] = $order + 1;
				}
			}
		}

		return $finished;
	}

	/**
	 * Returns array of session members, 
	 * @param  int $session_id Session ID
	 * @return Array
	 */
	function get_session_members($session_id){
		//echo $session_id;
		$query = $this->db->query("SELECT * FROM `session_members` WHERE `session_id` = $session_id");
		if($query->num_rows()>0){
			//echo "some rows";
			foreach ($query->result() as $value) {
				$agent_nums[] = $value->agent_num;
			}
			return $agent_nums;
		} else {
			//echo "no rows";
			return array(''=>'');
		}
	}

	function get_history($session_id){
		$query = $this->db->query("SELECT `id`,`json` FROM `session_log` WHERE `session_id` = $session_id ORDER BY `id`");
		?>
<html>
	<head>
		<style type="text/css">
			table{border: 1px solid #999;}
			td{border: 1px solid #999;}
		</style>
	</head>
	<body>
		<style></style>
		<?php
		echo "<table/><tr><td>id</td> <td>Stage</td> <td>Proposer</td> <td>Round</td> <td>Current Groups</td> <td>Votes</td> <td>Proposed Groups</td></tr>";
		foreach ($query->result() as $row) {
			$json_array = json_decode($row->json,true);
			echo "<tr><td>" . $row->id . "</td><td>";
			if(array_key_exists('stage', $json_array)){
				echo  $json_array['stage'];
			}
			echo "</td><td>";
			if(array_key_exists('proposer', $json_array)){
				echo  $json_array['proposer'];
			}
			echo "</td><td>";			
			if(array_key_exists('round', $json_array)){
				echo  $json_array['round'];
			}
			echo "</td><td><pre>";
			if(array_key_exists('current_groups', $json_array)){
				var_dump($json_array['current_groups']);
			}
			echo "</pre></td><td><pre>";
			if(array_key_exists('votes', $json_array)){
				var_dump($json_array['votes']);
			}
			echo "</pre></td><td><pre>";
			if(array_key_exists('proposed_groups', $json_array)){
				var_dump($json_array['proposed_groups']);
			}
			echo "</pre></td></tr>";
		}
		echo "</table>";
		?>
	</body>
</html>
		<?php
	}


	function get_num_agents($treatment_id){
		$query = $this->db->query("SELECT `num_agents` FROM `treatment` WHERE `id` = $treatment_id");
		if($query->num_rows()==1){
			$result = $query->result();
			$num_agents = $result[0]->num_agents;
		} else {
			$num_agents = 0;
		}
		return $num_agents;
	}

	/**
	 * based on the user's email address return the current treatment the user is in 
	 * or -1 if the user is not currently in an active treatment
	 * @return int [description]
	 */
	function current_treatment(){
		$query = $this->db->query("SELECT `session`.`treatment_id` FROM `user`,`session`,`session_members` WHERE `user`.`id` = `session_members`.`user_id` AND `session_members`.`session_id` = `session`.`id` AND `session`.`end_time` = 0 AND `user`.`email` = '" . $this->session->userdata('email') . "'");
		if($query->num_rows()>0){
			$result = $query->result();
			return $result[0]->treatment_id;
		} else {
			return -1;
		}
	}

	/**
	 * [since_last_log description]
	 * @param  [type] $session_id [description]
	 * @return [type]             [description]
	 */
	function since_last_log($session_id){
		$query = $this->db->query("SELECT (NOW() - `timestamp`) AS 'timesince' FROM `session_log` WHERE `session_id` = $session_id ORDER BY `timestamp` DESC LIMIT 1");
		if($query->num_rows()>0){
			$result = $query->result();
			return $result[0]->timesince;
		} else {
			return -1;
		}
	}

	/**
	 * Given a treatment_id see if there is a session that the user can be added to.
	 * After the user has been added to a session, return the session_id
	 * (If this is the first user in a session, add the first waiting entry to the session_log)
	 * @param id $treatment_id treatment id
	 */
	function add_user($treatment_id){
		$query = $this->db->query("SELECT * FROM (SELECT `treatment`.`config`, `treatment`.`num_agents`, `session_members`.`session_id`, COUNT(`session_members`.`session_id`) AS `count` FROM `treatment`,`session_members`,`session` WHERE `session_members`.`session_id` = `session`.`id` AND `session`.`treatment_id` = $treatment_id AND `treatment`.`id` = $treatment_id GROUP BY `session_members`.`session_id`) AS `tbl1` WHERE `count` < `num_agents`");
		if($query->num_rows()>=1){// >= since there may be multiple open sessions
			// add this user to the found session
			$result = $query->result();
			
			$final_result = array();

			// TODO:
			// use this loop to find the sessions which this user can be added to based on their characteristics
			// see if this is the last one to be added to the session, if so check to see if all users in the session
			// have the same characteristic, only allow the user to be added if the users are not all of the same type.
			
			foreach ($result as $key => $value) {
				if($value->num_agents - $value->count == 1){ // need to see if this agent can be added to this session
					$json_array = json_decode($value->config,true);
					if(array_key_exists('characteristic', $json_array)){
						$usr_query = $this->db->query("SELECT `user`.`" . $json_array['characteristic'] . "` FROM `user`,`session_members` WHERE `session_members`.`session_id` = " . $value->session_id . " AND `session_members`.`user_id` = `user`.`id`");
						$usr_result = $usr_query->result_array();
						foreach ($usr_result as $row) {
							$char_array[] = $row[$json_array['characteristic']];
						}
						if(count(array_unique($char_array))>1){ // ok to add
							$final_result[] = $value;
						} else {
							$usr2_query = $this->db->query("SELECT `user`.`" . $json_array['characteristic'] . "` FROM `user` WHERE `email` = '" . $this->session->userdata('email') . "'");
							$usr2_result = $usr2_query->result_array();
							$char_array[] = $usr2_result[0][$json_array['characteristic']];
							if(count(array_unique($char_array))>1){ // ok to add
								$final_result[] = $value;
							} else {
								// do not keep this result
							}
						}
					} else {
						$final_result[] = $value;
					}
				} else {
					$final_result[] = $value;
				}
			}
			

			if(count($final_result)>0){ // ok to add user

				$session_id = $final_result[0]->session_id;
				$num_agents = $final_result[0]->num_agents;

				$query2 = $this->db->query("SELECT * FROM `session_members` WHERE `session_members`.`session_id` = $session_id");
				foreach ($query2->result() as $row ) {
					$agent_nums[] = $row->agent_num;
				}

				for ($i=0; $i < $num_agents; $i++) { 
					$potential_nums[] = $i;
				}
				//$potential_nums = array(1,2,3,4,5,`);
				$choices = array_diff($potential_nums, $agent_nums);
				$choice = array_rand($choices);
				$this->session->set_userdata('num_agents',$num_agents);

				$query3 = $this->db->query("SELECT `id` FROM `user` WHERE `email` = '" . $this->session->userdata('email') . "'");
				if($query3->num_rows()==1){
					$result3 = $query3->result();
				} else {
					redirect('site/main');
				}
				
				// insert into session_members
				$data = array(
				   'session_id'	=>	$session_id,
				   'user_id'	=>	$result3[0]->id,
				   'agent_num'	=>	$choices[$choice]
				);

				$this->db->insert('session_members', $data);

				/**
				 * add an entry to the session_log
				 */
				// first confirm there is no entry in the session_log for this session
				$log_query = $this->db->query("SELECT * FROM `session_log` WHERE `session_id` = $session_id ORDER BY `id` DESC LIMIT 1");


				// This may be redundant
				// if the number of agents is now the required number, change stage to 'instructions'
				if($final_result[0]->count==$num_agents-1){
					//echo "Last player";
					$stage = 'instructions';
				} else {
					//var_dump($result);
					$stage = 'wait';
				}


				if($log_query->num_rows()==1){
					// already something here, don't add an entry
					if($stage != 'wait'){
						$json = '{"stage":"' . $stage . '"}';
						$data3 = array(
							'session_id'	=>	$session_id,
							'json'			=>	$json
						);
						$this->db->insert('session_log',$data3);
					}
				} else {
					$json = '{"stage":"' . $stage . '"}';
					$data3 = array(
						'session_id'	=>	$session_id,
						'json'			=>	$json
					);
					$this->db->insert('session_log',$data3);
				}

				
				//begin_session($session_id);

				$this->session->set_userdata('agent_num',$data['agent_num']);
				$this->session->set_userdata('sess_id',$session_id);
				$this->session->set_userdata('treatment_id',$treatment_id);
				//return $session_id;
				return $session_id;

			} else { // need to make a new session

				// create new session
				$data = array(
				   'treatment_id'	=>	$treatment_id
				);
				$this->db->insert('session',$data);
				$session_id = $this->db->insert_id();
				//echo $this->session->userdata('email');
				$query3 = $this->db->query("SELECT `id` FROM `user` WHERE `email` = '" . $this->session->userdata('email') . "'");
				if($query3->num_rows()==0){
					redirect("site/main");
				}
				$result3 = $query3->result();
				
				// determine how many agents are possible
				$query_num_agents = $this->db->query("SELECT `num_agents` FROM `treatment` WHERE `id` = $treatment_id");
				if($query_num_agents->num_rows()==1){
					$result_num_agents = $query_num_agents->result();
					$num_agents = $result_num_agents[0]->num_agents;
				} else {
					$num_agents = 6;
				}			for ($i=0; $i < $num_agents; $i++) { 
					$potential_nums[] = $i;
				}

				$this->session->set_userdata('num_agents',$num_agents);

				// randomize agent_num
				$agent_num = array_rand($potential_nums);

				// insert into session_members
				$data2 = array(
					'session_id'	=>	$session_id,
					'user_id'		=>	$result3[0]->id,
					'agent_num'		=>	$agent_num
				);
				$this->db->insert('session_members', $data2);

				/**
				 * add an entry to the session_log
				 */
				// first confirm there is no entry in the session_log for this session
				$log_query = $this->db->query("SELECT * FROM `session_log` WHERE `session_id` = $session_id ORDER BY `id` DESC LIMIT 1");
				if($log_query->num_rows()==1){
					// already something here, don't add an entry
				} else {
					$json = '{"stage":"wait"}';
					$data3 = array(
						'session_id'	=>	$session_id,
						'json'			=>	$json
					);
					$this->db->insert('session_log',$data3);
				}

				$this->session->set_userdata('agent_num',$agent_num);
				$this->session->set_userdata('sess_id',$session_id);
				$this->session->set_userdata('treatment_id',$treatment_id);
				return $session_id;

			}

		} else { // start a new session
			// create new session
			$data = array(
			   'treatment_id'	=>	$treatment_id
			);
			$this->db->insert('session',$data);
			$session_id = $this->db->insert_id();
			//echo $this->session->userdata('email');
			$query3 = $this->db->query("SELECT `id` FROM `user` WHERE `email` = '" . $this->session->userdata('email') . "'");
			if($query3->num_rows()==0){
				redirect("site/main");
			}
			$result3 = $query3->result();
			
			// determine how many agents are possible
			$query_num_agents = $this->db->query("SELECT `num_agents` FROM `treatment` WHERE `id` = $treatment_id");
			if($query_num_agents->num_rows()==1){
				$result_num_agents = $query_num_agents->result();
				$num_agents = $result_num_agents[0]->num_agents;
			} else {
				$num_agents = 6;
			}			for ($i=0; $i < $num_agents; $i++) { 
				$potential_nums[] = $i;
			}

			$this->session->set_userdata('num_agents',$num_agents);

			// randomize agent_num
			$agent_num = array_rand($potential_nums);

			// insert into session_members
			$data2 = array(
				'session_id'	=>	$session_id,
				'user_id'		=>	$result3[0]->id,
				'agent_num'		=>	$agent_num
			);
			$this->db->insert('session_members', $data2);

			/**
			 * add an entry to the session_log
			 */
			// first confirm there is no entry in the session_log for this session
			$log_query = $this->db->query("SELECT * FROM `session_log` WHERE `session_id` = $session_id ORDER BY `id` DESC LIMIT 1");
			if($log_query->num_rows()==1){
				// already something here, don't add an entry
			} else {
				$json = '{"stage":"wait"}';
				$data3 = array(
					'session_id'	=>	$session_id,
					'json'			=>	$json
				);
				$this->db->insert('session_log',$data3);
			}

			$this->session->set_userdata('agent_num',$agent_num);
			$this->session->set_userdata('sess_id',$session_id);
			$this->session->set_userdata('treatment_id',$treatment_id);
			return $session_id;
		}
		
	}

	/**
	 * Takes the session_id and returns the current stage
	 * Made adjustments to allow for multiple stages being reported at most recent
	 * @param  int $session_id Session ID
	 * @return String
	 */
	function get_stage($session_id){
		$query = $this->db->query("SELECT `json` FROM `session_log` WHERE `session_log`.`session_id` = $session_id ORDER BY `id` DESC LIMIT 1");
		if($query->num_rows==1){
			$result = $query->result();
			// see if there is a tie for first
			
			$json_data = json_decode($result[0]->json);
			//var_dump($json_data);
			return $json_data->stage;
		}
	}

	/**
	 * If the current player is not listed as done with instructions mark him as such
	 * @param  [type] $session_id [description]
	 * @return String
	 */
	function finish_instructions($session_id){
		//$agent_num = $this->session->userdata('agent_num');
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
			

			// see if the current stage is instructions, 
			// if it is update the session_log
			if($stage=='instructions'){
				// starting json for comparison
				$json_start = json_encode($json);

				// see if we have already finished the instructions for any user
				if(array_key_exists('finished', $json)){ // we only need to update this entry
					$json['finished'] = pow(10, ($num_agents - $this->session->userdata('agent_num') - 1)) + intval($json['finished']);
				} else { // need to create the 'finished' entry from scratch
					$json['finished'] = pow(10, ($num_agents - $this->session->userdata('agent_num') - 1));
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

	/**
	 * Initialize the session log based on the treatment config info
	 * @param  int $session_id Session id
	 * @return bool
	 */
	function begin_session($session_id){
		// grab config
		$query = $this->db->query("SELECT `treatment`.`config` FROM `treatment`,`session` WHERE `session`.`id` = $session_id AND `session`.`treatment_id` = `treatment`.`id`");
		if($query->num_rows()==1){
			$result = $query->result();
			$config_string = $result[0]->config;
			echo $config_string;
		}
	}

	/**
	 * Takes the treatment id and returns the session id
	 * @param  int $treatment_id Treatment ID
	 * @return mixed
	 */
	function get_session_id($treatment_id){
		$query = $this->db->query("SELECT `session_members`.`session_id` FROM `user`,`session`,`session_members` WHERE `session`.`id` = `session_members`.`session_id` AND `session`.`treatment_id` = $treatment_id AND `session_members`.`user_id` = `user`.`id` AND `user`.`email` = '" . $this->session->userdata('email') . "'");
		if($query->num_rows()==1){
			$result = $query->result();
			return $result[0]->session_id;
		} else {
			return false;
		}
	}

	/**
	 * There are problems with relying on session variables. Reinitialize session variables
	 * for sess_id, agent_num, treatment_id, if they are setup nothing will happen
	 * @return void
	 */
	function check_session_vars($treatment_temp){
		if($this->session->userdata('email')===false){
			redirect("site/main");
		}

		// check sess_id
		$test = $this->get_session_id($treatment_temp);
		$this->session->set_userdata('sess_id',$test);
		
		// check treatment_id
		$treatment_id = $treatment_temp;
		$this->session->set_userdata('treatment_id',$treatment_id);
		
		// check agent_num
		$this->session->set_userdata('agent_num',$this->get_agent_num($treatment_temp));
	}

	function get_proposer_num($session_id){
		$query = $this->db->query("SELECT `json` FROM `session_log` WHERE `session_id` = $session_id ORDER BY `id` DESC LIMIT 1");
		if($query->num_rows()==1){
			$result = $query->result();
			$proposer = json_decode($result[0]->json)->proposer;
			$this->session->set_userdata('proposer',$proposer);
			return $proposer;
		}
	}

	function get_current_json($session_id){
		$query = $this->db->query("SELECT `json` FROM `session_log` WHERE `session_id` = $session_id ORDER BY `id` DESC LIMIT 1");
		if($query->num_rows()==1){
			$result = $query->result();
			//$json = json_decode($result[0]->json,true);
			return $result[0]->json;
		} else {
			return false;
		}
	}


}