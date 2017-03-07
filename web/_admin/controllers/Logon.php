<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Logon extends CI_Controller {

	function __construct() {
        parent::__construct();
    }
	
	/**
	 * Main function for logon controller.
	 */
	public function index()
	{
		$this->load->view('logon_page');
	}
}
