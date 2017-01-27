<?php
if (!defined('BASEPATH'))   exit('No direct script access allowed'); 

Class Checkout_model extends CI_Model {
	
	/**
     * @Summary: Get all avialable offices in a specified city.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/26/2017.
     */
	public function getAvialableOfficesByCity($city_id, $language_id) {
		$rows = array();
		$this->db->select('taxioffice.taxioffice_id, taxiofficedesc.name');
		$this->db->from('taxioffice');
		$this->db->join('taxiofficedesc' , 'taxioffice.taxioffice_id = taxiofficedesc.taxioffice_id and taxiofficedesc.language_id  =' . $language_id);
		$this->db->where('taxioffice.status', '1');
		$this->db->where('taxioffice.city_id', $city_id);
		$query = $this->db->get();
        $result = $query->result_array();
        return $result;
	}
	
	/**
     * @Summary: Get all active city.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
	public function getAllAvialabelCity($language_id) {
		$rows = array();
		$this->db->select('city.city_id, city.identifer, citydesc.name');
		$this->db->from('city');
		$this->db->join('citydesc', 'city.city_id = citydesc.city_id');
		$this->db->where('citydesc.language_id', $language_id);
		$this->db->where('city.status', '1');
		$query = $this->db->get();
        $result = $query->result_array();
        return $result;
	}
	
	/**
     * @Summary: Get all active taxi type.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/10/2017.
     */
	public function getAllTaxiType($language_id) {
		$rows = array();
		$this->db->select('taxitype.taxitype_id, taxitype.identifer, taxitype.max_passenger,
			taxitypedesc.name, taxitypedesc.description, taxitypedesc.thumbnail');
		$this->db->from('taxitype');
		$this->db->join('taxitypedesc', 'taxitype.taxitype_id = taxitypedesc.taxitype_id');
		$this->db->where('taxitypedesc.language_id', $language_id);
		$query = $this->db->get();
        $result = $query->result_array();
        return $result;
	}
	
	/**
     * @Summary: Create new order.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/26/2017.
     */
	public function createNewOrder($users_id, $comment, $type, $source, $attributes) {
		// inser new entry in orders and orderattr.
		$rows = array();
		
		$orders_data = array (
			'users_id' => $users_id,
			'comment' => $comment,
			'type' => trim($type),
			'source' => trim($source)			
		);
		
		$orders_id = $this->insertOrder($orders_data);
		$attributes_data = array();
		foreach ($attributes as $key => $value) {
			$attributes_data[] = array(
				'orders_id' => $orders_id,
				'attr_name' => $key,
				'attr_value' => $value
			);
		}
		
		if ($orders_id > 0) {
			$result = $this->insertOrderAttr($attributes_data);
			if ($result == 0 ) {
				// handle error.
			}
		} else {
			// handle error.
		}
		return $orders_id;
	}
	
	/**
     * @Summary: Insert new entry in 'orders' table.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/26/2017.
     */
	public function insertOrder($data) {
		$this->db->insert('orders', $data);
		$orders_id = $this->db->insert_id();
		return $orders_id;
	}
	
	/**
     * @Summary: Insert new entrys in 'orderattr' table.
     * @Author:  Fathi Hindi.
	 * @CreationDate: 01/26/2017.
     */
	public function insertOrderAttr($data) {
        $this->db->insert_batch('orderattr', $data);
        $affectedRow = $this->db->affected_rows();
        return $affectedRow;
	}
}
?>