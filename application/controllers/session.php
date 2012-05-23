<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */

/**
 * This controller builds a session based on the selected session
 */
class Session extends CI_Controller {

	public function index(){
		
	}

	function id($session_number){
		$this->load->model('session_model');
		$user = $this->session_model->user_in_session($session_number);
		if($user!=false){
			// user is able to join this session
			$this->session_model->join($user,$session_number);

			$template_data['main_content']='wait_room';
			
			// get permissions from user table
			$this->load->model('user_model');
			$permissions = $this->user_model->user_permissions();
	
			$template_data['data'] = array(
				'investigator' => $permissions['investigator'],
				'admin' => $permissions['admin'],
				'waiters' => $this->session_model->waiters($session_number),
				'session_number' => $session_number);
			$this->load->view('includes/template',$template_data);
		} else {
			// user is not permitted to access this session
			redirect('site/main');
		}
	}


	/**
	 * prints the number of users waiting in the designated session wait room
	 * @param  int $session_number session id
	 * @return null
	 */
	function waiters($session_number){
		$this->load->model('session_model');
		echo count($this->session_model->waiters($session_number));
	}

	/**
	 * Returns javascript which will change the contents of 
	 * the #waiters span and resets the setTimeout timer.
	 * Use of this requires a function called check_wait()
	 * to be present in the calling html which calls this function.
	 * 
	 * Test to see if enough users have joined to start the session.
	 * 
	 * @param  int $session_number Session ID
	 * @return String
	 */
	function waiterjs($session_number){
		$this->load->model('session_model');

		$user = $this->session_model->user_in_session($session_number);
		if($user==false){
			//redirect('site/main');
			echo "window.location = " . site_url('site/main');
		}

		// check to see if session has already been started
		$uid = $this->session_model->started($session_number);
		if($uid!=false){
			$stage = $this->session->get_next_step($uid);
			//redirect($stage[$this->session->_this_agent_num($session_number)]);
			echo "window.location = " . site_url($stage[$this->session->_this_agent_num()]);
		} else {
			// session has not yet been started
			if($this->session_model->enough_agents($session_number)){ // start session
				_start($session_number);
				echo "t = setTimeout('check_wait()',5000);";
			} else { // display number of joined users and keep waiting
				// sets the number of displayed waiters
				echo "$('#waiters').html(" . count($this->session_model->waiters($session_number)) . ");";
				// tells the page to keep checking
				echo "t = setTimeout('check_wait()',5000);";
			}
		}
	}

	private function _start($session_number){
		$this->load->model('session_model');
		$uid = $this->session_model->initiate_session($session_number);
		//$stage = $this->session_model->get_next_step($uid);
		return $uid;
		//redirect($stage[$this->session->_this_agent_num()]);
	}

	function admin_start($session_number){
		$this->load->model('session_model');
		$this->load->model('user_model');
		$permissions = $this->user_model->user_permissions();
		$user = $this->session_model->user_in_session($session_number);
		if($user!=false && $permissions['admin']!=false){
			$uid = $this->_start($session_number);
			$stage = $this->session_model->get_next_step($uid);
			//var_dump($stage);
			//echo "<br /><strong>" . $this->session_model->this_agent_num($session_number) . "</strong>";
			redirect($stage[$this->session_model->this_agent_num()]);
		} else {
			redirect('site/main');
		}
		
	}

	function get_location_js($current_path){
		// determine where the current user should be and redirect if not waiting
		$this->load->model('session_model');
		
		echo $this->session_model->get_location_js($current_path);
	}
	
}