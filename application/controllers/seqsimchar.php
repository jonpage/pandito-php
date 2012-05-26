<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 * This controller is for the sequential proposal, simultaneous voting treatment
 * of the current coalition formation game (as of 2/4/2012)
 * 
 * This controller could be a model for how a dynamically created
 * controller template should be structured, allowing investigators 
 * to define their own experiments. This may also be the way to couple
 * Z-Tree with this online experiment "framework".
 * 
 */
class Seqsimchar extends CI_Controller {


	public function index($treatment_id){
		//echo $id;
		//$this->load->view('index');
		$this->load->model('session_model');

		// first check to see if the user is already in some other treatment, in which case
		// the user should be redirected to the treatment he/she was in and not added to a
		// new one.
		$temp_treatment_id = $this->session_model->current_treatment();
		if($temp_treatment_id!=-1){
			$treatment_id = $temp_treatment_id;
		}

		$treatment_status = $this->session_model->user_treatment_status($treatment_id);
		$num_agents = $this->session_model->get_num_agents($treatment_id);
		//echo $num_agents;
		if($treatment_status==-1){ // not yet in treatment
			//echo "Not in treatment";
			// add user to treatment (session) return stage
			$session_id = $this->session_model->add_user($treatment_id);
			$stage = $this->session_model->get_stage($session_id);
			if($stage == 'wait'){
				// get an array of assigned session members
				$view_data = array(
					'agent_nums' => $this->session_model->get_session_members($session_id),
					'num_agents' => $num_agents,
					'treatment_id'	=>	$treatment_id);
				$this->load->view('seqsimchar/wait',$view_data);
			} else {
				$this->load->view('seqsimchar/instructions_view',array('treatment_id'=>$treatment_id));
			}
			// check if session is full
			// if full: load experiment
			// else: start new session, load wait view
		//} elseif ($treatment_status==0) { // completed treatment earlier
			// bounce back to site/main
			//redirect('site/main');
		} else { // currently in session
			// redirect to the appropriate view
			//echo "Currently in session";
			$this->session_model->check_session_vars($treatment_id);
			//$session_id = $treatment_status;
			$session_id = $this->session->userdata('sess_id');
			$stage = $this->session_model->get_stage($session_id);
			//echo $stage;
			
			//
			if($treatment_status==0){
				$stage= 'review';
			}

			switch ($stage) {
				case 'wait':
					// get an array of assigned session members
					$agents = $this->session_model->get_session_members($session_id);
					$view_data = array(
						'agent_nums' => $agents,
						'num_agents' => $num_agents,
						'treatment_id'	=> $treatment_id);
					$this->load->view('seqsimchar/wait',$view_data);
					break;
				
				case 'instructions':
					//
					$this->load->view('seqsimchar/instructions_view',array('treatment_id'=>$treatment_id));
					break;

				case 'propose':
					if($this->session_model->get_proposer_num($session_id)==$this->session->userdata('agent_num')){
						// echo "It's your turn";
						$json = $this->session_model->get_current_json($session_id);
						//$json = json_decode($json,true);
						//$this->load->model('seqsim_model');
						//$json['new_groups'] = $this->seqsim_model->new_groups_set($json);
						$this->load->view('seqsimchar/propose_view',array(
							'json'=>$json,
							'num_agents'=>$num_agents,
							'session_id'=>$session_id,
							'treatment_id'=>$treatment_id,
							'agent_num'=>$this->session->userdata('agent_num')));
					} else {
						// echo "It is NOT your turn: " . $this->session->userdata('agent_num') . "<br/>";
						$this->load->view('seqsimchar/propose_wait_view',array(
							'json'=>$this->session_model->get_current_json($session_id),
							'num_agents'=>$num_agents,
							'session_id'=>$session_id,
							'treatment_id'=>$treatment_id,
							'agent_num'=>$this->session->userdata('agent_num')));
					}
					break;

				case 'vote':
					$json = $this->session_model->get_current_json($session_id);
					$json_array = json_decode($json,true);
					// second term added to prevent users from seeing the vote prompt more than once
					if(in_array($this->session->userdata('agent_num'), $json_array['voters'])&&!array_key_exists($this->session->userdata('agent_num'), $json_array['votes'])){
						//echo "You get to vote.";
						$this->load->view('seqsimchar/vote_view',array(
							'json'=>$json,
							'num_agents'=>$num_agents,
							'session_id'=>$session_id,
							'treatment_id'=>$treatment_id,
							'agent_num'=>$this->session->userdata('agent_num')));
					} else {
						$this->load->view('seqsimchar/vote_wait_view',array(
							'json'=>$json,
							'num_agents'=>$num_agents,
							'session_id'=>$session_id,
							'treatment_id'=>$treatment_id,
							'agent_num'=>$this->session->userdata('agent_num')));
					}
					break;

				case 'results':
					//echo "Results Page";
					$json = $this->session_model->get_current_json($session_id);
					//$json_array = json_decode($json,true);
					$this->load->model('seqsim_model');
					$json = $this->seqsim_model->update_turn($json,$num_agents);
					$start1 = strpos($json,'proposed_groups');
					//$end1 = strpos($json,'}]',$start1);
					$end1 = strpos($json,'votes',$start1);
					$str1 = substr($json, $start1, $end1-$start1);
					$start2 = strpos($json,'"stage');
					$end2 = strpos($json,'coals"');
					$str2 = substr($json, $start2, $end2-$start2);
					$search_string = "$str2%$str1";
					//var_dump($search_string);
					$cycle = $this->seqsim_model->check_cycle($session_id,$search_string);
					//var_dump($cycle);
					if($cycle){
						$this->session_model->end_session($session_id);
					}
					// setup search string to see if there is a cycle
					// compare to a string like this: %"stage":"results","proposer":2%"proposed_groups":[{"id":"11","agents":[1,2],"power":0.6,"proportions":{"1":0.58,"2":0.42},"score":3},{"id":"100","agents":[0],"power":0.4,"proportions":[1]}],"voters":[1],"votes":{"1":1},"finished"%
					// see if the query result is nonempty, then we can end the experiment
					//$search
					if($json['round']>3){
						$this->load->view('seqsimchar/results_view',array(
							'json'=>$json,
							'agent_num'=>$this->session->userdata('agent_num'),
							'cycle'=>$cycle));
					} else {
						$this->load->view('seqsimchar/results_view',array(
							'json'=>$json,
							'num_agents'=>$num_agents,
							'session_id'=>$session_id,
							'treatment_id'=>$treatment_id,
							'agent_num'=>$this->session->userdata('agent_num'),
							'cycle'=>$cycle));
					}
					break;

				case 'review':
					//echo
					$this->session_model->end_session($session_id);
					$this->review($treatment_id);
					break;

				default:
					//redirect('site/main');
					break;
			}
		}
	}

