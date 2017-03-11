<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statictics extends CI_Controller {

	function __construct() {
        parent::__construct();
		if (!isLoggedIn()) {
            redirect('/logon', 'refresh');
        }
		
		$this->load->model('Statictics_model');
    }
	
	/**
	 * Main function for statictics view.
	 */
	public function index()
	{
		$data = array();
		$statictics = array();
		
		$statictics = $this->populateOrderStatictics($statictics);
		
		$statictics = $this->populateUserStatictics($statictics);
		
		$data['statictics'] = $statictics;
		
		$this->load->view('header', $data);
		$this->load->view('statictics_page', $data);
		$this->load->view('footer', $data);
	}
	
	/**
     * @Summary: Populate Users Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function populateUserStatictics($array) {
		
		$value = array();
		
		$value = $this->populateGuestUsersStatictics($value);
		$value = $this->populateRegisteredUsersStatictics($value);
		
		$value = $this->populateAdminUsersStatictics($value);
		$value = $this->populateOfficeUsersStatictics($value);
		$value = $this->populateDriverUsersStatictics($value);
		
		$array[] = array(
			'title' => 'Users Statictics',
			'values' => $value
		);
		return $array;
	}
	
	/**
     * @Summary: Populate Order Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function populateOrderStatictics($array) {
		
		$value = array();
		$value = $this->populatePendingOrderStatictics($value);
		$value = $this->populateSubmittedOrderStatictics($value);
		
		$array[] = array(
			'title' => 'Orders Statictics',
			'values' => $value
		);
		
		return $array;
	}
	
	/**
     * @Summary: Populate Pending Order Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function populatePendingOrderStatictics($array) {
		$value = array (
			'key' => 'Pending Orders',
			'icon' => 'fa-truck',
			'count' => 5
		);
		$array[] = $value;
		return $array;
	}
	
	/**
     * @Summary: Populate Submitted Order Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function populateSubmittedOrderStatictics($array) {
		$value = array (
			'key' => 'Submitted Orders',
			'icon' => 'fa-truck',
			'count' => 45
		);
		$array[] = $value;
		return $array;
	}
	
	/**
     * @Summary: Populate Guest Users Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function populateGuestUsersStatictics($array) {
		$value = array (
			'key' => 'Guest Users',
			'icon' => 'fa-user',
			'count' => $this->Statictics_model->getUsersCountByType(USER_TYPE_GUEST)
		);
		$array[] = $value;
		return $array;
	}
	
	/**
     * @Summary: Populate Guest Users Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function populateAdminUsersStatictics($array) {
		$value = array (
			'key' => 'Admin Users',
			'icon' => 'fa-user',
			'count' => $this->Statictics_model->getUsersCountByType(USER_TYPE_ADMIN)
		);
		$array[] = $value;
		return $array;
	}
	
	/**
     * @Summary: Populate Office Users Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function populateOfficeUsersStatictics($array) {
		$value = array (
			'key' => 'Office Users',
			'icon' => 'fa-user',
			'count' => $this->Statictics_model->getUsersCountByType(USER_TYPE_OFFICE)
		);
		$array[] = $value;
		return $array;
	}
	
	/**
     * @Summary: Populate Driver Users Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function populateDriverUsersStatictics($array) {
		$value = array (
			'key' => 'Driver Users',
			'icon' => 'fa-user',
			'count' => $this->Statictics_model->getUsersCountByType(USER_TYPE_DRIVER)
		);
		$array[] = $value;
		return $array;
	}
	
	/**
     * @Summary: Populate Registered Users Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function populateRegisteredUsersStatictics($array) {
		$value = array (
			'key' => 'Registered Orders',
			'icon' => 'fa-user',
			'count' => $this->Statictics_model->getUsersCountByType(USER_TYPE_REGISTERED)
		);
		$array[] = $value;
		return $array;
	}
	
	/**
     * @Summary: Get User Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function getOverviewStatictics() {
		$result = array();
		
		$result['orders'] = $this->getOrdersStatictics();
		$result['users'] = $this->getUsersStatictics();
		$result['deliverys'] = $this->getDeliverysStatictics();
		$result['taxi_offices'] = $this->getTaxiOfficesStatictics();
		
		return $result;
	}
	
	/**
     * @Summary: Get User Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function getOrdersStatictics() {
		$count = 0;
		if (getUserType() == USER_TYPE_REGISTERED) {
			$count = $this->Statictics_model->getPassengerSubmittedOrdersCount();
		} else if (getUserType() == USER_TYPE_OFFICE) {
			$count = $this->Statictics_model->getOfficeReceivedOrdersCount();
		} else if (getUserType() == USER_TYPE_DRIVER) {
			$count = $this->Statictics_model->getDriverProcessedOrdersCount();
		} else if (getUserType() == USER_TYPE_ADMIN) {
			$count = $this->Statictics_model->getAllOrdersCount();
		}
		return $count;
	}
	
	/**
     * @Summary: Get User Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function getUsersStatictics() {
		$count = 0;
		if (getUserType() == USER_TYPE_ADMIN) {
			$count = $this->Statictics_model->getAllUsersCount();
		} 
		return $count;
	}
	
	/**
     * @Summary: Get User Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function getDeliverysStatictics() {
		return '0';
	}
	
	/**
     * @Summary: Get User Statictics.
     * @Author:  Fathi Hindi - 03/10/2017.
     */
    private function getTaxiOfficesStatictics() {
		$count = 0;
		if (getUserType() == USER_TYPE_ADMIN) {
			$count = $this->Statictics_model->getAllTaxiOfficeCount();
		} 
		return $count;
	}
}
