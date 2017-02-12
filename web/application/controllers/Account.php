<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct() {
        parent::__construct();
		if (!isLoggedIn()) {
            redirect('/logon', 'refresh');
        }
		$this->load->model('logon_model');
		$this->load->model('checkout_model');
    }
	
	/**
	 * Main function for my account view.
	 */
	public function index()
	{
		$data = array();
		$this->load->view('header', $data);
		$this->load->view('myaccount_page', $data);
		$this->load->view('footer', $data);
	}
	
	/**
	 * Main function for account setting view.
	 */
	public function setting()
	{
		$data = array();
		$result = $this->logon_model->findUserByUsersId(getUserId());
		if ($result) {
			$data['user'] = $result;
		}
		$this->load->view('header', $data);
		$this->load->view('setting_page', $data);
		$this->load->view('footer', $data);
	}
	
	/**
	 * Main function for booking history view.
	 */
	public function history()
	{
		$data = array();
		
		$data['orders'] = $this->checkout_model->findOrdersByUsersId(getUserId());
		$data['current_orders'] = $this->checkout_model->findCurrentOrdersByUsersId(getUserId());
		
		$this->load->view('header', $data);
		$this->load->view('history_page', $data);
		$this->load->view('footer', $data);
	}
	
	/**
     * @Summary: AJAX Change password.
     * @Author:  Fathi Hindi - 02/06/2017.
     */
    public function ajaxChangePassword() {
		$responseData = array();
		
		$old_password = $this->input->post('oldPassword');
		$new_password = $this->input->post('newPassword');
		$confirm_new_password = $this->input->post('confirmNewPassword');
		
		if (!$this->isValidCurrentPassword($old_password)) {
			$responseData['status'] = 'failed';
			$responseData['error'] = 'Invalid current password.';
		} else if ($new_password == null || $confirm_new_password == null) {
			$responseData['status'] = 'failed';
			$responseData['error'] = 'Please enter valid new password.';
		} elseif ($new_password != $confirm_new_password) {
			$responseData['status'] = 'failed';
			$responseData['error'] = 'Password and confirmation password are not match.';
		} else {
			$result = $this->logon_model->changePassword(getUserId(), $new_password);
			if ($result > 0) {
				$responseData['status'] = 'sucsess';
				$responseData['sucsess_message'] = 'Your password has been updated sucsessfuly.';
			} else {
				$responseData['status'] = 'failed';
				$responseData['error'] = 'Unable to update your password. Please try again.';
			}
		}
		
		echo json_encode($responseData);
		exit;
	}
	
	/**
     * @Summary: AJAX Change account informations.
     * @Author:  Fathi Hindi - 02/06/2017.
     */
    public function ajaxAccountUpdate() {
		$responseData = array();
		
		$first_name = $this->input->post('firstName');
		$middle_name = $this->input->post('middleName');
		$last_name = $this->input->post('lastName');
		$phone = $this->input->post('phone');
		$mobile = $this->input->post('mobile');
		$fax = $this->input->post('fax');
		$date_of_birth = $this->input->post('dateOfBirth');
		// TODO : Add server side validation.
		$data = array (
			'first_name' => $first_name,
			'middle_name' => $middle_name,
			'last_name' => $last_name,
			'phone' => $phone,
			'mobile' => $mobile,
			'fax' => $fax,
			'date_of_birth' => $date_of_birth
		);
		$result = $this->logon_model->accountUpdate(getUserId(), $data);
		if ($result > 0) {
			$responseData['status'] = 'sucsess';
			$responseData['sucsess_message'] = 'Your account information has been updated sucsessfuly.';
		} else {
			$responseData['status'] = 'failed';
			$responseData['error'] = 'Unable to update your account informations. Please try again.';
		}
		
		echo json_encode($responseData);
		exit;
	}
	
	/**
     * @Summary: AJAX Change password.
     * @Author:  Fathi Hindi - 02/06/2017.
     */
    private function isValidCurrentPassword($current_password) {
		$isValid = false;
		if ($current_password != null && $current_password != "") {
			$isValid = $this->logon_model->isValidPassword(getUserId(), $current_password);
		} 
		return $isValid;
	}
}