	function abort(){
		$this->load->view('abort');
	}


	/**
	 * This function is called when the user completes a treatment and
	 * allows them to review their earnings.
	 * @param  int $treatment_id Treatment ID
	 * @return [type]               [description]
	 */
	function review($treatment_id){
		$this->load->model('session_model');
		$this->session_model->check_session_vars($treatment_id);
		$stage = $this->session_model->get_stage($this->session->userdata('sess_id'));
		//if($stage!='results'&&$stage!='review'){
		//	echo '<script>window.location = "' . site_url('seqsimchar/index/'.$treatment_id) . '"</script>';
		//} else { // 
			//$this->load->model('seqsim_model');
			$num_agents = $this->session_model->get_num_agents($treatment_id);
			$json = $this->session_model->get_current_json($this->session->userdata('sess_id'));
			$this->load->view('seqsimchar/review_view',array(
				'num_agents' => $num_agents,
				'session_id' => $this->session->userdata('sess_id'),
				'treatment_id' => $treatment_id,
				'agent_num'=>$this->session->userdata('agent_num'),
				'json' => $json));
		//}
	}

	function show_new_groups($session_id,$coalition_id){
		$this->load->model('session_model');
		$json = $this->session_model->get_current_json($session_id);
		$this->load->view('new_groups_view_char',array('json'=>$json,'id'=>$coalition_id));
	}

	function get_json($session_id){
		$this->load->model('session_model');
		var_dump($this->session_model->get_current_json($session_id));
	}

