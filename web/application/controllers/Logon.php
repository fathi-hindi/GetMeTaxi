<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logon extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('logon_model');
    }
	
	/**
	 * Main function for logon controller.
	 */
	public function index()
	{
		if (isLoggedIn()) {
            redirect('/account', 'refresh');
        }
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
	 * AJAX Regsitration function.
	 */
	public function ajaxUserRegistration()
	{
		if (isLoggedIn()) {
            redirect('/account', 'refresh');
        }
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
					$this->createNewSession($users_id, USER_TYPE_REGISTERED, $frist_name, $last_name, $email, '');
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
	 * AJAX logon function.
	 */
	public function ajaxUserLogon()
	{
		if (isLoggedIn()) {
            redirect('/account', 'refresh');
        }
		$response = array();
		$isValidForm = $this->validateLogonPostForm();
		if ($isValidForm === TRUE) {
			$logon_id = $this->input->post('logonId');
			$password = $this->input->post('password');
			
			if ($this->logon_model->isValidCredentials($logon_id, $password)) {
				$result = $this->logon_model->findUserByLogonId($logon_id);
				if ($result) {
					$response['status'] = 'sucsess';
					$this->createNewSession($result->users_id, $result->user_type, $result->first_name, $result->last_name, $result->logon_id, $result->photo);
				} else {
					$response['status'] = 'failed';
					$response['error'] = 'Invalid logon Id.';
				}
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
	
	/*
	 * Server side validation for registration for request.
	 */
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
	 * Server side validation for logon form request.
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
	
	/**
	 * Create new session when the customer is logon or registor.
	 */
	private function createNewSession($users_id, $users_type, $first_name, $last_name, $logon_id, $photo) {
        $this->session->set_userdata(SESSION_USER_ID_KEY, $users_id);
        $this->session->set_userdata(SESSION_USER_TYPE_KEY, $users_type);
        $this->session->set_userdata(SESSION_USER_FIRST_NAME_KEY, $first_name);
        $this->session->set_userdata(SESSION_USER_LAST_NAME_KEY, $last_name);
        $this->session->set_userdata(SESSION_USER_LOGON_ID_KEY, $logon_id);   
        $this->session->set_userdata(SESSION_USER_PHOTO_KEY, $photo);   
    }
	
	/**
     * @Summary: Logout current session.
     * @Author:  Fathi Hindi - 02/06/2017.
     */
    public function logout() {
		$user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
		// after log out redirect the customer to the home page.
        redirect('/');
	}
}
