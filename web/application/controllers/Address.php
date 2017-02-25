<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('address_model');
    }
	
	/**
     * @Summary: AJAX Get Address.
     * @Author:  Fathi Hindi - 02/24/2017.
     */
    public function ajaxGetAddress() {
		$responseData = array();
		
		$address_id = $this->input->get_post('addressId');
		
		if ($address_id == null || $address_id == '') {
			$responseData['status'] = 'failed';
			$responseData['error'] = 'Invalid address id was recived.';
		} else {
			$address = $this->address_model->findAddressById($address_id);
			if ($address) {
				$responseData['status'] = 'sucsess';
				$responseData['address'] = $address;
			} else {
				$responseData['status'] = 'failed';
				$responseData['error'] = 'Invalid address id was recived.';
			}
		}
		
		echo json_encode($responseData);
		exit;
	}
	
	/**
     * @Summary: AJAX Delete Address.
     * @Author:  Fathi Hindi - 02/24/2017.
     */
    public function ajaxDeleteAddress() {
		$responseData = array();
		
		$address_id = $this->input->get_post('addressId');
		
		if ($address_id == null || $address_id == '') {
			$responseData['status'] = 'failed';
			$responseData['error'] = 'Invalid address id was recived.';
		} else {
			$result = $this->address_model->deleteAddress($address_id);
			if ($result) {
				$responseData['status'] = 'sucsess';
			} else {
				$responseData['status'] = 'failed';
				$responseData['error'] = 'Unable to delete this address, pelase try again.';
			}
		}
		
		echo json_encode($responseData);
		exit;
	}
}
