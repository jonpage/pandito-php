<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */

class Site extends CI_Controller{
	public function index(){
		
	}
	
	/**
	 * This function loads the main user view where they can access 
	 * available sessions and user preferences.
	 * Additional features will be available for investigators and admins
	 * @return [type]
	 */
	function main($message=''){
		// Get user permissions
		$this->load->model('user_model');
		$permissions = $this->user_model->user_permissions();
		
		// load the main view, send the list of available sessions
		// with corresponding controller strings
		$this->load->model('session_model');
		$treatments = $this->session_model->get_treatments();
		$payments = $this->session_model->get_payments();

		$this->load->model('schedule_model');
		$lab_times = $this->schedule_model->get_lab_times();

		$instructions = $this->user_model->instructions_status();
		$demo = $this->user_model->demo_status();
		$quiz = $this->user_model->quiz_status();
		//echo "demo status:";
		//echo $demo;

		$template_data['main_content']='main_view';
		$template_data['data']=array('lab_times'=>$lab_times,'treatments'=>$treatments,'message'=>$message,'instructions'=>$instructions,'demo'=>$demo,'quiz'=>$quiz,'payments'=>$payments);

		// add investigator data if applicable
		if($permissions['investigator']==1){
			$template_data['data']['investigator'] = true;
		}
		// same with admin
		if($permissions['admin']==1){
			$template_data['data']['admin'] = true;
		}

		$this->load->view('includes/template',$template_data);
	}

	function add_event(){
		// Get user permissions
		$this->load->model('user_model');
		$permissions = $this->user_model->user_permissions();
		
		if($permissions['admin']==1){
			// 
			redirect('site/admin');
		} else {
			redirect('site/main');
		}
	}

	function userlist(){
		// Get user permissions
		$this->load->model('user_model');
		$permissions = $this->user_model->user_permissions();
		
		if($permissions['admin']==1){

			$userlist = $this->user_model->get_list();
			$template_data['main_content']='userlist';
			$template_data['data']=array("userlist" => $userlist);

			$this->load->view('includes/template',$template_data);

		} else {
			redirect('site/main');
		}
	}

	function paymentlist(){
		// Get user permissions
		$this->load->model('user_model');
		$permissions = $this->user_model->user_permissions();
		
		if($permissions['admin']==1){

			$payments = $this->user_model->get_payments();
			$template_data['main_content']='payment_list';
			$template_data['data']=array("payments" => $payments);

			$this->load->view('includes/template',$template_data);

		} else {
			redirect('site/main');
		}
	}

	function admin(){
		// Get user permissions
		$this->load->model('user_model');
		$permissions = $this->user_model->user_permissions();
		
		if($permissions['admin']==1){

			$this->load->model('session_model');
			$this->load->model('schedule_model');
			$finished = $this->session_model->get_finished_session_data();
			$current = $this->session_model->get_current_session_data();
			$schedule = $this->schedule_model->get_schedule();
			$template_data['main_content']='admin';
			$template_data['data']=array("finished" => $finished,"current" => $current,'schedule'=>$schedule);

			$this->load->view('includes/template',$template_data);

		} else {
			redirect('site/main');
		}
	}

	function instructions(){
		$this->load->view('instructions');
	}

	function instructions_turkish(){
		$this->load->view('instructions_turkish');
	}

	function instructions_filipino(){
		$this->load->view('instructions_filipino');
	}

	function instructions_hindi(){
		$this->load->view('instructions_hindi');
	}

	function instructions_hebrew(){
		$this->load->view('instructions_hebrew');
	}
	
	function instructions_persian(){
		$this->load->view('instructions_persian');
	}

	function instructions_urdu(){
		$this->load->view('instructions_urdu');
	}

	function instructions_spanish(){
		$this->load->view('instructions_spanish');
	}

	function instructions_japanese(){
		$this->load->view('instructions_japanese');
	}

	function instructions_chinese(){
		$this->load->view('instructions_chinese');
	}

	function instructions_thai(){
		$this->load->view('instructions_thai');
	}

	function instructions_vietnamese(){
		$this->load->view('instructions_vietnamese');
	}

	function quiz(){
		$this->load->view('quiz');
	}
	
	function demo(){
		$this->load->view('demo/start');
	}

	// called by link in instructions to confirm completion
	function complete_instructions(){
		$this->load->model('user_model');
		$this->user_model->complete_instructions();
		$this->load->view('close');
	}

	function complete_quiz(){
		$this->load->model('user_model');
		$this->user_model->complete_quiz();
		$this->load->view('close');
	}	

	function complete_demo($email){
		$this->load->model('user_model');
		$this->user_model->complete_demo(urldecode($email));
		$this->load->view('close');		
	}

	function admin_history($session_id){
		$this->load->model('session_model');
		$this->session_model->get_history($session_id);
	}

	function exit_survey(){
		$template_data['main_content']='exit_survey';
		$template_data['data'] = array();
		$this->load->view('includes/template',$template_data);
	}

	function abort($session_id){
		// Get user permissions
		$this->load->model('user_model');
		$permissions = $this->user_model->user_permissions();
		
		if($permissions['admin']==1){
			// abort this session
			$this->load->model('session_model');
			$this->session_model->abort_session($session_id);
			redirect('site/admin');
		} else {
			redirect('site/main');
		}
	}

	function complete_survey(){
		// validation section
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('religion_1', 'Question 2', 'required');
		$this->form_validation->set_rules('religion_2', 'Question 3', 'required');
		$this->form_validation->set_rules('rel_amount', 'Question 4', 'required|greater_than[-1]|less_than[101]');
		$this->form_validation->set_rules('race_1', 'Question 5', 'required');
		$this->form_validation->set_rules('race_2', 'Question 6', 'required');
		$this->form_validation->set_rules('race_amount', 'Question 7', 'required|greater_than[-1]|less_than[101]');
		$this->form_validation->set_rules('nationality_1', 'Question 8', 'required');
		$this->form_validation->set_rules('nationality_2', 'Question 9', 'required');
		$this->form_validation->set_rules('nat_amount', 'Question 10', 'required|greater_than[-1]|less_than[101]');
		$this->form_validation->set_rules('free_resp', 'Question 11', 'xss_clean');

		if($this->form_validation->run()==FALSE){
			// form is not valid
			$template_data['main_content']='exit_survey';
			$template_data['data']=array();
			$this->load->view('includes/template',$template_data);
		} else {
			// insert answers into `exit_survey` table
			$this->load->model('session_model');
			
			$survey['affect'] = json_encode($this->input->post('affect'));
			$survey['rel_1'] = $this->input->post('religion_1');
			$survey['rel_2'] = $this->input->post('religion_2');
			$survey['rel_amount'] = $this->input->post('rel_amount');
			$survey['race_1'] = $this->input->post('race_1');
			$survey['race_2'] = $this->input->post('race_2');
			$survey['race_amount'] = $this->input->post('race_amount');
			$survey['nat_1'] = $this->input->post('nationality_1');
			$survey['nat_2'] = $this->input->post('nationality_2');
			$survey['nat_amount'] = $this->input->post('nat_amount');
			$survey['free_resp'] = $this->input->post('free_resp');

			$this->session_model->submit_survey($survey);

			// load site/main
			redirect('site/main');
		}		
	}
}