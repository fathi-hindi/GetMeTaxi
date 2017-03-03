<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('checkout_model');
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
	public function orderDetails()
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
						if (($order_user == false) || ($order_user->first_name != $first_name) || ($order_user->last_name != $last_name)) {
							$order = false;
							$error_message = 'You are not authorize to view this order.';
						}
					} else {
						$order = false;
						$error_message = 'You are not authorize to view this order.';
					}
				} else {
					// just populate the user infor.
					$order_user = $this->logon_model->findUserByUsersId(getUserId());
				}
			} else {
				$order = false;
				$error_message = 'Invalid order number.';
			}
		}
		
		$data['order'] = $order;
		if (isset($order_user)) {
			$data['order_user'] = $order_user;
		}
		$data['error_message'] = $error_message;
		
		$this->load->view('header', $data);
		$this->load->view('order_details_page', $data);
		$this->load->view('footer', $data);
	}
}
