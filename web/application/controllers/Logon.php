<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logon extends CI_Controller {

	/**
	 * 
	 */
	public function index()
	{
		$data = array();
		$data['hide_navigation'] = true;
		$data['hide_footer'] = true;
		$data['body_class'] = 'full';
		$data['html_class'] = 'full';
		
		$this->load->view('header', $data);
		$this->load->view('logon_page', $data);
		$this->load->view('footer', $data);
	}
}
