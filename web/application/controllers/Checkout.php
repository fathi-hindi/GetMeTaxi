<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $this->load->model('checkout_model');
		 $this->load->model('address_model');
		 $this->load->model('logon_model');
	}
		
	/**
	 * 
	 */
	public function index()
	{
		 redirect('/welcome', 'refresh');
	}
	
	/**
	 * 
	 */
	public function confirmation()
	{
		$data = array();
		$order_id = $this->input->get('orderId');
		$error_message = '';
		if ($order_id == '') {
			$order = false;
			$error_message = 'Invalid order number.';
		} else {
			$order = $this->checkout_model->findOrdersById($order_id);
			if ($order) {
				$order_users_id = $order->users_id;
				if ($order_users_id != getUserId()) {
					$first_name = $this->input->get('firstName');
					$last_name = $this->input->get('lastName');
					if (isset($first_name) && isset($last_name)) {
						$order_user = $this->logon_model->findUserByUsersId($order_users_id);
						if (($order_user->first_name != $first_name) || ($order_user->last_name != $last_name)) {
							$order = false;
							$error_message = 'You are not authorize to view this order.';
						}
					} else {
						$order = false;
						$error_message = 'You are not authorize to view this order.';
					}
				} 
			} else {
				$order = false;
				$error_message = 'Invalid order number.';
			}
		}
		
		$data['order'] = $order;
		$data['error_message'] = $error_message;
		
		$this->load->view('header', $data);
		$this->load->view('confirmation_page', $data);
		$this->load->view('footer', $data);
	}
	
	/**
	 * Get all avialable offices in a specified city.
	 */
	public function ajaxGetOfficesByCity() {	
		$city_id = $this->input->get('cityId');
		if (empty($city_id)) {
			echo json_encode(array());
			exit;
		}
		$taxi_offices = $this->checkout_model->getAvialableOfficesByCity($city_id, getLanguageId());
		echo json_encode($taxi_offices);
		exit;
	}
	
	
	/**
	 * Get all avialable offices in a specified city.
	 */
	public function ajaxProcessTaxiOrder() {	
		$response = array();
		// read parameter
		$fromAddress = $this->input->post('fromAddress');
		$toAddress = $this->input->post('toAddress');
		$cityId = $this->input->post('cityId');
		$taxiTypeId = $this->input->post('taxiTypeId');
		$taxiOfficeId = $this->input->post('taxiOfficeId');
		$date = $this->input->post('date');
		$time = $this->input->post('time');
		$fristName = $this->input->post('fristName');
		$lastName = $this->input->post('lastName');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		// TODO: validate parameter.
		
		// TODO: if logon getUserId() else create new guest.
		
		// Create new addresses
		$address_data = array (
			'member_id' => getUserId(),
			'address1' => $fromAddress,
			'city_id' => $cityId,
		);
		
		$from_address_id = $this->address_model->addNewAddress($address_data);
		if ($from_address_id == 0) {
			// handle error and return.
		}
		
		// Create new addresses
		$address_data = array (
			'member_id' => getUserId(),
			'address1' => $toAddress,
			'city_id' => $cityId,
		);
		$to_address_id = $this->address_model->addNewAddress($address_data);
		if ($to_address_id == 0) {
			// handle error and return.
		}
		
		$attributes = array(
			'FROM_ADDRESS_ID' => $from_address_id,
			'TO_ADDRESS_ID' => $to_address_id,
			'TAXI_OFFICE_ID' => $taxiOfficeId,
			'TAXI_TYPE_ID' => $taxiTypeId,
			'DATE' => $date,
			'TIME' => $time
		);
		// process order 
		$orders_id = $this->checkout_model->createNewOrder(getUserId(), '', 'TAX', 'WEB', $attributes);
		
		// return response
		if ($orders_id > 0) {
			$response['status'] = 'sucsess';
			$response['orders_id'] = $orders_id;
		} else {
			$response['status'] = 'error';
			$response['error_message'] = 'error has been happened';
		}
		
		echo json_encode($response);
		exit;
	}
}
