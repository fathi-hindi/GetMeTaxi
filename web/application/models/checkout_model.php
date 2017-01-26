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
}
?>