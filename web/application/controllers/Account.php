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
		$this->load->model('Statictics_model');
    }
	
	/**
	 * Main function for my account view.
	 */
	public function index()
	{
		$data = array();
		
		$data['current_orders'] = $this->checkout_model->findCurrentOrdersByUsersId(getUserId());
		$data['statictics'] = $this->getOverviewStatictics();
		
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
		
		$this->load->view('header', $data);
		$this->load->view('history_page', $data);
		$this->load->view('footer', $data);
	}
	
	/**
	 * Main function for current orders view.
	 */
	public function currentOrders()
	{
		$data = array();
		
		$data['current_orders'] = $this->checkout_model->findCurrentOrdersByUsersId(getUserId());
		
		$this->load->view('header', $data);
		$this->load->view('current_orders_page', $data);
		$this->load->view('footer', $data);
	}
	
	/**
	 * Main function for address book view.
	 */
	public function addressBook()
	{
		$data = array();
		
		$data['addresses'] = $this->address_model->findAddressByMemberId(getUserId());
		
		$this->load->view('header', $data);
		$this->load->view('address_page', $data);
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
	
	/**
	 * Main function for statictics view.
	 */
	public function statictics()
	{
		$data = array();
		$statictics = array();
		
		$value = array();
		$value = $this->populatePendingOrderStatictics($value);
		$value = $this->populateSubmittedOrderStatictics($value);
		
		$statictics[] = array(
			'title' => 'Orders Statictics',
			'values' => $value
		);
		
		$value2 = array();
		$value2 = $this->populateGuestUsersStatictics($value2);
		$value2 = $this->populateRegisteredUsersStatictics($value2);
		
		$statictics[] = array(
			'title' => 'Users Statictics',
			'values' => $value2
		);
		
		$data['statictics'] = $statictics;
		
		$this->load->view('header', $data);
		$this->load->view('statictics_page', $data);
		$this->load->view('footer', $data);
	}
	
	/**
     * @Summary: Populate Pending Order Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function populatePendingOrderStatictics($array) {
		$value = array (
			'key' => 'Pending Orders',
			'icon' => 'fa-truck',
			'count' => 5
		);
		$array[] = $value;
		return $array;
	}
	
	/**
     * @Summary: Populate Submitted Order Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function populateSubmittedOrderStatictics($array) {
		$value = array (
			'key' => 'Submitted Orders',
			'icon' => 'fa-truck',
			'count' => 45
		);
		$array[] = $value;
		return $array;
	}
	
	/**
     * @Summary: Populate Guest Users Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function populateGuestUsersStatictics($array) {
		$value = array (
			'key' => 'Guest Users',
			'icon' => 'fa-user',
			'count' => 234
		);
		$array[] = $value;
		return $array;
	}
	
	/**
     * @Summary: Populate Registered Users Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function populateRegisteredUsersStatictics($array) {
		$value = array (
			'key' => 'Registered Orders',
			'icon' => 'fa-user',
			'count' => 510
		);
		$array[] = $value;
		return $array;
	}
	
	/**
     * @Summary: Get User Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function getOverviewStatictics() {
		$result = array();
		
		$result['orders'] = $this->getOrdersStatictics();
		$result['users'] = $this->getUsersStatictics();
		$result['deliverys'] = $this->getDeliverysStatictics();
		$result['taxi_offices'] = $this->getTaxiOfficesStatictics();
		
		return $result;
	}
	
	/**
     * @Summary: Get User Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function getOrdersStatictics() {
		$count = 0;
		if (getUserType() == USER_TYPE_REGISTERED) {
			$count = $this->Statictics_model->getPassengerSubmittedOrdersCount();
		} else if (getUserType() == USER_STATUS_OFFICE) {
			$count = $this->Statictics_model->getOfficeReceivedOrdersCount();
		} else if (getUserType() == USER_STATUS_DRIVER) {
			$count = $this->Statictics_model->getDriverProcessedOrdersCount();
		} else if (getUserType() == USER_STATUS_ADMIN) {
			$count = $this->Statictics_model->getAllOrdersCount();
		}
		return $count;
	}
	
	/**
     * @Summary: Get User Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function getUsersStatictics() {
		$count = 0;
		if (getUserType() == USER_STATUS_ADMIN) {
			$count = $this->Statictics_model->getAllUsersCount();
		} 
		return $count;
	}
	
	/**
     * @Summary: Get User Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function getDeliverysStatictics() {
		return '0';
	}
	
	/**
     * @Summary: Get User Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function getTaxiOfficesStatictics() {
		$count = 0;
		if (getUserType() == USER_STATUS_ADMIN) {
			$count = $this->Statictics_model->getAllTaxiOfficeCount();
		} 
		return $count;
	}
}
