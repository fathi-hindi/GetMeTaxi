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

	/**
     * @Summary: AJAX Save Address.
     * @Author:  Fathi Hindi - 02/24/2017.
     */
    public function ajaxSaveAddress() {
		$responseData = array();
		
		$address_id = $this->input->get_post('addressId');
		$address1 = $this->input->get_post('address1');
		$address2 = $this->input->get_post('address2');
		$nick_name = $this->input->get_post('nickName');
		$cityId = $this->input->get_post('cityId');
		$phone = $this->input->get_post('phone');
		$mobile = $this->input->get_post('mobile');
		$orgname = $this->input->get_post('orgname');
		
		if ($address1 == null || $address1 == '') {
			$responseData['status'] = 'failed';
			$responseData['error'] = 'Invalid address line 1.';
		} else if ($cityId == null || $cityId == '') {
			$responseData['status'] = 'failed';
			$responseData['error'] = 'Invalid city.';
		} else if (($phone == null && $mobile == null) || ($phone == '' && $mobile == '')) {
			$responseData['status'] = 'failed';
			$responseData['error'] = 'Please enter phone or mobile number.';
		}  else {
			$address_data = array (
				'member_id' => getUserId(),
				'address1' => $address1,
				'address2' => $address2,
				'phone' => $phone,
				'mobile' => $mobile,
				'orgname' => $orgname,
				'city_id' => $cityId
			);
			if ($address_id == null || $address_id == '') {
				// create new address.
				$address_id = $this->address_model->addNewAddress($address_data);
				if ($address_id) {
					$responseData['status'] = 'sucsess';
					$responseData['addressId'] = $address_id;
				} else {
					$responseData['status'] = 'failed';
					$responseData['error'] = 'Unable to delete this address, pelase try again.';
				}
			} else {
				// update exsisting address
				$address_data['address_id'] = $address_id;
				
				$result = $this->address_model->updateAddress($address_data);
				if ($result) {
					$responseData['status'] = 'sucsess';
				} else {
					$responseData['status'] = 'failed';
					$responseData['error'] = 'Unable to update this address, pelase try again.';
				}
			}
		}
		
		echo json_encode($responseData);
		exit;
	}
}
