<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	function __construct() {
        parent::__construct();
		if (!isLoggedIn()) {
            redirect('/logon', 'refresh');
        }
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
	public function accountSetting()
	{
		$data = array();
		$this->load->view('header', $data);
		$this->load->view('setting_page', $data);
		$this->load->view('footer', $data);
	}
	
	/**
	 * Main function for booking history view.
	 */
	public function bookingHistory()
	{
		$data = array();
		$this->load->view('header', $data);
		$this->load->view('history_page', $data);
		$this->load->view('footer', $data);
	}
}