	/**
	 * Either this will return a script to continue waiting or redirect to seqsimchar/index 
	 * so the controller can load the appropriate view
	 * @param  [type] $prev_stage [description]
	 * @return [type]
	 */
	function waitjs($prev_stage,$treatment_id){
		//echo "alert('this works');";
		//echo $prev_stage;
		$this->load->model('session_model');
		$this->session_model->check_session_vars($treatment_id);
		$cur_stage = $this->session_model->get_stage($this->session->userdata('sess_id'));
		//echo "alert('" . $cur_stage . "');";
		if($cur_stage!=$prev_stage){
			if($cur_stage == 'instructions' || $cur_stage == 'propose' || $cur_stage == 'vote' || $cur_stage == 'results'){
				echo 'window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"';
			} else {
				// if someone does not need to be here
				echo 'window.location = "' . site_url('site/main') . '"';
			}
		} else {
			//$agents = $this->session_model->get_session_members($this->session->userdata('sess_id'));
			// see if num_agents in treatment has changed
			if($cur_stage=='wait'){ 
				//$this->session->set_userdata('num_agents',count($agents));
				echo 'window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"';
			} elseif ($cur_stage=='instructions'){
				$timesince = $this->session_model->since_last_log($this->session->userdata('sess_id'));
				if($timesince>60){
					$this->session_model->abort_session($this->session->userdata('sess_id'));
					echo 'window.location = "' . site_url('seqsimchar/abort') . '"';
				} else {
					$this->timerjs($treatment_id);
				}
			} else {
				//echo "t = setTimeout('check_wait()',5000);";
				
				$timesince = $this->session_model->since_last_log($this->session->userdata('sess_id'));
				if($timesince>-1 && $timesince < 2 && $cur_stage=='wait'){
					echo 'window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"';
				} else {
					// Added 3/27 to update whether or not we should move on and automate this entry
					$this->timerjs($treatment_id);
				}				
				//echo 'window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"';
			}
		}	
	}

	/*
	function instructions(){		
		$template_data['data'] = array();
		$template_data['main_content']='seqsimchar/instructions_view';
		$this->load->view('includes/template',$template_data);
	}
	*/

	function finish_instructions($session_id){
		$this->load->model('session_model');
		$string = $this->session_model->finish_instructions($session_id);
		if(strpos($string, "-")===false){
			if(strpos($string,"0")===false){
				$this->load->model('seqsim_model');
				$this->seqsim_model->start_treatment($this->session->userdata('treatment_id'));
			}
		}
		//$this->seqsim_model->start_treatment($treatment_id);
		redirect('seqsimchar/index/'.$this->session->userdata('treatment_id'));
	}


	function results_wait($treatment_id){
		$this->load->model('session_model');
		$this->session_model->check_session_vars($treatment_id);
		if($this->session_model->get_stage($this->session->userdata('sess_id'))!='results'){
			echo '<script>window.location = "' . site_url('seqsimchar/index/'.$treatment_id) . '"</script>';
		} else { // update the session log
			$this->load->model('seqsim_model');
			$finished = $this->seqsim_model->finish_results($this->session->userdata('sess_id'));
			if((strpos($finished, "0")===false)&&(strpos($finished, "-")===false)){ // ready for next stage
				$this->seqsim_model->end_turn($this->session->userdata('sess_id'),$this->session_model->get_current_json($this->session->userdata('sess_id')));
			}
			$num_agents = $this->session_model->get_num_agents($treatment_id);
			$json = $this->session_model->get_current_json($this->session->userdata('sess_id'));
			$this->load->view('seqsimchar/results_wait_view',array(
				'num_agents' => $num_agents,
				'session_id' => $this->session->userdata('sess_id'),
				'treatment_id' => $treatment_id,
				'agent_num'=>$this->session->userdata('agent_num'),
				'json' => $json));
		}
	}

	/**
	 * This function is called to signal the user is done with the instructions phase
	 * @param  int $treatment_id Treatment ID
	 * @return Javascript
	 */
	function instructions_wait($treatment_id){
		// get user's agent_num
		$this->load->model('session_model');
		//$agent_num = $this->session_model->get_agent_num($treatment_id);
		$this->session_model->check_session_vars($treatment_id);
		//$agent_num = $this->session->userdata('agent_num');
		//echo "alert('$agent_num');";
		//echo "alert('" . $treatment_id . "');";
		//echo "alert('" . $this->session->userdata('agent_num') . "');";

		// check to see if the current stage is actually 'instructions', 
		// if not send the user back to the index
		if($this->session_model->get_stage($this->session->userdata('sess_id'))!='instructions'){
			//redirect('seqsimchar/index/' . $this->session->userdata('treatment_id'));
//			echo "alert('$treatment_id');";
			echo 'window.location = "' . site_url('seqsimchar/index/'.$treatment_id) . '";';
		} else { // update the session log
			$finished = $this->session_model->finish_instructions($this->session->userdata('sess_id'));
			if(strpos($finished, "0")===false){ // ready for next stage
				$this->load->model('seqsim_model');
				$this->seqsim_model->start_treatment($treatment_id);
				echo 'window.location = "' . site_url('seqsimchar/finish_instructions/'.$this->session->userdata('sess_id')) . '";';
				//echo 'window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"';
			} else {
				echo "t = setTimeout('check_wait()',1000);";
			}
			//echo 'window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '";';
			
//			echo "alert('false');";
		}
//		
		
	}

