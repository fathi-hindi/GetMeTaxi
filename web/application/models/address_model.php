<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed'); 

Class Address_model extends CI_Model {
	
	/**
     * @Summary: Add new address.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
	public function addNewAddress($data) {
		$data['status'] = 'P';
		$data['is_primary'] = '0';
		$data['nick_name'] = $this->generateNickName($data);
		$address_id = $this->insertAddress($data);
		return $address_id;
	}
	
	/**
     * @Summary: Insert new entry in 'address' table.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/27/2017.
     */
	public function insertAddress($data) {
		$this->db->insert('address', $data);
		return $address_id = $this->db->insert_id();
	}
	
	/**
     * @Summary: Generate nick name.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/27/2017.
     */
	public function generateNickName($data) {
		$nick_name = "";
		$nick_name = microtime()*1000000000000;
		return $nick_name;
	}
}

?>