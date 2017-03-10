<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Drivers extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('driver_model');
    }
	
	/**
	 * Main function for logon controller.
	 */
	public function index()
	{
		$data = array();
		$data['drivers'] = $this->driver_model->findDriversByTaxiOfficeId(1);
		
		$this->load->view('header');
		$this->load->view('drivers_page', $data);
		$this->load->view('footer');
	}
}
