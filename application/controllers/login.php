<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author Jonathan Page <jonpage.econ@gmail.com>
 */ 


class Login extends CI_Controller {
		
	public function index() {
		if($this->session->userdata('is_logged_in')!=true){
			$template_data['main_content']='login_form';
			$template_data['data']=array('message'=>'');
			$this->load->view('includes/template',$template_data);
		} else {
			redirect('site/main');
		}
		
	}
	
	function validate_credentials(){
		$this->load->model('user_model');
		$valid = $this->user_model->validate();
		
		if($valid){ 
			$data = array(
				'email' => $this->input->post('email'),
				'is_logged_in' => true
			);
			
			$this->session->set_userdata($data);
			
			redirect('site/main');
			
		} else{
			//$this->index();
			//echo "Not Valid";
			$template_data['main_content']='login_form';
			$template_data['data']=array('message'=>'<strong>Invalid Email/Password</strong><br/><br/>');
			$this->load->view('includes/template',$template_data);
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login/index');
	}
	
	function signup(){
		$this->load->library('recaptcha');
	    $this->lang->load('recaptcha');

		$template_data['main_content']='signup_form';
		$template_data['data'] = array();
		$this->load->view('includes/template',$template_data);
	}
	
	function create_user(){

//		require_once('recaptchalib.php');
//		$privatekey = "6LfZmM8SAAAAAPzjN3MGG9Hf8jyUinQoKjDtjsYo";
//		$resp = recaptcha_check_answer ($privatekey,
//		                            $_SERVER["REMOTE_ADDR"],
//		                            $this->input->post('recaptcha_challenge_field'),
//		                            $this->input->post('recaptcha_response_field'));
		                            //$_POST["recaptcha_challenge_field"],
		                            //$_POST["recaptcha_response_field"]);

//		if (!$resp->is_valid) {
		// What happens when the CAPTCHA was entered incorrectly
//		die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
//		     "(reCAPTCHA said: " . $resp->error . ")<br/>" . $this->input->post('recaptcha_challenge_field') . "<br/>" . $this->input->post('recaptcha_response_field'));
//		} else {
		// Your code here to handle a successful verification
			$this->load->library('form_validation');
			// field name, error message, validation rules
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('email2', 'Email Confirmation', 'trim|required|matches[email]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
			$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
			$this->form_validation->set_rules('nationality', 'Nationality', 'required|callback_check_dropdown');
			$this->form_validation->set_rules('religion', 'Religious Affiliation', 'required|callback_check_dropdown');
			$this->form_validation->set_rules('gender', 'Gender', 'required|callback_check_dropdown');
			//$this->form_validation->set_rules('ethnicity', 'Ethnicity', 'trim|required|max_length[32]');

			if($this->form_validation->run()==FALSE){
				// form is not valid
				$template_data['main_content']='signup_form';
				$template_data['data']=array();
				$this->load->view('includes/template',$template_data);
			} else {
				//create user
				$this->load->model('user_model');
				if(!$this->user_model->check_user_exists()){
					$confirmation_code_hex = $this->user_model->create_user();

					if($confirmation_code_hex!=false){
						
					// send user a confirmation message
					$this->load->library('email');

					$this->email->from('admin@economistry.org', 'Economistry Admin');
					$this->email->to($this->input->post('email'));

					$this->email->subject('Confirm Your Registration');
					$this->email->message('Once you confirm your account you will be able to login and set your availability for the current session schedule. Click the following link to confirm registration: ' . site_url('login/confirm/'.$confirmation_code_hex));	

					$this->email->send();

					//echo $this->email->print_debugger();

					$template_data['main_content']='new_user_view';
					$template_data['data'] = array('success'=>true);
					$this->load->view('includes/template',$template_data);

					} else {
						//echo "no hex?";
					}
				}
			}
		//}
	}

	public function check_dropdown($str){
		if($str=='Select One'){
			$this->form_validation->set_message('check_dropdown','The %s field is required.');
			return false;
		} else {
			return true;
		}
	}

	function confirm($confirmation_code){
		$this->load->model('user_model');
		$success = $this->user_model->confirm($confirmation_code);
		if($success!=false){
			// potentially log people in
			// add message to user that they have successfully confirmed registration
			redirect('login/index');
		} else {
			redirect('login/index');
		}
	}
	
}