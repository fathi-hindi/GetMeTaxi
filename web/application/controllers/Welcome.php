<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('checkout_model');
	}
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array();
		
		$citys = $this->checkout_model->getAllAvialabelCity(getLanguageId());
		$data['citys'] = $citys;
		
		$taxi_types = $this->checkout_model->getAllTaxiType(getLanguageId());
		
		$data['taxi_types'] = $taxi_types;
		
		$this->load->view('header', $data);
		$this->load->view('home_page', $data);
		$this->load->view('footer', $data);
		
	}
	
	public function commingSoon()
	{	
		$data = array();
		$data['hide_navigation'] = true;
		$data['hide_footer'] = true;
		$data['body_class'] = 'full';
		$data['html_class'] = 'full';
		
		$this->load->view('header', $data);
		$this->load->view('comming_soon', $data);
		$this->load->view('footer', $data);
	}
}
