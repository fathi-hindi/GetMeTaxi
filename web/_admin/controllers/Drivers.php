<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Drivers extends CI_Controller {

	function __construct() {
        parent::__construct();
    }
	
	/**
	 * Main function for logon controller.
	 */
	public function index()
	{
		$this->load->view('header');
		$this->load->view('drivers_page');
		$this->load->view('footer');
	}
}
