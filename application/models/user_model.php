<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */

class User_model extends CI_Model{
	function validate(){
		$this->db->where('email', $this->input->post('email'));
		$this->db->where('password',sha1($this->input->post('password'),true));
		$query = $this->db->get('user');
		
		//echo "SELECT * FROM `user` WHERE `email` = '" . $this->input->post('email') . "'";
		//$query2 = $this->db->query("SELECT * FROM `user` WHERE `email` = '" . $this->input->post('email') . "'");
		//$result = $query2->result();
		//var_dump($result);

		if($query->num_rows()==1){
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Returns a list of payments due agents
	 * @return [type] [description]
	 */
	function get_payments(){
		$query = $this->db->query("SELECT `user`.*, `payments`.* FROM `user`,`payments` WHERE `authenticated` = 1 AND `user`.`id` = `payments`.`user_id` AND `payments`.`sent` = 0 ORDER BY `user`.`email`");
		if($query->num_rows()>0){
			return $query->result_array();
		} else {
			return false;
		}

	}

	/**
	 * Returns a list of authenticated users
	 * @return mixed if it exists, returns an array of users.
	 */
	function get_list(){
		$query = $this->db->query("SELECT * FROM `user` WHERE `authenticated` = 1");
		if($query->num_rows()>0){
			return $query->result_array();
		} else {
			return false;
		}
	}

	function instructions_status(){
		$query = $this->db->query("SELECT `instructions` FROM `user` WHERE `email` = '" . $this->session->userdata('email') . "'");
		if($query->num_rows()==1){
			$result = $query->result();
			return $result[0]->instructions;
		} else {
			return 0;
		}
	}

	function quiz_status(){
		$query = $this->db->query("SELECT `quiz` FROM `user` WHERE `email` = '" . $this->session->userdata('email') . "'");
		if($query->num_rows()==1){
			$result = $query->result();
			return $result[0]->quiz;
		} else {
			return 0;
		}
	}	
	
	function demo_status(){
		$query2 = $this->db->query("SELECT `demo` FROM `user` WHERE `email` = '" . $this->session->userdata('email') . "'");
		if($query2->num_rows()==1){
			$result = $query2->result();
			//var_dump($result);
			//echo "result exists";
			return $result[0]->demo;
			
		} else {
			return 0;
		}
	}

	function complete_instructions(){
		$this->db->query("UPDATE `user` SET `instructions` = 1 WHERE `email` = '" . $this->session->userdata('email') . "'");
	}

	function complete_quiz(){
		$this->db->query("UPDATE `user` SET `quiz` = 1 WHERE `email` = '" . $this->session->userdata('email') . "'");
	}

	function complete_demo($email){
		$this->db->query("UPDATE `user` SET `demo` = 1 WHERE `email` = '$email'");
	}

	function check_user_exists(){
		$this->db->where('email', $this->input->post('email'));
		$query = $this->db->get('user');
		
		if($query->num_rows()>0){
			// user is already in db
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/**
	 * Returns an array with the current user's permissions
	 * @return array
	 */
	function user_permissions(){
		$permissions = array('investigator' => 0, 'admin' => 0);
		$query = $this->db->query("SELECT * FROM `user` WHERE `email` = '" . $this->session->userdata('email') . "'");
		if($query->num_rows() == 1){
			$result = $query->result();
			$permissions['investigator'] = $result[0]->investigator;
			$permissions['admin'] = $result[0]->admin;
		}

		return $permissions;
	}

	function confirm($confirmation_code){
		$query = $this->db->query("SELECT * FROM `user` WHERE `confirmation_code` = UNHEX('$confirmation_code')");
		if($query->num_rows() == 1){
		
			return $this->db->query("UPDATE `user` SET `authenticated` = 1 WHERE `confirmation_code` = UNHEX('$confirmation_code')");

		} else {
			return FALSE;
		}
		
	}
	
	function create_user(){
		$this->db->where('email', $this->input->post('email'));
		$query = $this->db->get('user');
		
		if($query->num_rows>0){
			// user is already in db
			return FALSE;
		} else {
			// user is not already in db
			$confirmation_code_bin = sha1($this->input->post('email') . " " . date('l jS \of F Y'),true);
			$confirmation_code_hex = sha1($this->input->post('email') . " " . date('l jS \of F Y'));
			$new_user_insert_data = array(
				'email' => $this->input->post('email'),
				'password' => sha1($this->input->post('password'),true),
				// set the confirmation code to the hashed string version of the date and time
				'confirmation_code'	=>	$confirmation_code_bin,
				'nationality'		=>	$this->input->post('nationality'),
				'religion'			=>	$this->input->post('religion'),
				'gender'			=>	$this->input->post('gender')
				//'ethnicity'			=>	$this->input->post('ethnicity')
			);
			
			$this->db->insert('user',$new_user_insert_data);
			return $confirmation_code_hex;			
		}
	}

	/**
	 * Given a user's email determine which session (uid) it currently belongs to
	 * Return false if it is not currently in a session
	 * 
	 * @param  String $email Current user's email
	 * @return [type]
	 */
	function find_user($email){
		$this->db->query("SELECT ");
	}
}