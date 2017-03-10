<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {

	function __construct() {
        parent::__construct();
    }
	
	/**
	 *
	 */
	public function index()
	{
		redirect('/' ,'refresh');
	}
	
	/**
	 * Main function for about view.
	 */
	public function about()
	{
		$this->load->view('header');
		$this->load->view('about_us_page');
		$this->load->view('footer');
	}
	
	/**
	 * Main function for contact us view.
	 */
	public function contact()
	{
		$this->load->view('header');
		$this->load->view('contact_us_page');
		$this->load->view('footer');
	}
	
	/**
	 * Main function for current orders view.
	 */
	public function privacy()
	{
		$this->load->view('header');
		$this->load->view('privacy_policy_page');
		$this->load->view('footer');
	}
	
	/**
	 * Main function for our team view.
	 */
	public function team()
	{
		$this->load->view('header');
		$this->load->view('our_team_page');
		$this->load->view('footer');
	}
	
	/**
	 * Main function for terms of use view.
	 */
	public function terms()
	{
		$this->load->view('header');
		$this->load->view('terms_of_use_page');
		$this->load->view('footer');
	}
	
	/**
	 * Main function for feedback view.
	 */
	public function feedback()
	{
		$this->load->view('header');
		$this->load->view('feedback_page');
		$this->load->view('footer');
	}
	
}
