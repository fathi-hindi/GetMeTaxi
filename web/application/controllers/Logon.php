<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logon extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('logon_model');
    }
	
	/**
	 * 
	 */
	public function index()
	{
		$data = array();
		$data['hide_navigation'] = true;
		$data['hide_footer'] = true;
		$data['body_class'] = 'full';
		$data['html_class'] = 'full';
		
		$this->load->view('header', $data);
		$this->load->view('logon_page', $data);
		$this->load->view('footer', $data);
	}
	
	/**
	 * 
	 */
	public function ajaxUserRegistration()
	{
		$response = array();
		$isValidForm = $this->validateRegistrationPostForm();
		if ($isValidForm === TRUE) {
			// create new user and login.
			$frist_name = $this->input->post('firstName');
			$last_name = $this->input->post('lastName');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->logon_model->isExsistingLogonId($email)) {
				$response['status'] = 'failed';
				$response['error'] = 'Email is already exsist. If you have account please try to login.';
			} else {
				$users_id = $this->logon_model->createNewUser(USER_TYPE_REGISTERED, $frist_name, $last_name, $phone, USER_STATUS_ENABLED, $email, $password);
				if ($users_id > 0) {
					$response['usersId'] = $users_id;
					$response['status'] = 'sucsess';
				} else {
					// data base error.
					$response['status'] = 'failed';
					$response['error'] = 'Unable to register now, Please try again later on.';
				}
			}
			
		} else {
			$response['status'] = 'failed';
			$response['error'] = $isValidForm;
		}
		
		echo json_encode($response);
		exit;
	}
	
	/**
	 * 
	 */
	public function ajaxUserLogon()
	{
		$response = array();
		$isValidForm = $this->validateLogonPostForm();
		if ($isValidForm === TRUE) {
			$logon_id = $this->input->post('logonId');
			$password = $this->input->post('password');
			
			if ($this->logon_model->isValidCredentials($logon_id, $password)) {
				$response['status'] = 'sucsess';
			} else {
				$response['status'] = 'failed';
				$response['error'] = 'Invalid user name or password.';
			}
			
		} else {
			$response['status'] = 'failed';
			$response['error'] = $isValidForm;
		}
		
		echo json_encode($response);
		exit;
	}
	
	private function validateRegistrationPostForm() {
        $isValid = true;
		if ($this->input->post()) {
			// read parameter
			$frist_name = $this->input->post('firstName');
			$last_name = $this->input->post('lastName');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			if (!isValidFirstName($frist_name)) {
				return 'Please enter valid first name.';
			} else if (!isValidLastName($last_name)) {
				return 'Please enter valid last name.';
			} else if (!isValidPhone($phone)) {
				return 'Please enter valid phone number.';
			} else if (!isValidEmail($email)) {
				return 'Please enter valid email address.';
			} else if (!isValidPassword($password)) {
				return 'Please enter valid password.';
			} 
		} else {
			return 'Invalid request';
		}
		return $isValid;
    }
	/**
	 *
	 *
	 */
	private function validateLogonPostForm() {
        $isValid = true;
		if ($this->input->post()) {
			// read parameters
			$logon_id = $this->input->post('logonId');
			$password = $this->input->post('password');
			
			if (!isValidlogonId($logon_id)) {
				return 'Please enter valid user name or email.';
			} else if (!isValidPassword($password)) {
				return 'Please enter valid password.';
			} 
		} else {
			return 'Invalid request';
		}
		return $isValid;
    }
}