	function send_proposal($treatment_id,$proposal_id){
		$this->load->model('session_model');
		$this->session_model->check_session_vars($treatment_id);

		// confirm current stage is 'propose' and that this user is the proposer
		$json = $this->session_model->get_current_json($this->session->userdata('sess_id'));
		$json = json_decode($json,true);
		
		// make sure user is in the right place
		if($this->session_model->get_stage($this->session->userdata('sess_id'))=='propose' && $json['proposer']==$this->session->userdata('agent_num')){
			//echo "<script>alert('Sending Proposal');</script>";
			// process the proposal
			$this->load->model('seqsim_model');
			$this->seqsim_model->send_proposal($this->session->userdata('sess_id'),$json,$proposal_id);
			echo '<script>window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"</script>';
		} else {
			// do nothing
			//echo "Stage: " . $this->session->userdata('sess_id') . "<br/>Proposer: " . $json['proposer'];
			echo '<script>window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"</script>';
		}
	}

	function send_vote($treatment_id,$vote){
		$this->load->model('session_model');
		$this->session_model->check_session_vars($treatment_id);

		// confirm current stage is 'vote' and that this user is a voter
		$json = $this->session_model->get_current_json($this->session->userdata('sess_id'));
		$json = json_decode($json,true);
		

		if($this->session_model->get_stage($this->session->userdata('sess_id'))=='vote' && in_array($this->session->userdata('agent_num'), $json['voters'])){
			// make sure there is still a vote left to be cast
			
			if((!isset($json['votes']) && count($json['voters'])>0) || count($json['voters'])-count($json['votes'])>0){

				// normalize vote entries
				if($vote=='yes'){
					$vote = 1;
				} else {
					$vote = 0;
				}

				// submit the vote
				$json['votes'][$this->session->userdata('agent_num')] = $vote;
				$this->load->model('seqsim_model');
				$this->seqsim_model->send_vote($this->session->userdata('sess_id'),$json,$this->session->userdata('agent_num'));
				//echo '<script>window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"</script>';
				echo '<script>window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"</script>';
			} else {
				echo '<script>window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"</script>';
			}
		} else {
			echo '<script>window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"</script>';
		}
	}


	/**
	 * This will return nothing if user still has time
	 * If the user is out of time, this will submit an AI response
	 * @param  [type] $stage [description]
	 * @return [type]
	 */
	function timerjs($treatment_id){
		$time_limit = array("propose"=>60,"vote"=>45,"results"=>45,"instructions"=>60);
		//echo "alert('this works');";
		//echo $prev_stage;
		$this->load->model('session_model');
		$this->session_model->check_session_vars($treatment_id);
		$this->load->model('seqsim_model');
		$elapsed_time = $this->seqsim_model->elapsed_time($this->session->userdata('sess_id'));
		$cur_stage = $this->session_model->get_stage($this->session->userdata('sess_id'));

		if($elapsed_time!==false&&array_key_exists($cur_stage, $time_limit)){
			if($elapsed_time>$time_limit[$cur_stage]){
				switch ($cur_stage) {
					case 'instructions':
						echo 'window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"';
						break;

					case 'propose':
						$this->seqsim_model->auto_propose($this->session->userdata('sess_id'));
						echo 'window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"';
						
						break;
					
					case 'vote':
						$this->seqsim_model->finish_voting($this->session->userdata('sess_id'));
						echo 'window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"';
						
						break;

					case 'results':
						$json = $this->session_model->get_current_json($this->session->userdata('sess_id'));
						$this->seqsim_model->end_turn($this->session->userdata('sess_id'),$json);
						echo 'window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"';
						
						break;

					default:
						echo 'window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"';
						break;
				}
			} else {
				echo "t = setTimeout('check_wait()',1000);";
			}
		} else {
			echo "t = setTimeout('check_wait()',1000);";
		}
		//echo "alert('" . $cur_stage . "');";
		/*if($cur_stage!=$prev_stage){
			if($cur_stage == 'instructions' || $cur_stage == 'propose' || $cur_stage == 'vote' || $cur_stage == 'results'){
				echo 'window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"';
			} else {
				// if someone does not need to be here
				echo 'window.location = "' . site_url('site/main') . '"';
			}
		} else {
			$agents = $this->session_model->get_session_members($this->session->userdata('sess_id'));
			// see if num_agents in treatment has changed
			if($cur_stage=='wait' && count($agents) > $this->session_model->get_num_agents($treatment_id)){ 
				//$this->session->set_userdata('num_agents',count($agents));
				echo 'window.location = "' . site_url('seqsimchar/index/' . $treatment_id) . '"';
			} else {
				echo "t = setTimeout('check_wait()',5000);";
			}
		}*/	
	}

}