<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $this->load->model('checkout_model');
	}
		
	/**
	 * 
	 */
	public function index()
	{
		 redirect('/welcome', 'refresh');
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
}
